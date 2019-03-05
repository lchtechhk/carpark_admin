<?php
    class View_ParkBookingDao extends MainDao {
        function __construct($connect) {
            parent::__construct($connect,'view_park_booking');
        }
        // function findByParkIdAndUserId($park_id,$user_id){
        //     $connect = $this->connect;
        //     $table = $this->table;
        //     $res = array();
        //     $sql = "SELECT * FROM $table WHERE id = $park_id AND user_id = $user_id AND booking_status <> 'complete' ORDER BY id DESC";
        //     if($result = $connect->query($sql)){
        //         while($row = mysqli_fetch_assoc($result)){
        //             $res[] = $row;
        //         }
        //     }   
        //     return $res;
        // }
    }
?>