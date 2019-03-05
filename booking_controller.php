<?php
include("config.php");
include("dao/MainDao.php");
include("dao/BookingDao.php");

$operation = isset($_GET['operation']) ? $_GET['operation'] : '';
$data = array();
foreach ($_POST as $key => $value) {
    $data[$key] = $value;
}
switch($operation){
    case 'findAll':
        $BookingDao = new BookingDao($connect);
        $resut_booking = $BookingDao->findAllNoStatusOrderById();
        $encode = json_encode($resut_booking);
        error_log('resut_booking : ' . $encode);
        echo $encode;
    break;
}
?>