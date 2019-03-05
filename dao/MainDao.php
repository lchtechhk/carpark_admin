<?php 
    class MainDao{
        protected $connect;
        protected $table;
        function __construct($connect,$table){
            $this->connect = $connect;
            $this->table = $table;
        } 

        function findAllNoStatusAndByDoctorOrderById($doctor_code){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table ";
            if(!empty($doctor_code) && $doctor_code != 'ALL')$sql .= ' WHERE doctor_code = '."'$doctor_code'";
            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $res[] = $row;
                }
            }   
            return $res;
        }

        function findAllNoStatusOrderById(){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table ";
            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $res[] = $row;
                }
            }   
            return $res;
        }

        function findAllOrderById(){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table  WHERE status = 'active' ";
            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $res[] = $row;
                }
            }   
            return $res;
        }

        function findAllOrderByIdDesc(){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table  WHERE status = 'active' ORDER BY id DESC";
            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $res[] = $row;
                }
            }   
            return $res;
        }

        function findAllOrderByIdDesc_getArray(){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table  WHERE status = 'active' ORDER BY id DESC";
            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){
                    if($table == "handle_method"){
                        $handle_doctor_code = $row['doctor_code'];
                        $handle_section_code = $row['section_code'];
                        $handle_key = $handle_doctor_code."--".$handle_section_code;
                        $res[] = $handle_key;
                    }else {
                        $code = $row['code'];
                        $res[] = $code;
                    }
                   
                }
            }   
            return $res;
        }

        function findAllOrderByIdDesc_obj(){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $res['list'] = array();
            $res["obj"] = array();
            $sql = "SELECT * FROM $table  WHERE status = 'active' ORDER BY id DESC";
            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){ 
                    if($table == "handle_method"){
                        $handle_doctor_code = $row['doctor_code'];
                        $handle_section_code = $row['section_code'];
                        $handle_key = $handle_doctor_code."--".$handle_section_code;
                        $res['list'][] = $handle_key;
                        $res["obj"][$handle_key] = $row;
                    }else {
                        $code = $row['code'];
                        $res['list'][]= $code;
                        $res["obj"][$code] = $row;
                    }
                }
            }   
            return $res;
        }

        function findAllOrderByIdDescLimitOne(){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table  WHERE status = 'active' ORDER BY id DESC LIMIT 1";
            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $res[] = $row;
                }
            }   
            if(is_array($res) && sizeof($res) > 0){
                return $res[0];
            }
            return null;
        }
        function getLatest_id(){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table  WHERE status = 'active' ORDER BY id DESC LIMIT 1";
            $id = '';
            if($result = $connect->query($sql)){
                $row = mysqli_fetch_assoc($result);
                $id = $row['id'];
            }   
            return $id;
        }
        function findById($id){
            $connect = $this->connect;
            $table = $this->table;
            $res = array();
            $sql = "SELECT * FROM $table  WHERE id = $id ORDER BY id DESC";
            if($result = $connect->query($sql)){
                while($row = mysqli_fetch_assoc($result)){
                    $res[] = $row;
                }
            }   
            return $res;
        }

    }
?>