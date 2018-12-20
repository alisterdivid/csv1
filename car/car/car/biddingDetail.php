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
	<link rel="stylesheet" href="css/pages/blog.css" />
	<link rel="stylesheet" href="css/headers/header1.css">
	<link rel="stylesheet" href="css/default.css" />    
    <script type="text/javascript" src="js/biddingDetail.js"></script>
    <?php
    	if( EC_isLogin() ){
			$isLogin = "Y";
			$userType = EC_getCurrentType();
		}else 
			$isLogin = "N";
		$carId = base64_decode($_GET['id']);
    	$sql = "
			select t1.*, t2.ec_username, t3.ec_title as ec_model_title, t4.ec_title as ec_manufacturer_title
			  from ec_car t1, ec_user t2, ec_model t3, ec_manufacturer t4
			 where t1.ec_user = t2.ec_user
			   and t1.ec_model = t3.ec_model
			   and t3.ec_manufacturer = t4.ec_manufacturer
			   and t1.ec_car = $carId";
    	$dataCar = $db->queryArray( $sql );
    	$dataCar = $dataCar[0];
    	$currentPrice = $dataCar['ec_max_price'];
    ?>
</head>
<body>
	<input type="hidden" value="<?php echo $userType?>" id="userType">
	<input type="hidden" value="<?php echo $currentPrice?>" id="currentPrice">
	<input type="hidden" value="<?php echo $carId?>" id="carId">
	<?php require_once("common/top.php"); ?>
	<div class="breadcrumbs margin-bottom-40">
	    <div class="container">
	        <h1 class="pull-left">Bidding Detail</h1>
	    </div>
	</div>
	
	<div class="container blog-page blog-item" style="margin-top:40px; min-height: 600px;">
	
		<div class="panel panel-green margin-bottom-40">
        	<div class="panel-heading">
            	<h3 class="panel-title"><i class="icon-tasks"></i> Bidding Form</h3>
			</div>
            <div class="panel-body">                                                      
            	<div class="form-horizontal">
                	<div class="row">
                		<div class="col-lg-5">
                			<div class="form-group">
			                   	<label class="col-lg-4 control-label">Current Price : </label>
			                   	<label class="col-lg-4 control-label" style="color:#D10000; font-size:20px;" id="labelCurrentPrice"><?php echo $currentPrice;?> EGP</label>                			
			                </div>
                		</div>
                		<div class="col-lg-7">
                			<div class="form-group">
			                   	<label for="inputEmail1" class="col-lg-2 control-label">My Price : </label>
			                    <div class="col-lg-4">
			                      	<input type="text" class="form-control" id="myPrice" placeholder="My Price">
								</div>
								<div class="col-lg-2">
									<button class="btn-u btn-u-green" onclick="onSubmitBid()">Submit</button>
								</div>
							</div>
                		</div>
					</div>
                </div>
            </div>
        </div>	
		<hr/>
		<div class="row portfolio-item margin-bottom-50"> 
	        <!-- Carousel -->
	        <div class="col-md-6">
	            <div class="carousel slide carousel-v1" id="myCarousel">
	                <div class="carousel-inner">
	                	<?php
	                	$sql = "select * from ec_car_image where ec_car = $carId";
	                	$carImageList = $db->queryArray( $sql );
	                	for( $i = 0; $i < count( $carImageList ); $i ++ ){ 
	                	?>
	                    <div class="item <?php if( $i == 0 ) echo "active";?>">
	                        <img alt="" src="<?php echo $carImageList[$i]['ec_photo'];?>">
	                        <!-- div class="carousel-caption">
	                            <p>Facilisis odio, dapibus ac justo acilisis gestinas.</p>
	                        </div -->
	                    </div>
	                    <?php } ?>
	                </div>
	                
	                <div class="carousel-arrow">
	                    <a data-slide="prev" href="#myCarousel" class="left carousel-control">
	                        <i class="icon-angle-left"></i>
	                    </a>
	                    <a data-slide="next" href="#myCarousel" class="right carousel-control">
	                        <i class="icon-angle-right"></i>
	                    </a>
	                </div>
	            </div>
	        </div>
	        <!-- End Carousel -->
	
	        <!-- Content Info -->        
	        <div class="col-md-6">
	        	<h2><?php echo $dataCar['ec_manufacturer_title']?>( <?php echo $dataCar['ec_model_title']?> )</h2>
	        	
				<div class="row" >
					<div class="col-md-4" style="height:25px; line-height:25px;"><b>Dealer : </b><?php echo $dataCar['ec_username'];?></div>
					<div class="col-md-4" style="height:25px; line-height:25px;"><b>Year : </b><?php echo $dataCar['ec_year'];?></div>
					<div class="col-md-4" style="height:25px; line-height:25px;"><b>Speed : </b><?php echo $dataCar['ec_speed'];?> Km</div>
										
					<div class="col-md-6" style="height:25px; line-height:25px;"><b>Internal Color : </b><?php echo $dataCar['ec_color_int'];?></div>
					<div class="col-md-6" style="height:25px; line-height:25px;"><b>External Color : </b><?php echo $dataCar['ec_color_ext'];?></div>
					
					<div class="col-md-12" style="height:25px; line-height:25px;"><b>Video : </b><a href="<?php echo $dataCar['ec_video'];?>" target="_blank"><?php echo $dataCar['ec_video'];?></a></div>								
				</div>
				<br/>
	        	<hr/>
	        	<p style="font-weight:bold;">Description</p>
	            <p><?php echo $dataCar['ec_description']?></p>
	            <hr/>
	            <p><a class="btn-u btn-u-large" href="biddingList.php">BIDDING LIST</a></p>
	        </div>
	        <!-- End Content Info -->        
	    </div><!--/row-->
	    <hr/>
	    
	    <div class="post-comment">
	        <h3>Comments</h3>
	    </div>
		<div id="commentList">
			<?php
				$sql = "
					select t1.ec_content, t1.ec_created_time, t2.ec_username, t2.ec_photo
					  from ec_comment t1, ec_user t2
					 where t1.ec_user = t2.ec_user
					   and t1.ec_car = $carId
					 order by t1.ec_created_time desc";
				$commentList = $db->queryArray( $sql );
				for( $i = 0; $i < count( $commentList ); $i ++ ){
			?>
			<div class="media" id="commentItem">
		        <a class="pull-left">
		            <img class="media-object" src="<?php echo $commentList[$i]['ec_photo']?>" alt="" />
		        </a>
		        <div class="media-body" id="commentItem">
		            <h4 class="media-heading"><?php echo $commentList[$i]['ec_username']?> <span><i class='icon-time'> <?php echo $commentList[$i]['ec_created_time']?></i></span></h4>
		            <p><?php echo $commentList[$i]['ec_content']?></p>
					<hr/>
		        </div>
			</div>
			<?php } ?>
		</div>        	        
	</div>
	<?php require_once("common/footer.php");?>
</body>
</html>