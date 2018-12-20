<?php
	require_once("common/DB_Connection.php");	
    require_once("common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $userId = mysql_escape_string( $_POST['userId'] );
    $username = mysql_escape_string( $_POST['username'] );
    $password = mysql_escape_string( $_POST['password'] );
    $firstName = mysql_escape_string( $_POST['firstName'] );
    $lastName = mysql_escape_string( $_POST['lastName'] );
    $email = mysql_escape_string( $_POST['email'] );
    $phone = mysql_escape_string( $_POST['phone'] );
    $address = mysql_escape_string( $_POST['address'] );
    $description = mysql_escape_string( $_POST['description'] );
    $photo = $_POST['photo'];
    
    $sql = "update ec_user
    		   set ec_username = '$username'
    			 , ec_firstname = '$firstName'
    			 , ec_lastname = '$lastName'
    			 , ec_email = '$email'
    			 , ec_phone = '$phone'
    			 , ec_address = '$address'
    			 , ec_description = '$description'
    			 , ec_photo = '$photo'
    			 , ec_updated_time = now()";
	if( $password != "" )
		$sql .= " , ec_password = md5('$password')";    			 
	$sql .= " where ec_user = $userId";
	
	$db->query( $sql );
   
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
