<?php
    require_once("common/DB_Connection.php");
    require_once("common/functions.php");
        
	$response = $_POST['response'];
	$accessToken = $_POST['accessToken'];
	
	$facebookID = $response['id'];
	$facebookName = $response['name'];
	$facebookEmail = $response['email'];
	$facebookUsername = $response['username'];
	$facebookFirstname = $response['first_name'];
	$facebookLastname = $response['last_name'];
	if( $facebookUsername == "" ){
		$facebookUsername = str_replace( " ", "", $facebookName ); 
	}
	$result = "success";

	$sql = "select t1.*, t2.ec_token from ec_user_sns t1, ec_user t2 where t1.ec_sns_id = '$facebookID' and t1.ec_user = t2.ec_user";
	$row = $db->queryArray( $sql );
	if( $row == null ){
		$token = time().EC_generateRandom( 32 );
		$sql = "insert into ec_user( ec_username, ec_password, ec_email, ec_firstname, ec_lastname, ec_photo, ec_valid_yn, ec_user_type, ec_token, ec_created_time, ec_updated_time )
				 value ( '$facebookUsername', '', '$facebookEmail', '$facebookFirstname', '$facebookLastname', 'http://graph.facebook.com/".$facebookID."/picture?type=large', 'Y', 'D', '$token', now(), now() )";
		$db->queryInsert( $sql );
		$userId = $db->getPrevInsertId();
		
		// Insert into RB_USER_SNS
		$sql = "insert into ec_user_sns( ec_user, ec_sns_id, ec_nickname, ec_email, ec_photo, ec_created_time, ec_updated_time )
				value ( $userId, '$facebookID', '$facebookName', '$facebookEmail', 'http://graph.facebook.com/".$facebookID."/picture?type=large', now(), now())";
		$db->queryInsert( $sql );
		$userSnsId = $db->getPrevInsertId();
		EC_setCookie( "EC_TOKEN", $token );			
	}else{
		EC_setCookie( "EC_TOKEN", $row[0]['ec_token'] );
	}

    $data['result'] = $result;
    $data['error'] = $error;
    
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
