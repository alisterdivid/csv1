<?php
	require_once("common/DB_Connection.php");	
    require_once("common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $userIds = $_POST['userIds'];
    $sql = "delete from ec_user where ec_user in ( $userIds )";
    $db->query( $sql );
    
    $sql = "delete from ec_car where ec_user in ( $userIds )";
    $db->query( $sql );    
    
    $sql = "delete from ec_comment where ec_user in ( $userIds )";
    $db->query( $sql );

    $sql = "delete from ec_user_sns where ec_user in ( $userIds )";
    $db->query( $sql );    
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);
?>