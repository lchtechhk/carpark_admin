<?php 
header('Content-Type: text/html; charset=utf-8');
define("HTTP_PATH_ROOT", isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : (isset($_SERVER["SERVER_NAME"]) ? $_SERVER["SERVER_NAME"] : '_UNKNOWN_'));
function db_prepareUpdate($db, $table, $data,$exhibition_id)
{
    $list_cols = $db->query('DESCRIBE '.$table);
    $nb_cols = mysqli_num_rows($list_cols);
    $query = 'UPDATE '.$table.' SET ';
    $answer = '';
    $add_comma = false;
    while($row = mysqli_fetch_assoc($list_cols)){
        $column = $row['Field'];
        if(array_key_exists($column, $data)){
            $descr = db_column_type($db, $table,$column);
            $count = (preg_match('/.*(time|date|datetime|char|text).*/i', $descr));
            $value = empty($data[$column]) && $data[$column] != 0 ? null : html_entity_decode($data[$column]);
            $answer = out_put_value($count,$value);
            if($add_comma) {
                $query .= ', ';
            }
            $query .= '`'.$column.'`';
            $query .=  '='.$answer;

            $add_comma = true;
        }
    }
   
    $query.= ' WHERE id = ' .$exhibition_id;
    $result = $db->query($query);
    error_log('query : ' . $query);
    if($result !== false ){
        error_log('Update Effected Rows --' . mysqli_affected_rows($db));
        return mysqli_affected_rows($db);
    }else {
        error_log('[Update Error] --'.$db->error);
        return false;
    }
}

function db_prepareUpdate_allocation($db, $table, $data,$group_id,$user_id)
{
    $list_cols = $db->query('DESCRIBE '.$table);
    $nb_cols = mysqli_num_rows($list_cols);
    $query = 'UPDATE '.$table.' SET ';
    $answer = '';
    $add_comma = false;
    while($row = mysqli_fetch_assoc($list_cols)){
        $column = $row['Field'];
        if(array_key_exists($column, $data)){
            $descr = db_column_type($db, $table,$column);
            $count = (preg_match('/.*(time|date|datetime|char|text).*/i', $descr));
            $value = (empty($data[$column]) && $data[$column] != 0 ) ? null : html_entity_decode($data[$column]);
            $answer = out_put_value($count,$value);
            if($add_comma) {
                $query .= ', ';
            }
            $query .= '`'.$column.'`';
            $query .=  '='.$answer;

            $add_comma = true;
        }
    }
    $query.= ' WHERE group_id = ' .$group_id . ' AND user_id = ' . $user_id;
    error_log('query : ' . $query);
    $result = $db->query($query);
    if($result !== false ){
        error_log('Mutiple Update Effected Rows --' . mysqli_affected_rows($db));
        return mysqli_affected_rows($db);
    }else {
        error_log('[Update Error] --'.$db->error);
        return false;
    }
}

function db_prepareInsert($db, $table, $data)
{
    $list_cols = $db->query('DESCRIBE '.$table);
    $nb_cols = mysqli_num_rows($list_cols);
    $query = 'INSERT INTO '.$table.' (';
    $query_part_2 = '';
    $add_comma = false;
    while($row = mysqli_fetch_assoc($list_cols)){
        $column = $row['Field'];
        if(array_key_exists($column, $data)){
            $descr = db_column_type($db, $table,$column);
            $count = (preg_match('/.*(time|date|datetime|char|text).*/i', $descr));
            $value = isset($data[$column]) ? html_entity_decode($data[$column]) :NULL;
            if($add_comma) {
                $query .= ', ';
                $query_part_2 .= ', ';
            }
            $query_part_2 .= out_put_value($count,$value);
            $query .= '`'.$column.'`';
            $add_comma = true;
        }
    }
    $query .= ')';
    $query.= ' VALUE (' . $query_part_2;
    $query.= ')';
    $result = $db->query($query);
    error_log('query : ' . $query);
    if($result !== false ){
        error_log('Insert Effected Id --' . mysqli_insert_id($db));
        return mysqli_insert_id($db);
    }else {
        error_log('[Insert Error] --'.$db->error);
        return false;
    }
}

