<?php
	require_once("common/DB_Connection.php");	
    require_once("common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $manufacturerId = mysql_escape_string( $_POST['manufacturerId'] );   

    $sql = "select * from ec_model where  ec_manufacturer = $manufacturerId";
    $dataModel = $db->queryArray( $sql );
    
    if( $dataModel == null ){
    	$dataModel = array( );
    }
    
    $data['modelList'] = $dataModel;
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
