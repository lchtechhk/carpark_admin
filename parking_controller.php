<?php
include("config.php");
include("main_controller.php");
include("dao/MainDao.php");
include("dao/ParkingDao.php");
include("dao/BookingDao.php");
// include("dao/View_ParkBookingDao.php");

$operation = isset($_GET['operation']) ? $_GET['operation'] : '';
$data = array();
$res = array();
$postdata = json_decode(file_get_contents("php://input"));

foreach ($postdata as $key => $value) {
    // error_log($key . ' : ' . $value);
    $data[$key] = $value;
}
// error_log('operation --' . $operation);
// error_log('main_id --' . $main_id);
// error_log('data --' .json_encode($data));

$res['message_status'] = "success";
$res['message'] = '';

$ParkingDao = new ParkingDao($connect);
$BookingDao = new BookingDao($connect);
// $View_ParkBookingDao = new View_ParkBookingDao($connect);

switch($operation){
    case 'findAll':
        $resut_parking = $ParkingDao->findAllNoStatusOrderById();
        $encode = json_encode($resut_parking);
        error_log('resut_parking : ' . $encode);
        echo $encode;
    break;
    case 'holding':
        $user_id = $data['user_id'];
        $park_id = $data['park_id'];

        // Check Parking Status
        $resut_parking = $ParkingDao->findById($user_id);
        $row = $resut_parking[0];
        $park_status = $row['operation_status'];
        if($park_status == 'inactive'){
            $res['message_status'] = false;
        }else {
            $connect->begin_transaction();
            try{
                $create_date_time = date('Y-m-d H:i:s');
                $time = 30 * 60; //30 minutes
                $create_date_time_add_30min = date('Y-m-d H:i:s', time() + $time);
                //Change Park status
                $park = array();
                $park['operation_status'] = 'inactive';
                $update_parking = db_prepareUpdate($connect, 'parking',$park,$park_id);
                if(!$update_parking)throw new Exception("Error To Update Record To Parking.");
                //Create Booking Record 
                $booking = array();
                $booking['holding_create_date_time'] = $create_date_time ;
                $booking['holding_end_date_time'] = $create_date_time_add_30min;
                $booking['user_id'] = $user_id;
                $booking['park_id'] = $park_id;
                $booking['status'] = "holding";
                $insert_main_id = db_prepareInsert($connect, 'booking',$booking);
                if(!$insert_main_id)throw new Exception("Error To Insert Record To Parking.");
                $connect->commit();
                $res['message_status'] = true;
            }catch (Exception $e){
                $res = exception_rollback($connect,$res,$e,true);
            }
        }
        $latest_parking = $ParkingDao->getParking($user_id);
        $res['park_data'] = $latest_parking;
        echo json_encode($res);
    break;
    case 'payment':
        $connect->begin_transaction();
        try{
            $user_id = $data['user_id'];
            $park_id = $data['park_id'];
            // Find PrePayment Record
            $resut_parking = $BookingDao->find_prePayment($user_id,$park_id);
            if(isset($resut_parking) && sizeof($resut_parking) == 0 ) throw new Exception("The CarPark Order Dose Not Find");
            // Update Booking Record To Paid
            $booking_id = $resut_parking[0]['id'];
            $booking = array();
            $booking['payment_create_date_time'] = date('Y-m-d H:i:s');
            $booking['charge_amount'] = 100;
            $booking['progress_time'] = 2;
            $booking['status'] = 'paid';
            $update_parking = db_prepareUpdate($connect, 'booking',$booking,$booking_id);
            if(!$update_parking)throw new Exception("Error To Update Record To Booking.");
            $connect->commit();
            $res['message_status'] = true;
        }catch (Exception $e){
            $res = exception_rollback($connect,$res,$e,true);
        }   
        $latest_parking = $ParkingDao->getParking($user_id);
        $res['park_data'] = $latest_parking;
        echo json_encode($res);
    break;
    case 'leave':
        $user_id = $data['user_id'];
        $park_id = $data['park_id'];
         // Check Parking Status
        $parking = $ParkingDao->findById($user_id);
        $row = $parking[0];
        $park_status = $row['operation_status'];
        if($park_status == 'active'){
            $res['message_status'] = false;
        }else {
            $connect->begin_transaction();
            try{
                //Change Park status
                $park = array();
                $park['operation_status'] = 'active';
                $update_parking = db_prepareUpdate($connect, 'parking',$park,$park_id);
                if(!$update_parking)throw new Exception("Error To Update Record To Parking.");

                //Find PreLevel Booking Record
                $resut_parking = $BookingDao->find_preLeave($user_id,$park_id);
                if(isset($resut_parking) && sizeof($resut_parking) == 0 ) throw new Exception("The CarPark Order Dose Not Find");

                //Update Booking Record To Complete
                $booking_id = $resut_parking[0]['id'];
                $booking = array();
                $booking['leave_date_time'] = date('Y-m-d H:i:s');
                $booking['status'] = 'complete';
                $update_parking = db_prepareUpdate($connect, 'booking',$booking,$booking_id);
                if(!$update_parking)throw new Exception("Error To Update Record To CarPark Order.");
                $connect->commit();
                $res['message_status'] = true;
            }catch (Exception $e){
                $res = exception_rollback($connect,$res,$e,true);
            }  
        }
        $latest_parking = $ParkingDao->getParking($user_id);
        $res['park_data'] = $latest_parking;
        echo json_encode($res);
    break;
}

?>