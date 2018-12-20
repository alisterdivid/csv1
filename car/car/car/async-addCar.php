<?php
	require_once("common/DB_Connection.php");	
    require_once("common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $userId = EC_getCurrentId();
    $carId = mysql_escape_string( $_POST['carId'] );
    $manufacturerId = mysql_escape_string( $_POST['manufacturerId'] );
    $modelId = mysql_escape_string( $_POST['modelId'] );
    $year = mysql_escape_string( $_POST['year'] );
    $price = mysql_escape_string( $_POST['price'] );
    $sealedYn = mysql_escape_string( $_POST['sealedYn'] );
    $speed = mysql_escape_string( $_POST['speed'] );
    $internalColor = mysql_escape_string( $_POST['internalColor'] );
    $externalColor = mysql_escape_string( $_POST['externalColor'] );
    $video = mysql_escape_string( $_POST['video'] );
    $description = mysql_escape_string( $_POST['description'] );
    $photo = $_POST['photo'];
    $status = mysql_escape_string( $_POST['status'] );
    $featuredYn = mysql_escape_string( $_POST['featuredYn'] );
    
    if( $carId == "" ){
    	$sql = "insert into ec_car( ec_user, ec_model, ec_year, ec_price, ec_speed, ec_color_int, ec_color_ext, ec_video, ec_description, ec_sealed_yn, ec_featured_yn, ec_car_status, ec_created_time, ec_updated_time)
    			values( '$userId', '$modelId', '$year', '$price', '$speed', '$internalColor', '$externalColor', '$video', '$description', '$featuredYn', '$sealedYn', '$status',now(), now())";
    	$db->queryInsert( $sql );
    	$carId = $db->getPrevInsertId();
    	
    	for( $i = 0; $i < count( $photo ); $i ++ ){
	    	$sql = "insert into ec_car_image( ec_car, ec_photo, ec_title, ec_created_time, ec_updated_time )
	    			values( '$carId', '".$photo[$i]."', '', now(), now() )";
	    	$db->queryInsert( $sql );
    	}
    }else{
    	
    	$sql = "select t1.*, t2.ec_email from ec_car t1, ec_user t2 where t1.ec_car = '$carId' and t1.ec_user = t2.ec_user";
    	$dataCar = $db->queryArray( $sql );
    	$dataCar = $dataCar[0];
    	$carStatus = $dataCar['ec_car_status'];
    	$salerEmail = $dataCar['ec_email'];
    	
    	if( $carStatus != $status && $status == 'AUCTION' ){
    		$subject = SITE_NAME;
    		$message = "Congratulation!";
    		$message.= "<br>";
    		$message.= "You added car is successfully APPROVED.";
    		$message.= "<br>";
    		// $message.= "http://".HOST_SERVER."/carDetail.php?id=".base64_encode($carId);
    		// $message.= "<br>";
    		$message.= "From Auto Select Team";
    		EC_sendEmail($salerEmail, $subject, $message);
    	}else if( $carStatus != $status && $status == 'REJECT' ) {
    		$subject = SITE_NAME;
    		
    		$message = "You added car is REJECTED.";
    		$message.= "<br>";
    		$message.= "From Auto Select Team";
    		EC_sendEmail($salerEmail, $subject, $message);    		
    	}
    	
    	$sql = "update ec_car
    			   set ec_user = '$userId'
    				 , ec_model = '$modelId'
    				 , ec_year = '$year'
    				 , ec_price = '$price'
    				 , ec_speed = '$speed'
    				 , ec_color_int = '$internalColor'
    				 , ec_color_ext = '$externalColor'
    				 , ec_video = '$video'
    				 , ec_description = '$description'
    				 , ec_sealed_yn = '$sealedYn'
    				 , ec_featured_yn = '$featuredYn'
    				 , ec_car_status = '$status'
    			 where ec_car = '$carId'";
    	$db->query( $sql );

    	$sql = "delete from ec_car_image where ec_car = '$carId'";
    	$db->query( $sql );
    	
    	for( $i = 0; $i < count( $photo ); $i ++ ){
    		$sql = "insert into ec_car_image( ec_car, ec_photo, ec_title, ec_created_time, ec_updated_time )
    				values( '$carId', '".$photo[$i]."', '', now(), now() )";
    		$db->queryInsert( $sql );
    	}
    }
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
