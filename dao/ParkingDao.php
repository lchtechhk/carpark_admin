<?php
    class ParkingDao extends MainDao {
        function __construct($connect) {
            parent::__construct($connect,'parking');
        }
        function getParking($user_id){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table  WHERE status = 'active' ORDER BY id DESC";
            error_log('sql : ' . $sql);

            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $res[$id] = $row;
                }
            }   
            // error_log('$res : ' . json_encode($res));
            $res_booking =array();
            $sql = "SELECT * FROM booking  WHERE user_id = $user_id AND status <> 'complete' ORDER BY id DESC";
            if($result_booking = $connect->query($sql)){
                while($value = mysqli_fetch_assoc($result_booking)){
                    // $id = $value['id'];
                    $park_id = $value['park_id'];
                    $status = $value['status'];
                    if(isset($res[$park_id])) $res[$park_id]['booking_status'] = $status;
                }
            }   
            // error_log('res_booking : ' . json_encode($res_booking));
            // error_log('res : ' . json_encode($res));
            return $res;
        }
    }
?>