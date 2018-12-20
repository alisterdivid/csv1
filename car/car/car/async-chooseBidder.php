<?php
	require_once("common/DB_Connection.php");	
    require_once("common/functions.php");

    $result = "success";
    $error = "";
    $data = array();
    
    $bidId = $_POST['bidId'];
    
    $sql = "update ec_bid
    		   set ec_allow_yn = 'Y'
    		 where ec_bid = '$bidId'";
    $db->query( $sql );
    
    $sql = "update ec_car
    		   set ec_car_status = 'SALED'
    		 where ec_car = (select ec_car from ec_bid where ec_bid = '$bidId')";
    $db->query( $sql );
    
    $sql = "select t2.ec_email, t1.ec_car from ec_bid t1, ec_user t2 where t1.ec_user = t2.ec_user and t1.ec_bid = '$bidId'";
    $dataResult = $db->queryArray( $sql );
    $bidderEmail = $dataResult[0]['ec_email'];
    $carId = $dataResult[0]['ec_car'];
    
    $subject = SITE_NAME;
    $message ="Good news!";
    $message.= "<br>";
    $message.="You are selected by Car Saler";
    // $message.= "<br>";
    // $message.= "http://".HOST_SERVER."/carDetail.php?id=".base64_encode($carId);
    $message.= "<br>";
    $message.= "From Auto Select Team";
    EC_sendEmail( $bidderEmail, $subject, $message );    
    
    $data['result'] = $result;
    $data['error'] = $error;
    header('Content-Type: application/json');
    echo json_encode($data);    
?>
