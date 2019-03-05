<?php
    class BookingDao extends MainDao {
        function __construct($connect) {
            parent::__construct($connect,'booking');
        }

        function find_prePayment($park_id,$user_id){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table WHERE park_id = $park_id AND user_id = $user_id AND status = 'holding' ORDER BY id DESC";
            // error_log('sql : ' . $sql);
            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $res[] = $row;
                }
            }   
            return $res;
        }

        function find_preLeave($park_id,$user_id){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table WHERE park_id = $park_id AND user_id = $user_id AND status = 'paid' ORDER BY id DESC";
            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $res[] = $row;
                }
            }   
            error_log('res : ' . json_encode($res));

            return $res;
        }

    }
?>