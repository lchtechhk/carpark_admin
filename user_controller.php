<?php
include("config.php");
include("main_controller.php");

include("dao/MainDao.php");
include("dao/UsersDao.php");

$operation = isset($_GET['operation']) ? $_GET['operation'] : '';
$data = array();
$res = array();
$postdata = json_decode(file_get_contents("php://input"));

$res['message_status'] = true;
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
    case 'register_login': 
        $connect->begin_transaction();
        try{
            $license = $data['license'];
            $hkid = $data['hkid'];
            if(empty($license) || empty($hkid)) throw new Exception('車牌和身份證不能空');     
            $is_duplicate = $UsersDao->check_duplicate($license, $hkid);
            if($is_duplicate != 0){
                $result_user = $UsersDao->findByLicenseAndHKID($license, $hkid);
                $res['user_data'] = $result_user;
                $res['message'] = "成功登入";
            }else {
                $result_users_id = db_prepareInsert($connect, 'users',$data);
                if($result_users_id == 0)throw new Exception("Error To Added A New Record To User.");
                // $res['message'] = "成功創建了用户\n";
                $result_user = $UsersDao->findById($result_users_id);
                $res['user_data'] = $result_user[0];
                $res['message'] = "成功登入";
                // UsersDao
                $connect->commit();
            }

        }catch (Exception $e){
            $res = exception_rollback($connect,$res,$e,true);
        }
        $encode = json_encode($res);
        error_log("register_login : " . $encode);
        echo $encode;
    break;
    case 'login':
        $connect->begin_transaction();
        try{
            $license = $data['license'];
            $hkid = $data['hkid'];
            $result_user = $UsersDao->findByLicenseAndHKID($license, $hkid);
            if(empty($result_user)) throw new Exception('Wrong Account');
            $res['user_data'] = $result_user;
            $res['message'] = "成功登入";
        }catch (Exception $e){
            $res = exception_rollback($connect,$res,$e,true);
        }
        $encode = json_encode($res);
        error_log("Login : " . $encode);
        echo $encode;
    break;

    case 'save':
        $connect->begin_transaction();
        try{
            $license = $data['license'];
            $hkid = $data['hkid'];
            if(empty($license) || empty($hkid)) throw new Exception('車牌和身份證不能空');     
            $is_duplicate = $UsersDao->check_duplicate($license, $hkid);
            if($is_duplicate != 0)throw new Exception('執照和香港身份證已使用');      
            $result_users_id = db_prepareInsert($connect, 'users',$data);
            if($result_users_id == 0)throw new Exception("Error To Added A New Record To User.");
            $res['message'] = "成功創建了用户";
            // UsersDao
            $connect->commit();
        }catch (Exception $e){
            $res = exception_rollback($connect,$res,$e,true);
        }
        $encode = json_encode($res);
        error_log("Register : " . $encode);
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