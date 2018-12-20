<?php
	require_once("common/DB_Connection.php");	
    require_once("common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $username = mysql_escape_string( $_POST['username'] );
    $password = mysql_escape_string( $_POST['password'] );    

    $sql = "select * from ec_user where ec_username = '$username' and ec_password = md5('$password')";
    $dataUser = $db->queryArray( $sql );
    
    if( $dataUser == null ){
    	$result = "failed";
    }else{
    	$userToken = $dataUser[0]['ec_token'];
    	EC_setCookie( "EC_TOKEN", $userToken );
    	$data['userToken'] = $userToken;
    }
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
