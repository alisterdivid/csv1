<!DOCTYPE html>
<!--[if IE 8]><html lang="en" id="ie8" class="lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]><html lang="en" id="ie9" class="gt-ie8 lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <?php require_once("common/config.php"); ?>
    <?php require_once("common/DB_Connection.php"); ?>
    <?php require_once("common/header.php"); ?>
    <?php require_once("common/asset.php"); ?>
    <?php require_once("common/functions.php"); ?>
	<link rel="stylesheet" href="css/pages/page_log_reg_v1.css" />
	<link rel="stylesheet" href="css/pages/page_log_reg_v2.css" />
	<link rel="stylesheet" href="css/headers/header1.css">    
    <script type="text/javascript" src="js/biddingList.js"></script>
    <?php
    	if( EC_isLogin() ){
			$isLogin = "Y";
			$userType = EC_getCurrentType();
		}else 
			$isLogin = "N";
    	
    ?>
</head>
<body>
	<?php require_once("common/top.php"); ?>
	<div class="breadcrumbs margin-bottom-40">
	    <div class="container">
	        <h1 class="pull-left">Bidding List</h1>
	    </div>
	</div>	
	<div class="container" style="margin-top:40px; min-height: 600px;">
		<div class="row">
			<div class="col-md-12">
					<?php
					$sql = "
						select t1.*, t2.ec_username, t3.ec_photo as ec_car_photo, t4.ec_title as ec_model_title, t5.ec_title as ec_manufacturer_title
						  from ec_car t1, ec_user t2, ec_car_image t3, ec_model t4, ec_manufacturer t5
						 where t1.ec_user = t2.ec_user
						   and t1.ec_car = t3.ec_car
						   and t1.ec_model = t4.ec_model
						   and t4.ec_manufacturer = t5.ec_manufacturer
						 group by t1.ec_car
						 order by t1.ec_car desc";
					$carList = $db->queryArray( $sql );
					for( $i = 0; $i < count( $carList ); $i ++ ){
					?>
	                <div class="col-md-4" style="margin-bottom:10px;">
	                    <div class="thumbnail sidebar-nav-v1 ">
                            <span class="overlay-zoom"  style="position:relative;cursor: default;">  
                                <img class="img-responsive" src="<?php echo $carList[$i]['ec_car_photo']?>" alt="" />
								<span class="badge badge-green" style="position:absolute; right:0px; top:0px;z-index:300;"><?php echo $carList[$i]['ec_max_price']?> EGP</span>
                    			<span class="badge badge-blue" style="position:absolute; right:0px; bottom:10px;z-index:300;"><?php echo $carList[$i]['ec_username']?></span>
                            </span>
	                        <div class="caption">
	                            <h4><?php echo $carList[$i]['ec_manufacturer_title']?>( <?php echo $carList[$i]['ec_model_title']?> )&nbsp;&nbsp;&nbsp;<span class="badge badge-red"><?php echo $carList[$i]['ec_speed']?> Km</span>  <span class="badge badge-sea"><?php echo $carList[$i]['ec_year']?></span></h4>
	                            <div style="margin-top:15px; margin-bottom:10px;height: 55px;overflow:hidden;"><?php echo $carList[$i]['ec_description']?></div>
	                            <p><a href="biddingDetail.php?id=<?php echo base64_encode($carList[$i]['ec_car']."")?>" class="btn-u btn-u-small btn-u-blue pull-right"><i class="icon-star"></i> Read More &amp; Bid</a></p>
	                            <div class="clearboth"></div>                            
	                        </div>
	                    </div>
	                </div>
	                <?php } ?>
			</div>
		</div>
	</div>
	<?php require_once("common/footer.php");?>

</body>
</html>