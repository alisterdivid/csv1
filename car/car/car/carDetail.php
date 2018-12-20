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
    <script type="text/javascript" src="js/carDetail.js"></script>
    <?php
    	if( EC_isLogin() ){
			$isLogin = "Y";
			$userType = EC_getCurrentType();
		}else 
			$isLogin = "N";
		$carId = base64_decode($_GET['id']);
		$pageId = 2;
    	$sql = "
			select t1.*, t2.ec_username, t3.ec_title as ec_model_title, t4.ec_title as ec_manufacturer_title, t1.ec_user
			  from ec_car t1, ec_user t2, ec_model t3, ec_manufacturer t4
			 where t1.ec_user = t2.ec_user
			   and t1.ec_model = t3.ec_model
			   and t3.ec_manufacturer = t4.ec_manufacturer
			   and t1.ec_car = $carId";
    	$dataCar = $db->queryArray( $sql );
    	$dataCar = $dataCar[0];
    	$currentPrice = $dataCar['ec_max_price'];
    	$sealedYn = $dataCar['ec_sealed_yn'];
    	
    	$userId = EC_getCurrentId();
    	if( $dataCar['ec_user'] == $userId ){
			$isMyCar = "Y";
		}else{
			$isMyCar = "N";
		}
    ?>
</head>
<body>
	<input type="hidden" value="<?php echo $userType?>" id="userType">
	<input type="hidden" value="<?php echo $currentPrice?>" id="currentPrice">
	<input type="hidden" value="<?php echo $carId?>" id="carId">
	<?php require_once("common/top.php"); ?>
	<div style="position: relative;">
		<div id="divBackgroundArea"></div>
		<div class="container" style="padding-top:30px;">
			<p id="headerBreadcrum">
			Home &rsaquo; Listing Cars &rsaquo; <?php echo $dataCar['ec_manufacturer_title']?>( <?php echo $dataCar['ec_model_title']?> )
			</p>
			<hr style="border-top: 1px solid #999;">
			<h1 id="headerTitle"><?php echo $dataCar['ec_manufacturer_title']?>( <?php echo $dataCar['ec_model_title']?> )</h1>
		</div>
			
		<div class="container blog-page blog-item" style="margin-top:40px; min-height: 600px;">
			<?php if( $isMyCar != "Y" && EC_isLogin() && EC_getCurrentType() != "A" ){?>
			<div class="panel panel-black margin-bottom-40">
	        	<div class="panel-heading">
	            	<h3 class="panel-title"><i class="icon-tasks"></i> Bidding Form</h3>
				</div>
	            <div class="panel-body">                                                      
	            	<div class="form-horizontal">
	                	<div class="row">
	                		<div class="col-lg-5">
	                			<div class="form-group">
				                   	<label class="col-lg-4 control-label">Max Price : </label>
				                   	<label class="col-lg-4 control-label" style="color:#2387Eb; font-size:20px;" id="labelCurrentPrice">
				                   		<?php 
				                   		if( $sealedYn == "Y"){
				                   			echo "SEALED";
				                   		}else{
											echo $currentPrice." EGP";
										}
				                   		?>
				                   	</label>                			
				                </div>
	                		</div>
	                		<div class="col-lg-7">
	                			<div class="form-group">
				                   	<label for="inputEmail1" class="col-lg-2 control-label">My Price : </label>
				                    <div class="col-lg-4">
				                      	<input type="text" class="form-control" id="myPrice" placeholder="My Price">
									</div>
									<div class="col-lg-2">
										<button class="btn-u btn-u-blue" id="btnSubmitBid" onclick="onSubmitBid()">Submit</button>
									</div>
								</div>
	                		</div>
						</div>
	                </div>
	            </div>
	        </div>	
			<hr/>	
			<?php } ?>
			<div class="row portfolio-item margin-bottom-50"> 
		        <!-- Carousel -->
		        <div class="col-md-7">
		            <div class="carousel slide carousel-v1" id="myCarousel">
		                <div class="carousel-inner" style="border-radius: 5px !important; box-shadow: 0px 0px 10px #777;">
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
		        <div class="col-md-5">
		        	<div class="panel panel-black margin-bottom-40">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="icon-tasks"></i> Specifications</h3>
						</div>
						<table class="table table-striped">
							<tr>
								<th>Price : </th>
								<td colspan="3" style="font-size:20px;font-family: 'Roboto Condensed';color:#2387Eb;"><?php echo $dataCar['ec_price'];?> EGP</td>							
							</tr>						
							<tr>
								<th>Speed : </th>
								<td><?php echo $dataCar['ec_speed'];?></td>
								<th>Manufactured Year : </th>
								<td><?php echo $dataCar['ec_year'];?></td>								
							</tr>
							<tr>
								<th>Internal Color : </th>
								<td><?php echo $dataCar['ec_color_int'];?></td>
								<th>External Color : </th>
								<td><?php echo $dataCar['ec_color_ext'];?></td>								
							</tr>	
							<tr>
								<th>Video : </th>
								<td colspan="3"><a href="<?php echo $dataCar['ec_video'];?>" target="_blank"><?php echo $dataCar['ec_video'];?></a></td>							
							</tr>
							<tr>
								<td colspan="4">
									<b>Description :</b> 
								</td>							
							</tr>
							<tr>
								<td colspan="4" style="padding-left: 20px;">
									<?php echo $dataCar['ec_description']?>
								</td>							
							</tr>
						</table>		        	
		        	</div>
	        		<?php 
	        			$sql = "select * from ec_user where ec_user = ".$dataCar['ec_user'];
	        			$dataDealer = $db->queryArray( $sql );
	        			$dataDealer = $dataDealer[0];
	        		?>		        	
					<div class="panel panel-black margin-bottom-40">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="icon-user"></i> Saler Information</h3>
						</div>
						<table class="table table-striped">
				
							<tr>
								<th>Username : </th>
								<td><?php echo $dataDealer['ec_username'];?></td>
								<th>Name : </th>
								<td><?php echo $dataDealer['ec_firstname']." ".$dataDealer['ec_lastname'];?></td>								
							</tr>
							<tr>
								<th>Email : </th>
								<td><?php echo $dataDealer['ec_email'];?></td>
								<th>Phone : </th>
								<td><?php echo $dataDealer['ec_phone'];?></td>								
							</tr>	
							<tr>
								<th>Address : </th>
								<td colspan="3"><?php echo $dataDealer['ec_address'];?></td>							
							</tr>
							<tr>
								<td colspan="4">
									<b>Description :</b> 
								</td>							
							</tr>
							<tr>
								<td colspan="4" style="padding-left: 20px;">
									<?php echo $dataDealer['ec_description'];?>
								</td>							
							</tr>
						</table>		        	
		        	</div>		        	

		            <p><a class="btn-u btn-u-blue btn-u-large" href="carList.php">CAR LIST</a></p>
		        </div>
		        <!-- End Content Info -->        
		    </div><!--/row-->
		    <hr/>
		    <?php if( $isMyCar == "Y" ){?>
		    <div id="bidList">
				<div class="panel panel-black margin-bottom-40">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="icon-tasks"></i> Bidder List</h3>
					</div>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Photo</th>
								<th>Username</th>
								<th>Price</th>
								<th>Bid Time</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
				    	<?php 
					    	$sql = "
								select t1.ec_bid_price, t1.ec_allow_yn, t2.ec_username, t2.ec_photo, t1.ec_created_time, t1.ec_user, t1.ec_bid
								  from ec_bid t1, ec_user t2
								 where t1.ec_user = t2.ec_user
								   and t1.ec_car = $carId
					    		  order by t1.ec_bid_price * 1 desc";
				    		$bidList = $db->queryArray( $sql );
				    		$bidChoosen = "N";
				    		for( $i = 0; $i < count( $bidList ); $i ++ ){
				    	?>					
							<tr>
								<td><?php echo $i + 1;?></td>
								<td><img src="<?php echo $bidList[$i]['ec_photo'];?>" style="width:50px; height: 50px;"/></td>
								<td><?php echo $bidList[$i]['ec_username'];?></td>
								<td><?php echo $bidList[$i]['ec_bid_price']." EGP";?></td>
								<td><?php echo $bidList[$i]['ec_created_time'];?></td>
								<td>
									<?php if( $bidList[$i]['ec_allow_yn'] == "N" ){?>
										<a class="btn btn-info btn-xs" onclick="onChooseBidder( this )">Choose Me</a>
									<?php }else{
										$bidChoosen = "Y";
									?>
										<a class="btn btn-danger btn-xs">Choosen</a>
									<?php } ?>
									<input type="hidden" id="bidId" value="<?php echo $bidList[$i]['ec_bid'];?>">
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
		    </div>
		    <input type="hidden" id="bidChoosen" value="<?php echo $bidChoosen;?>">
		    <hr/>
		    <?php } ?>
		    
		    <?php if( EC_isLogin() ){?>
		    <div class="post-comment">
		        <h3 style="color:#3498db;">Leave a Comment</h3>
	            <label>Comment</label>
	            <div class="row margin-bottom-20">
	                <div class="col-md-11 col-md-offset-0">
	                    <textarea class="form-control" rows="4" id="comment"></textarea>
	                </div>                
	            </div>
	            
	            <p><button class="btn-u btn-u-blue" onclick="onSendComment()">Send Comment</button></p>
		    </div>
		    <hr/>
		    <?php } ?>
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
			        <div class="media-body">
			            <h4 class="media-heading"><?php echo $commentList[$i]['ec_username']?> <span><i class='icon-time'> <?php echo $commentList[$i]['ec_created_time']?></i></span></h4>
			            <p><?php echo $commentList[$i]['ec_content']?></p>
						<hr/>
			        </div>
				</div>
				<?php } ?>
			</div>        	        
		</div>
	</div>
	<?php require_once("common/footer.php");?>
	<div class="media" id="cloneCommentItem" style="display:none;">         
        <a class="pull-left">
            <img class="media-object" id="photo" src="img/profile/noPhoto.png" alt="" />
        </a>
        <div class="media-body">
            <h4 class="media-heading" id="header">Media heading <span>5 hours ago </span></h4>
            <p id="txtComment">Donec id erum quidem rerumd facilis est et expedita distinctio lorem ipsum dolorlit non mi portas sats eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna..</p>
			<hr/>
        </div>
	</div>
</body>
</html>