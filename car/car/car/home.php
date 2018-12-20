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
    <script type="text/javascript" src="js/carList.js"></script>
    
    <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css">
    <link rel="stylesheet" href="assets/plugins/layer_slider/css/layerslider.css">
	<link rel="stylesheet" href="css/pages/portfolio-v1.css">
        
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    
	<!-- JS Implementing Plugins -->           
	<script type="text/javascript" src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
	<!-- Layer Slider -->           
	<script src="assets/plugins/layer_slider/jQuery/jquery-easing-1.3.js" type="text/javascript"></script>
	<script src="assets/plugins/layer_slider/jQuery/jquery-transit-modified.js" type="text/javascript"></script>
	<script src="assets/plugins/layer_slider/js/layerslider.transitions.js" type="text/javascript"></script>
	<script src="assets/plugins/layer_slider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
	
	<script src="assets/js/app.js" type="text/javascript"></script>    
    <script src="assets/js/sliding.js" type="text/javascript"></script>
    <?php
    	if( EC_isLogin() ){
			$isLogin = "Y";
			$userType = EC_getCurrentType();
		}else 
			$isLogin = "N";
		$pageId = 1;
    ?>
</head>
<body>
	<?php require_once("common/top.php"); ?>

<div class="layer_slider">
    <div id="layerslider-container-fw">        
        <div id="layerslider" style="width: 100%; height: 500px; margin: 0px auto; ">
            <div class="ls-layer" style="slidedirection: right; transition2d: 24,25,27,28; ">
                <img src="img/s1.jpg" class="ls-bg" alt="Slide background">
				<span class="ls-s-1" style="font-family:'Roboto Condensed'; color: #FFF; line-height:45px; font-weight: 200; font-size: 35px; top:30px; left: 670px; slidedirection : top; slideoutdirection : bottom; durationin : 1000; durationout : 1000; text-shadow: 2px 2px 2px rgba(0,0,0,0.55);">
                    <b>Find your best car deal while stationed abroad</b>
                </span>
                
            </div>

            <div class="ls-layer" style="slidedirection: top; ">
                <img src="img/s2.jpg" class="ls-bg" alt="Slide background">
				<span class="ls-s-1" style="font-family:'Roboto Condensed'; color: #FFF; line-height:45px; font-weight: 200; font-size: 35px; top:30px; left: 10px; slidedirection : right; slideoutdirection : left; durationin : 1000; durationout : 1000; text-shadow: 2px 2px 2px rgba(0,0,0,0.55);">
                    <b>Make Your Best Car Deal While<br/> Working Abroad</b>
                </span>                
            </div>

            <div class="ls-layer" style="slidedirection: right; transition2d: 92,93,105; ">
                <img src="img/s3.jpg" class="ls-bg" alt="Slide background">
				<span class="ls-s-1" style="font-family:'Roboto Condensed'; color: #FFF; line-height:45px; font-weight: 200; font-size: 35px; top:30px; left: 670px; slidedirection : bottom; slideoutdirection : top; durationin : 1000; durationout : 1000; text-shadow: 2px 2px 2px rgba(0,0,0,0.55);">
                    <b>Find your best car deal while stationed abroad</b>
                </span>                
            </div>
            <div class="ls-layer" style="slidedirection: top; ">
                <img src="img/s4.jpg" class="ls-bg" alt="Slide background">
				<span class="ls-s-1" style="font-family:'Roboto Condensed'; color: #FFF; line-height:45px; font-weight: 200; font-size: 35px; top:30px; left: 10px; slidedirection : left; slideoutdirection : right; durationin : 1000; durationout : 1000; text-shadow: 2px 2px 2px rgba(0,0,0,0.55);">
                    <b>Make Your Best Car Deal While<br/> Working Abroad</b>
                </span>                
            </div>
        </div>         
    </div>
