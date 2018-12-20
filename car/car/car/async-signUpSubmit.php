<?php
	require_once("common/DB_Connection.php");	
    require_once("common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $username = mysql_escape_string( $_POST['username'] );
    $password = mysql_escape_string( $_POST['password'] );
    $email = mysql_escape_string( $_POST['email'] );
    $userType = mysql_escape_string( $_POST['userType'] );
    $phone = mysql_escape_string( $_POST['phone'] );

    $sql = "select * from ec_user where ec_username = '$username' or ec_email = '$email'";
    $dataUser = $db->queryArray( $sql );
    
    if( $dataUser == null ){
    	$token = time().EC_generateRandom( 32 );
    	$sql = "insert into ec_user( ec_username, ec_password, ec_email, ec_phone, ec_photo, ec_valid_yn, ec_user_type, ec_token, ec_created_time, ec_updated_time )
    			 value( '$username', md5('$password'), '$email', '$phone', '".NO_PROFILE_PHOTO."', 'Y', '$userType', '$token', now(), now() )";
    	$db->queryInsert( $sql );
    }else{
    	$result = "failed";
    }
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
