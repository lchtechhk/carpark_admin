<?php
include("config.php");
include("main_controller.php");

include("dao/MainDao.php");
include("dao/UsersDao.php");

$operation = isset($_GET['operation']) ? $_GET['operation'] : '';
$data = array();
$res = array();
$postdata = json_decode(file_get_contents("php://input"));

$res['message_status'] = "success";
$res['message'] = '';

$UsersDao = new UsersDao($connect);
foreach ($postdata as $key => $value) {
    // error_log($key . ' : ' . $value);
    $data[$key] = $value;
}
// error_log('operation --' . $operation);
// error_log('main_id --' . $main_id);
// error_log('data --' .json_encode($data));
switch($operation){
    case 'login':
        $connect->begin_transaction();
        try{
            $license = $data['license'];
            $hkid = $data['hkid'];
            $result_user = $UsersDao->findByLicenseAndHKID($license, $hkid);
            if(empty($result_user)) throw new Exception('Wrong Account');
            $res['user_data'] = $result_user;
        }catch (Exception $e){
            $res = exception_rollback($connect,$res,$e,true);
        }
        $encode = json_encode($res);
        echo $encode;
    break;

    case 'save':
        $connect->begin_transaction();
        try{
            $license = $data['license'];
            $hkid = $data['hkid'];
            $is_duplicate = $UsersDao->check_duplicate($license, $hkid);
            if($is_duplicate != 0)throw new Exception('執照和香港身份證已使用');      
            $result_users_id = db_prepareInsert($connect, 'users',$data);
            if($result_users_id == 0)throw new Exception("Error To Added A New Record To User.");
            $res['message'] = "Created An User";
            // UsersDao
            $connect->commit();
        }catch (Exception $e){
            $res = exception_rollback($connect,$res,$e,true);
        }
        $encode = json_encode($res);
        echo $encode;
    break;
    case 'findAll':
        $BookingDao = new UsersDao($connect);
        $resut_booking = $BookingDao->findAllNoStatusOrderById();
        $encode = json_encode($resut_booking);
        error_log('resut_booking : ' . $encode);
        echo $encode;
    break;
}
?>