</div>	
	<div class="container" style="margin-top:40px; min-height: 600px;">
		<div class="row">
			<div class="col-md-12">
				<h3 style="background:#2b2b2b;color:#f3f3f3;padding:10px;margin-bottom:10px;">Latest Cars</h3>
			</div>
			<div class="col-md-12">
				<div class="row">
					<?php
					$sql = "
						select t1.*, t2.ec_username, t3.ec_photo as ec_car_photo, t4.ec_title as ec_model_title, t5.ec_title as ec_manufacturer_title
						  from ec_car t1, ec_user t2, ec_car_image t3, ec_model t4, ec_manufacturer t5
						 where t1.ec_user = t2.ec_user
						   and t1.ec_car = t3.ec_car
						   and t1.ec_model = t4.ec_model
						   and t4.ec_manufacturer = t5.ec_manufacturer
						   and t1.ec_car_status = 'AUCTION'";
					
					if( $minSpeed != "" ) $sql.= " and t1.ec_speed >= $minSpeed ";
					if( $maxSpeed != "" ) $sql.= " and t1.ec_speed <= $maxSpeed ";

					if( $minYear != "" ) $sql.= " and t1.ec_year >= $minYear ";
					if( $maxYear != "" ) $sql.= " and t1.ec_year <= $maxYear ";
										
					if( $minPrice != "" ) $sql.= " and t1.ec_price >= $minPrice ";
					if( $maxPrice != "" ) $sql.= " and t1.ec_price <= $maxPrice ";
					
					if( $manufacturer != "" ) $sql.= " and t5.ec_manufacturer = $manufacturer ";
    		
					$sql.=" group by t1.ec_car
						 order by t1.ec_car desc
    					 limit 4";
					$carList = $db->queryArray( $sql );
					for( $i = 0; $i < count( $carList ); $i ++ ){
					?>
	                <div class="col-md-3" style="margin-bottom:10px;">
	                    <div class="thumbnail sidebar-nav-v1 "  style="box-shadow:3px 3px 10px #777; border-radius: 3px !important; overflow: hidden;padding:0px; border: 0px;">
                            <span class="overlay-zoom"  style="position:relative;cursor: default;">  
                                <img class="img-responsive" src="<?php echo $carList[$i]['ec_car_photo']?>" alt="" />
                                <?php if( $carList[$i]['ec_featured_yn'] == "Y" ){?>
								<span class="badge badge-red" style="position:absolute; right:0px; top:0px;z-index:300;font-size:14px;"><i class="icon-star"></i> FEATURED</span>
								<?php } ?>
                    			
                            </span>                                              
	                        <div class="caption">
	                            <h4><?php echo $carList[$i]['ec_manufacturer_title']?>( <?php echo $carList[$i]['ec_model_title']?> )</h4>
	                            <div class="clearboth"></div>                            
	                        </div>
	                        <div class="caption divPriceArea">
	                        	<b>PRICE : </b>
	                        	<span class="pull-right spanPriceArea"><?php echo number_format($carList[$i]['ec_price'])?> EGP</span>
	                        </div>
	                        
	                        <div class="caption divSpeedArea">
	                        	<b>SPEED:</b>
	                        	<span class="pull-right spanSpeedArea"><?php echo $carList[$i]['ec_speed']?> Km</span>
	                        	<div class="clearboth"></div>
								<p style="padding-top:20px;"><a href="carList.php" class="btn-u btn-u-blue"><i class="icon-list"></i>&nbsp;&nbsp;View Listing</a></p>
	                        </div>
	                    </div>
	                </div>
	                <?php } ?>
				</div>
				
				<div class="row" style="margin-top:60px;"> 
			        <div class="col-md-4">
			            <div class="view view-tenth">
			                <img class="img-responsive" src="img/p1.jpg" alt="">
			                <div class="mask">
			                    <h2>About Us</h2>
			                    <a href="aboutUs.php" class="info">Read More</a>
			                </div>                
			            </div>
			        </div>
			        <div class="col-md-4">
			            <div class="view view-tenth">
			                <img class="img-responsive" src="img/p2.jpg" alt="">
			                <div class="mask">
			                    <h2>Listing Cars</h2>
			                    <a href="carList.php" class="info">Read More</a>
			                </div>                
			            </div>
			        </div>
			        <div class="col-md-4">
			            <div class="view view-tenth">
			                <img class="img-responsive" src="img/p3.jpg" alt="">
			                <div class="mask">
			                    <h2>Contact Us</h2>
			                    <a href="contactUs.php" class="info">Read More</a>
			                </div>                
			            </div>
			        </div>
			    </div>				
				
			</div>
		</div>
	</div>
	<?php require_once("common/footer.php");?>
	<script type="text/javascript">
	    jQuery(document).ready(function() {
	      	App.init();
	        
	        Index.initLayerSlider();
	    });
	</script>	
</body>
</html>