<?php
	require_once("common/DB_Connection.php");	
    require_once("common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $userId = EC_getCurrentId();
    $carId = mysql_escape_string( $_POST['carId'] );
	$price = mysql_escape_string( $_POST['price'] );
	
	$sql = "select * from ec_car where ec_car = $carId";
	$maxPrice = $db->queryArray( $sql );
	$sealedYn = $maxPrice[0]['ec_sealed_yn'];
	$maxPrice = $maxPrice[0]['ec_max_price'];
	
	
	$data['price'] = "";
	if( $price * 1 > $maxPrice * 1 ){
		$maxPrice = $price;
		$sql = "update ec_car
				   set ec_max_price = '$maxPrice'
				 where ec_car = '$carId'";
		$db->query( $sql );
		if( $sealedYn == "N" )
			$data['price'] = $maxPrice;
	}

	/* if( $maxPrice > $price ){
		$result = "failed";
		$data['price'] = $maxPrice; 
	}else{ */
		$sql = "insert into ec_bid( ec_user, ec_car, ec_bid_price, ec_allow_yn, ec_created_time, ec_updated_time)
				values( $userId, $carId, '$price', 'N', now(), now())";
		$db->queryInsert( $sql );
	// }
	
	$sql = "select t2.ec_email from ec_car t1, ec_user t2 where t1.ec_user = t2.ec_user and t1.ec_car = $carId";
	$ownerEmail = $db->queryArray( $sql );
	$ownerEmail = $ownerEmail[0]['ec_email'];

	$sql = "select * from ec_user where ec_user = $userId";
	$dataUser = $db->queryArray( $sql );
	$username = $dataUser[0]['ec_username'];
		
	$subject = "Auto Select";
	
	$message ="Good news!";
	$message.= "<br>";
	$message.="Your car has been bidded by '$username' with $price EGP.";
	$message.= "<br>";
	// $message.= "<a href='$url'>Click here</a> to visit that car.";
	// $message.= "<br>";
	$message.= "From Auto Select Team";
	EC_sendEmail( $ownerEmail, $subject, $message );
	
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
