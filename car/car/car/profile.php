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
    <script type="text/javascript" src="js/profile.js"></script>
    <?php
    	if( EC_isLogin() ){
			$isLogin = "Y";
			$userType = EC_getCurrentType();
		}else{
			$isLogin = "N";
		}
		
		if( $isLogin == "N" ){
			echo "<script>window.location.href='carList.php';</script>";
		}
		
		$userId = EC_getCurrentId();
		$sql = "select * from ec_user where ec_user = $userId";
		$dataUser = $db->queryArray( $sql );
		$dataUser = $dataUser[ 0 ];
    ?>
</head>
<body>
	<input type="hidden" id="userId" value="<?php echo $userId;?>">
	<?php require_once("common/top.php"); ?>
	<div class="breadcrumbs margin-bottom-40">
	    <div class="container">
	        <h1 class="pull-left">Profile</h1>
	    </div>
	</div>	
	<div class="container" style="margin-top:40px; min-height: 600px;">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
			
				<div class="panel panel-green margin-bottom-40">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><i class="icon-user"></i> Profile</h3>
	                </div>
	                <div class="panel-body">                                                      
	                    <div class="form-horizontal">	                        
	                        <div class="form-group">
	                        	<label class="col-lg-2 control-label">Username</label>
	                            <div class="col-lg-4">
	                                <input type="text" id="username" class="form-control" readonly placeholder="Username" value="<?php echo $dataUser['ec_username']?>" style="background:#FFF; cursor: pointer; "/>
	                            </div>
	                        	<label class="col-lg-2 control-label">Password</label>
	                            <div class="col-lg-4">
	                                <input type="password" id="password" class="form-control" placeholder="Password"/>
	                            </div>	                            
	                        </div>
	                        
	                        <div class="form-group">
	                        	<label class="col-lg-2 control-label">First Name</label>
	                            <div class="col-lg-4">
	                                <input type="text" id="firstName" class="form-control" placeholder="First Name" value="<?php echo $dataUser['ec_firstname']?>"/>
	                            </div>
	                        	<label class="col-lg-2 control-label">Last Name</label>
	                            <div class="col-lg-4">
	                                <input type="text" id="lastName" class="form-control" placeholder="Last Name" value="<?php echo $dataUser['ec_lastname']?>"/>
	                            </div>	                            
	                        </div>	 
	                        
	                        <div class="form-group">
	                        	<label class="col-lg-2 control-label">Email</label>
	                            <div class="col-lg-4">
	                                <input type="text" id="email" class="form-control" placeholder="Email Address" value="<?php echo $dataUser['ec_email']?>"/>
	                            </div>
	                        	<label class="col-lg-2 control-label">Phone</label>
	                            <div class="col-lg-4">
	                                <input type="text" id="phone" class="form-control" placeholder="Phone No" value="<?php echo $dataUser['ec_phone']?>"/>
	                            </div>	                            
	                        </div>	                                               
	                        
	                        <div class="form-group">
	                        	<label class="col-lg-2 control-label">Address</label>
	                            <div class="col-lg-10">
	                                <input type="text" id="address" class="form-control" placeholder="Address" value="<?php echo $dataUser['ec_address']?>"/>
	                            </div>
							</div>	                        
	                        
	                        <div class="form-group">
	                        	<label class="col-lg-2 control-label">Description</label>
	                            <div class="col-lg-10">
	                                <textarea id="description" class="form-control" placeholder="Description" rows="3"><?php echo $dataUser['ec_description']?></textarea>
	                            </div>	                            
	                        </div>
                        	                                              	                        
	                        <div class="form-group">
	                            <label class="col-lg-2 control-label">Photo</label>
	                            <div class="col-lg-10">
									<form id="imageForm" method="post" enctype="multipart/form-data" action='async-uploadImage.php' style="margin-bottom:0px;">
										<input type="file" name="imageUpload" id="imageUpload" class="form-control" style="width: 75%;float:left;"/>						
										<input type="hidden" name="uploadType" value="profile">
										<input type="hidden" id="imagePrevDiv" value="previewImage">
										<div id="previewImage" class="previewImage floatleft">
											<img src="<?php echo $dataUser['ec_photo'];?>" style="width:100%;"/>
										</div>
										<div class="clearboth"></div>
									</form>
	                            </div>
	                        </div>
	                        
	                        <hr/>
	                        <div class="form-group">
	                        	<div class="col-lg-10 col-lg-offset-2">
		                            <div class="col-lg-3 col-lg-offset-4">
		                                <button class="btn-u btn-u-blue" onclick="onSaveUser( )"><i class="icon-save"></i> Save User</button>
		                            </div>		                            	                        	
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