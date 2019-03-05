<?php
    class UsersDao extends MainDao {
        function __construct($connect) {
            parent::__construct($connect,'users');
        }

        function check_duplicate($license, $hkid){
            $sql = "SELECT count(*) FROM users where license = '$license'  AND hkid = '$hkid' ";
            $result = $this->connect->query($sql);
            $row = $result->fetch_row();
            $count = $row[0];
            return $count;
        }

        function findByLicenseAndHKID($license, $hkid){
            $sql = "SELECT * FROM users where license = '$license' AND hkid = '$hkid' ";
            $result = $this->connect->query($sql);
            $row = mysqli_fetch_assoc($result);
            // error_log('row : ' . json_encode($row));
            return $row;
        }
    }
?>