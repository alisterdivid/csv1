<?php
	require_once("common/DB_Connection.php");	
    require_once("common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $userId = EC_getCurrentId();
    $txtComment = mysql_escape_string( $_POST['txtComment'] );
    $carId = mysql_escape_string( $_POST['carId'] );
    
    $sql = "insert into ec_comment( ec_car, ec_user, ec_content, ec_created_time, ec_updated_time)
    		values( '$carId', '$userId', '$txtComment', now(), now())";
    $db->queryInsert( $sql );
    
    $commentId = $db->getPrevInsertId();
    
    $sql = "select * from ec_comment where ec_comment = $commentId";
    $dataResult = $db->queryArray( $sql );
    $data['createdTime'] = $dataResult[0]['ec_created_time'];
    
    $sql = "select * from ec_user where ec_user = $userId";
    $dataResult = $db->queryArray( $sql );
    
    $data['photo'] = $dataResult['0']['ec_photo'];
    $data['username'] = $dataResult['0']['ec_username'];
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
