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
    	
		$minSpeed = $_POST['minSpeed'];
		$maxSpeed = $_POST['maxSpeed'];

		$minPrice = $_POST['minPrice'];
		$maxPrice = $_POST['maxPrice'];

		$minYear = $_POST['minYear'];
		$maxYear = $_POST['maxYear'];
		
		$manufacturer = $_POST['manufacturer'];
		
		$pageId = 2;
    ?>
</head>
<body>
	<?php require_once("common/top.php"); ?>
	<div style="position: relative;">
		<div id="divBackgroundArea"></div>
		<div class="container" style="padding-top:30px;">
			<p id="headerBreadcrum">
			Home &rsaquo; Listing Cars
			</p>
			<hr style="border-top: 1px solid #999;">
			<h1 id="headerTitle">Listing Cars</h1>
		</div>
		
		<div class="container" style="margin-top:40px; min-height: 600px;">
			<div class="row">
				<div class="col-md-9">
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
							 order by t1.ec_car desc";
						$carList = $db->queryArray( $sql );
						for( $i = 0; $i < count( $carList ); $i ++ ){
						?>
		                <div class="col-md-6" style="margin-bottom:40px;">
		                    <div class="thumbnail sidebar-nav-v1 " style="box-shadow:3px 3px 10px #777; border-radius: 3px !important; overflow: hidden;padding:0px;border:0px;">
		                        <div class="caption">
		                            <h4 style="font-weight: bold !important; margin-bottom: 0px; margin-top: 10px; font-size: 24px;"><?php echo $carList[$i]['ec_manufacturer_title']?>( <?php echo $carList[$i]['ec_model_title']?> )</h4>
		                            <div class="clearboth"></div>                            
		                        </div>		                    
	                            <span class="overlay-zoom"  style="position:relative;cursor: default;">  
	                                <img class="img-responsive" src="<?php echo $carList[$i]['ec_car_photo']?>" alt="" />
	                                <?php if( $carList[$i]['ec_featured_yn'] == "Y" ){?>
									<span class="badge badge-red" style="position:absolute; right:0px; top:0px;z-index:300;font-size:14px;"><i class="icon-star"></i> FEATURED</span>
									<?php } ?>
	                    			
	                            </span>                                              
		                        <div class="caption divPriceArea">
		                        	<b>PRICE : </b>
		                        	<span class="pull-right spanPriceArea"><?php echo number_format($carList[$i]['ec_price'])?> EGP</span>
		                        	<div class="clearboth"></div>
		                        </div>
		                        
		                        <div class="caption divSpeedArea">
		                        	<b>SPEED:</b>
		                        	<span class="pull-right spanSpeedArea"><?php echo $carList[$i]['ec_speed']?> Km</span>
		                        	<div class="clearboth"></div>
									<p style="padding-top:20px;">
										<a href="carDetail.php?id=<?php echo base64_encode($carList[$i]['ec_car'])?>" class="btn-u btn-u-blue pull-right"><i class="icon-share-alt"></i>&nbsp;&nbsp;View Detail</a>
										<div class="clearboth"></div>
									</p>
		                        </div>           
		                    </div>
		                </div>
		                <?php } ?>
					</div>
				</div>
				<div class="col-md-3">
				
					<div class="panel panel-black margin-bottom-40">
		                <div class="panel-heading">
		                    <h3 class="panel-title"><i class="icon-search"></i> Search</h3>
		                </div>
		                <div class="panel-body">                                                      
		                    <form class="form-horizontal" method="post">
		                        <div class="form-group">
		                        	<label class="col-lg-2 control-label">Manufacturer</label>
		                            <div class="col-lg-12">
		                                <select id="manufacturer" name="manufacturer" class="form-control" >
		                                	<option value="">Select Manufacturer.</option>
		                                	<?php
		                                		$sql = "select * from ec_manufacturer";
		                                		$manuList = $db->queryArray( $sql );
		                                		for( $i = 0; $i < count( $manuList ); $i ++ ){
											?>
											<option value="<?php echo $manuList[$i]['ec_manufacturer']?>" <?php if( $manuList[$i]['ec_manufacturer'] == $manufacturer ) echo "selected"; ?>><?php echo $manuList[$i]['ec_title']?></option>
											<?php } ?>
		                                </select>
		                            </div>
		                        </div>
		                        
		                        <div class="form-group">
		                        	<div class="col-lg-12">
		                        		<label class="control-label">Speed( Km )</label>
		                        	</div>
		                            <div class="col-lg-6">
		                                <input type="text" class="form-control" id="minSpeed" name="minSpeed" placeholder="Min Speed" value="<?php echo $minSpeed;?>">
		                            </div>
		                            <div class="col-lg-6">
		                                <input type="text" class="form-control" id="maxSpeed" name="maxSpeed" placeholder="Max Speed" value="<?php echo $maxSpeed;?>">
		                            </div>	                            
		                        </div>
		                        
		                        <div class="form-group">
		                        	<div class="col-lg-12">
		                        		<label class="control-label">Price( EGP )</label>
		                        	</div>
		                            <div class="col-lg-6">
		                                <input type="text" class="form-control" id="minPrice" name="minPrice" placeholder="Min Price" value="<?php echo $minPrice;?>">
		                            </div>
		                            <div class="col-lg-6">
		                                <input type="text" class="form-control" id="maxPrice" name="maxPrice" placeholder="Max Price" value="<?php echo $maxPrice;?>">
		                            </div>	                            
		                        </div>	
		                        
		                        <div class="form-group">
		                        	<div class="col-lg-12">
		                        		<label class="control-label">Manufactured Year</label>
		                        	</div>
		                            <div class="col-lg-6">
		                                <input type="text" class="form-control" id="minYear" name="minYear" placeholder="Min Year" value="<?php echo $minYear;?>">
		                            </div>
		                            <div class="col-lg-6">
		                                <input type="text" class="form-control" id="maxYear" name="maxYear" placeholder="Max Year" value="<?php echo $maxYear;?>">
		                            </div>	                            
		                        </div>	                                                
								<hr/>
		                        <div class="form-group">
		                            <div class="col-lg-6">
		                                <button class="btn-u btn-u-green btn-block" onclick="return onSearch();"><i class="icon-search"></i> Search</button>
		                            </div>
		                            <div class="col-lg-6">
		                                <button class="btn-u btn-u-red btn-block" onclick="return onClear();"><i class="icon-eraser"></i> Clear</button>
		                            </div>	                            	                            
		                        </div>
		                    </form>
		                </div>
		            </div>
					<div class="panel panel-black1 margin-bottom-40">
		                <div class="panel-heading">
		                    <h3 class="panel-title"><i class="icon-home"></i> Contact Information</h3>
		                </div>
		                <div class="panel-body">
		                	<p>
		                		<b>Service : </b>(123) 456-7890
		                	</p>
		                	<p>
		                		<b>Sales : </b>(123) 456-7890
		                	</p>
		                	<p>
		                		<b>Email : </b>support@autoselectcars.com
		                	</p>
		                	<p>
		                		<b>Address : </b>2800 Corby Ave, Santa Rosa, CA 95407
		                	</p>		                	
		                </div>
					</div>
					<div class="panel panel-black1 margin-bottom-40">
		                <div class="panel-heading">
		                    <h3 class="panel-title"><i class="icon-home"></i> Business Hours</h3>
		                </div>
		                <div class="panel-body">
		                	<p>
		                		<b>Monday-Friday : </b>10am to 8pm
		                	</p>
		                	<p>
		                		<b>Saturday : </b>11am to 3pm
		                	</p>
		                	<p>
		                		<b>Sunday : </b>Closed
		                	</p>  	
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