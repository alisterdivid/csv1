<?php
	require_once("common/DB_Connection.php");	
    require_once("common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $carIds = $_POST['carIds'];
    $sql = "delete from ec_car where ec_car in ( $carIds )";
    $db->query( $sql );
    
    $sql = "delete from ec_bid where ec_car in ( $carIds )";
    $db->query( $sql );

    $sql = "delete from ec_comment where ec_car in ( $carIds )";
    $db->query( $sql );    
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);
?>