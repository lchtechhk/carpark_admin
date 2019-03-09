<?php
    class BookingDao extends MainDao {
        function __construct($connect) {
            parent::__construct($connect,'booking');
        }

        function find_preArrival($user_id,$park_id){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table WHERE park_id = $park_id AND user_id = $user_id AND status = 'paid' ORDER BY id DESC";
            error_log('[find_preArrival] -- ' . $sql);
            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $res[] = $row;
                }
            }   
            return $res;
        }

        function find_prePayment($user_id,$park_id){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table WHERE park_id = $park_id AND user_id = $user_id AND status = 'holding' ORDER BY id DESC";
            error_log('[find_prePayment] : ' . $sql);
            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $res[] = $row;
                }
            }   
            return $res;
        }

        function find_preLeave($user_id,$park_id){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table WHERE park_id = $park_id AND user_id = $user_id AND status = 'arrival' ORDER BY id DESC";
            error_log("[find_preLeave] -- " . $sql);
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