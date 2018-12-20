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
    <script type="text/javascript" src="js/carMgrDetail.js"></script>
    <?php
    	if( EC_isLogin() && EC_getCurrentType() == "A" ){
			$pageNo = 2;
			$pageId = 6;
			$userType = EC_getCurrentType();
			$isLogin = "Y";
			if( isset( $_GET['id'] ) ){
				$carId = base64_decode( $_GET['id'] );
				$sql = "select t1.*, t2.ec_manufacturer from ec_car t1, ec_model t2 where t1.ec_car = '$carId' and t1.ec_model = t2.ec_model";
				$dataCar = $db->queryArray( $sql );
				$dataCar = $dataCar[0];
			}
		}else 
			echo "<script>window.location.href='carList.php';</script>";
    	
    ?>
</head>
<body>
	<input type="hidden" id="carId" value="<?php echo $carId;?>">
	<input type="hidden" id="noCarPhoto" value="<?php echo NO_CAR_PHOTO?>" >
	<?php require_once("common/top.php"); ?>
	<div class="breadcrumbs margin-bottom-40">
	    <div class="container">
	        <h1 class="pull-left">Car Management</h1>
	    </div>
	</div>
	<div class="container" style="margin-top:40px; min-height: 600px;">
		<div class="row">
			<?php require_once("leftMenu.php"); ?>
			<div class="col-md-9">
				<div class="panel panel-green margin-bottom-40">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><i class="icon-tasks"></i> Car Management</h3>
	                </div>
	                <div class="panel-body">                                                      
	                    <div class="form-horizontal">
	                        <div class="form-group">
	                        	<label class="col-lg-2 control-label">Status</label>
	                        	<div class="col-lg-4">
	                        		<select id="status" class="form-control">
	                        			<option value="PENDING" <?php if($dataCar['ec_car_status'] == "PENDING" ) echo "selected"; ?>>Pending</option>
	                        			<option value="AUCTION" <?php if($dataCar['ec_car_status'] == "AUCTION" ) echo "selected"; ?>>Auction</option>
	                        			<option value="SALED" <?php if($dataCar['ec_car_status'] == "SALED" ) echo "selected"; ?>>Saled</option>
	                        			<option value="REJECT" <?php if($dataCar['ec_car_status'] == "REJECT" ) echo "selected"; ?>>Reject</option>
	                        		</select>
	                        	</div>
	                        	
	                        	<label class="col-lg-2 control-label">Featured Y/N</label>
	                            <div class="col-lg-4">
	                            	<?php if($dataCar['ec_featured_yn'] == "Y" ){?>
	                                <input type="checkbox" id="featuredYn" checked style="margin-top: 10px;"/>
	                                <?php }else{?>
	                                <input type="checkbox" id="featuredYn" style="margin-top: 10px;"/>
	                                <?php }?>
	                            </div>
							</div>
	                        <div class="form-group">	
	                        	<label class="col-lg-2 control-label">Manufacturer</label>
	                            <div class="col-lg-4">
	                                <select id="manufacturer" class="form-control" onchange="onChangeManufacturer()">
	                                	<option value="">Select Manufacturer.</option>
	                                	<?php
	                                		$sql = "select * from ec_manufacturer";
	                                		$manuList = $db->queryArray( $sql );
	                                		for( $i = 0; $i < count( $manuList ); $i ++ ){
										?>
										<option value="<?php echo $manuList[$i]['ec_manufacturer']?>" <?php if( $manuList[$i]['ec_manufacturer'] == $dataCar['ec_manufacturer']) echo "selected"; ?>><?php echo $manuList[$i]['ec_title']?></option>
										<?php } ?>
	                                </select>
	                            </div>
	                        	<label class="col-lg-2 control-label">Model</label>
	                            <div class="col-lg-4">
	                                <select id="model" class="form-control" >
	                                	<option value="">Select Model.</option>
	                                	<?php
	                                		$sql = "select * from ec_model where ec_manufacturer = ".$dataCar['ec_manufacturer'];
	                                		$modelList = $db->queryArray( $sql );
	                                		for( $i = 0; $i < count( $modelList ); $i ++ ){
										?>
										<option value="<?php echo $modelList[$i]['ec_model']?>" <?php if( $modelList[$i]['ec_model'] == $dataCar['ec_model']) echo "selected"; ?>><?php echo $modelList[$i]['ec_title']?></option>
										<?php } ?>	                                	
	                                </select>
	                            </div>	                            
	                        </div>
	                        
	                        <div class="form-group">
	                        	<label class="col-lg-2 control-label">Year</label>
	                            <div class="col-lg-4">
	                                <input type="text" id="year" class="form-control" placeholder="Year" value="<?php echo $dataCar['ec_year'];?>"/>
	                            </div>
	                        	<label class="col-lg-2 control-label">Speed</label>
	                            <div class="col-lg-4">
	                                <input type="text" id="speed" class="form-control" placeholder="Speed" value="<?php echo $dataCar['ec_speed'];?>"/>
	                            </div>
	                        </div>
	                        
	                        <div class="form-group">
	                        	<label class="col-lg-2 control-label">Price</label>
	                            <div class="col-lg-4">
	                                <input type="text" id="price" class="form-control" placeholder="Price" value="<?php echo $dataCar['ec_price'];?>"/>
	                            </div>
	                        	<label class="col-lg-2 control-label">Sealed Y/N</label>
	                            <div class="col-lg-4">
	                            	<?php if($dataCar['ec_sealed_yn'] == "Y" ){?>
	                                <input type="checkbox" id="sealedYn" checked style="margin-top: 10px;"/>
	                                <?php }else{?>
	                                <input type="checkbox" id="sealedYn" style="margin-top: 10px;"/>
	                                <?php }?>
	                            </div>
	                        </div>
	                        
	                        <div class="form-group">
	                        	<label class="col-lg-2 control-label">Internal Color</label>
	                            <div class="col-lg-4">
	                                <input type="text" id="internalColor" class="form-control" placeholder="Internal Color" value="<?php echo $dataCar['ec_color_int'];?>"/>
	                            </div>
	                        	<label class="col-lg-2 control-label">External Color</label>
	                            <div class="col-lg-4">
	                                <input type="text" id="externalColor" class="form-control" placeholder="External Color" value="<?php echo $dataCar['ec_color_ext'];?>"/>
	                            </div>	                            
	                        </div>

	                        <div class="form-group">
	                        	<label class="col-lg-2 control-label">Video</label>
	                            <div class="col-lg-10">
	                                <input type="text" id="video" class="form-control" placeholder="Video URL"  value="<?php echo $dataCar['ec_video'];?>"/>
	                            </div>
							</div>	                        
	                        
	                        <div class="form-group">
	                        	<label class="col-lg-2 control-label">Description</label>
	                            <div class="col-lg-10">
	                                <textarea id="description" class="form-control" placeholder="Description" rows="3"><?php echo $dataCar['ec_description'];?></textarea>
	                            </div>	                            
	                        </div>
	                        	                                              	                        
							<div id="photoList">
								<?php 
									$sql = "select * from ec_car_image where ec_car = $carId";
									$carImageList = $db->queryArray( $sql );
									for( $i = 0; $i < count( $carImageList ); $i ++ ){
								?>
			                        <div class="form-group" id="photoItem">
			                            <label class="col-lg-2 control-label">Photo</label>
			                            <div class="col-lg-10">
											<form id="imageForm" method="post" enctype="multipart/form-data" action='async-uploadImage.php' style="margin-bottom:0px;">
												<input type="file" name="imageUpload" id="imageUpload" class="form-control" style="width: 75%;float:left;"/>						
												<input type="hidden" name="uploadType" value="car">
												<input type="hidden" id="imagePrevDiv" value="previewImage">
												<div id="previewImage" class="previewImage floatleft">
													<img src="<?php echo $carImageList[$i]['ec_photo'];?>" style="width:100%;"/>
												</div>
												<div class="clearboth"></div>
											</form>
			                            </div>
			                        </div>								
								<?php }?>
		                        <div class="form-group" id="photoItem">
		                            <label class="col-lg-2 control-label">Photo</label>
		                            <div class="col-lg-10">
										<form id="imageForm" method="post" enctype="multipart/form-data" action='async-uploadImage.php' style="margin-bottom:0px;">
											<input type="file" name="imageUpload" id="imageUpload" class="form-control" style="width: 75%;float:left;"/>						
											<input type="hidden" name="uploadType" value="car">
											<input type="hidden" id="imagePrevDiv" value="previewImage">
											<div id="previewImage" class="previewImage floatleft">
												<img src="<?php echo NO_CAR_PHOTO;?>" style="width:100%;"/>
											</div>
											<div class="clearboth"></div>
										</form>
		                            </div>
		                        </div>
	                        </div>
	                        <div class="form-group">
	                            <div class="col-lg-12" style="text-align:center;">
	                                <button class="btn-u btn-u-green" style="width:120px;" onclick="onSaveCar()"><i class="icon-save"></i> Save</button>
	                                <button class="btn-u btn-u-red" style="width:120px;" onclick="window.location.href='carMgrList.php';"><i class="icon-list"></i> List</button>
	                            </div>
	                        </div>						
	                    </div>
	                </div>	                
	            </div>
			</div>			
		</div>
	</div>
	<?php require_once("common/footer.php");?>
	<div class="form-group" id="clonePhotoItem" style="display:none;">
    	<label class="col-lg-2 control-label">Photo</label>
        <div class="col-lg-10">
			<form id="imageForm" method="post" enctype="multipart/form-data" action='async-uploadImage.php' style="margin-bottom:0px;">
				<input type="file" name="imageUpload" id="imageUpload" class="form-control" style="width: 75%;float:left;"/>						
				<input type="hidden" name="uploadType" value="car">
				<input type="hidden" id="imagePrevDiv" value="previewImage">
				<div id="previewImage" class="previewImage floatleft">
					<img src="<?php echo NO_CAR_PHOTO;?>" style="width:100%;"/>
				</div>
				<div class="clearboth"></div>
			</form>
        </div>
	</div>
</body>
</html>	