function db_prepareInsert_mutiple($db, $table, $data){
    $query = 'INSERT INTO '.$table.' (';
    $query_part_2 = '';
    $add_comma = false;
    $index = 0;
    foreach ($data as $group_id => $json_object) {
        $list_cols = $db->query('DESCRIBE '.$table);
        $nb_cols = mysqli_num_rows($list_cols);
        if($index >0 ) {
            $query_part_2 .= '),(';
        }
        $col_index = 0;
        while($row = mysqli_fetch_assoc($list_cols)){
            $column = $row['Field'];
            if(array_key_exists($column, $json_object)){
                $descr = db_column_type($db, $table,$column);
                $count = (preg_match('/.*(time|date|datetime|char|text).*/i', $descr));
                $value = isset($json_object[$column]) ? html_entity_decode($json_object[$column]) :NULL;
                if($index == 0 ){
                    if($add_comma) {
                        $query .= ', ';
                        $query_part_2 .= ', ';
                    }
                    $query_part_2 .= out_put_value($count,$value);
                    // 
                    $query .= '`'.$column.'`';
                    $add_comma = true;
                }else {
                    if($add_comma && $col_index>1) $query_part_2 .= ', ';
                    $query_part_2 .= out_put_value($count,$value);
                    $add_comma = true;
                }
        
            }
            $col_index++;
        }
        if($index == 0 ) $query .= ') VALUES (';
        $index++;
    }
    $query.= $query_part_2;
    $query.= ')';
    $result = $db->query($query);
    error_log('query : ' . $query);
    if($result !== false ){
        error_log('Mutiple Insert Effected Id --' . mysqli_insert_id($db));
        return mysqli_insert_id($db);
    }else {
        error_log('[Update Error] --'.$db->error);
        return false;
    }
}

function out_put_value($count,$value){
    $query_part_2 = '';
    if( (empty($value) && ($value !== 0 && $value !== '0' && $value !== '0.00' && $value !== 0.00)) || $value === ''  ){
        $query_part_2 .= "NULL"; 
    }else{
        if($count == 1){
            $query_part_2 .= "'$value'";
        }else {
            $query_part_2 .= $value;
        }
    }
    return $query_part_2;
}
function db_column_type($db, $table, $column){
    $type = false;
    $descr = db_descr_table($db, $table, $column);
    if(is_array($descr) && count($descr) == 1)
    $type = $descr[0]['Type'];
    return $type;
}

function db_descr_table($db, $table, $column = '')
{
    $data = array();
    $query = 'DESCRIBE '.$table;
    if($column != '') $query .= ' '.$column;
    $result = $db->query($query);
    while($value = mysqli_fetch_assoc($result)){
        $data[] = $value;
    }
    return $data;
}

function db_prepareDelete($db, $table,$user_id){
    $sql = "DELETE FROM $table WHERE id = $user_id";
    $result = $db->query($sql);
    error_log('db_prepareDelete : ' . $sql);
    if($result !== false ){
        error_log('Delete Record Id --' . $user_id);
        return $user_id;
    }else {
        error_log('[Delete Error] --'.$db->error);
        return false;
    }
}
function mark_create($data,$logged_id,$logged_name){
    $data['create_date'] = date('Y-m-d H:i:s');
    $data['create_by_id'] = $logged_id;
    $data['create_by_name'] = $logged_name;
    $data['status'] = 'active';
    return $data;
}
function mark_update($data,$logged_id,$logged_name){
    $data['edit_date'] = date('Y-m-d H:i:s');
    $data['edit_by_id'] = $logged_id;
    $data['edit_by_name'] = $logged_name;
    return $data;
}


function important_data_checking($id){
    if(empty($id) || $id == 0){
        return false;
    }
}


function db_rd_check_is_existing($connect,$sql){
    error_log('Check Duplicate Record : ' . $sql );
    $result_method = $connect->query($sql);
    if($result_method && mysqli_num_rows($result_method) > 0){
        return true;
    }else {
        return false;
    }
}
function exception_rollback($connect,$res,$e,$is_rollback){
    error_log('[Navtive Exception] --' . $e->getMessage());
    error_log('[DB Exception] --' . $connect->error);
    if($is_rollback)$connect->rollback();
    $res['message_status'] = false;
    $res['message'] .= $e->getMessage();
    return $res;
}

function record_upload_excel($connect,$e,$operation_type,$file_name,$file_path,$logged_id,$logged_name,$is_exception){
    $error = array();
    $error['operation_type'] = $operation_type;
    $error['file_name'] = $file_name;
    $error['file_name'] = $file_path;
    $error = mark_create($error,$logged_id,$logged_name);
    if($is_exception){
        $_SESSION['message_status'] = "fail";
        $_SESSION['message'] .= $e->getMessage();  

        error_log('[Navtive Exception] --' . $_SESSION['message']);
        error_log('[DB Exception] --' . $connect->error);
        $connect->rollback();
        $error['message'] .= $_SESSION['message'];
        $error['status'] = 'false';
        
    }else {
        $error['status'] = 'true';
    }
    db_prepareInsert($connect, 'upload_history', $error);    
}

function unmix_str($str){
    if(empty($str)) return $str;
    return str_replace(" ","",$str);
}

function convToUtf8($str) { 
    if( mb_detect_encoding($str,"UTF-8, ISO-8859-1, GBK")!="UTF-8" ) { 
        return  iconv("gbk","utf-8",$str); 
    } 
    else { 
        return $str; 
    } 
}

?>