<?php
	require_once("common/DB_Connection.php");	
    require_once("common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $userId = mysql_escape_string( $_POST['userId'] );
    $username = mysql_escape_string( $_POST['username'] );
    $password = mysql_escape_string( $_POST['password'] );
    $email = mysql_escape_string( $_POST['email'] );
    $phone = mysql_escape_string( $_POST['phone'] );
    $firstName = mysql_escape_string( $_POST['firstName'] );
    $lastName = mysql_escape_string( $_POST['lastName'] );
    $address = mysql_escape_string( $_POST['address'] );
    $userType = mysql_escape_string( $_POST['userType'] );
    $photo = mysql_escape_string( $_POST['photo'] );
    $description = mysql_escape_string( $_POST['description'] );
    
    if( $userId == "" ){
    	$token = time().EC_generateRandom( 32 );
		$sql = "insert into ec_user( ec_username, ec_password, ec_email, ec_firstname, ec_lastname, ec_phone, ec_address, ec_photo, ec_description, ec_valid_yn, ec_user_type, ec_token, ec_created_time, ec_updated_time)
				values('$username', md5('$password'), '$email', '$firstName', '$lastName', '$phone', '$address', '$photo', '$description', 'Y', '$userType', '$token', now(), now() )";
		$db->queryInsert( $sql );
    }else{
    	$sql = "update ec_user
    			   set ec_username = '$username'
    				 , ec_firstname = '$firstName'
    				 , ec_lastname = '$lastName'
    				 , ec_email = '$email'
    				 , ec_phone = '$phone'
    				 , ec_address = '$address'
    				 , ec_description = '$description'
		 	     	 , ec_photo = '$photo'
		 	     	 , ec_user_type = '$userType'
    				 , ec_updated_time = now()";
    	if( $password != "" )
    	$sql .= " , ec_password = md5('$password')";
    	$sql .= " where ec_user = $userId";
    	$db->query( $sql );		
    }
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
