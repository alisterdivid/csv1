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
    <script type="text/javascript" src="js/userMgrDetail.js"></script>
    <?php
    	if( EC_isLogin() && EC_getCurrentType() == "A" ){
			$pageNo = 1;
			$userType = EC_getCurrentType();
			$isLogin = "Y";
			$pageId = 6;
			if( isset( $_GET['id'] ) ){
				$userId = base64_decode( $_GET['id'] );
				$sql = "select * from ec_user where ec_user = '$userId'";
				$dataUser = $db->queryArray( $sql );
				$dataUser = $dataUser[0];
			}
		}else 
			echo "<script>window.location.href='carList.php';</script>";
    	
    ?>
</head>
<body>
	<input type="hidden" id="userId" value="<?php echo $userId;?>">
	<?php require_once("common/top.php"); ?>
	<div class="breadcrumbs margin-bottom-40">
	    <div class="container">
	        <h1 class="pull-left">User Management</h1>
	    </div>
	</div>
	<div class="container" style="margin-top:40px; min-height: 600px;">
		<div class="row">
			<?php require_once("leftMenu.php"); ?>
			<div class="col-md-9">
				<div class="panel panel-green margin-bottom-40">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><i class="icon-tasks"></i> User Management</h3>
	                </div>
	                <div class="panel-body">                                                      
	                    <div class="form-horizontal">
	                        <div class="form-group">
	                            <label class="col-lg-2 control-label">Username</label>
	                            <div class="col-lg-4">
	                                <input type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $dataUser['ec_username']?>">
	                            </div>
	                            <label class="col-lg-2 control-label">Password</label>
	                            <div class="col-lg-4">
	                                <input type="password" class="form-control" id="password" placeholder="Username">
	                            </div>	                            
	                        </div>
	                        
	                        <div class="form-group">
	                            <label class="col-lg-2 control-label">Email</label>
	                            <div class="col-lg-4">
	                                <input type="text" class="form-control" id="email" placeholder="Email" value="<?php echo $dataUser['ec_email']?>">
	                            </div>
	                            <label class="col-lg-2 control-label">Phone</label>
	                            <div class="col-lg-4">
	                                <input type="text" class="form-control" id="phone" placeholder="Phone" value="<?php echo $dataUser['ec_phone']?>">
	                            </div>	                            
	                        </div>                     
	                        
	                        <div class="form-group">
	                            <label class="col-lg-2 control-label">First Name</label>
	                            <div class="col-lg-4">
	                                <input type="text" class="form-control" id="firstName" placeholder="First Name" value="<?php echo $dataUser['ec_firstname']?>">
	                            </div>
	                            <label class="col-lg-2 control-label">Last Name</label>
	                            <div class="col-lg-4">
	                                <input type="text" class="form-control" id="lastName" placeholder="Last Name" value="<?php echo $dataUser['ec_lastname']?>">
	                            </div>	                            
	                        </div>        
	                        
	                        <div class="form-group">
	                            <label class="col-lg-2 control-label">Address</label>
	                            <div class="col-lg-4">
	                                <input type="text" class="form-control" id="address" placeholder="Address" value="<?php echo $dataUser['ec_address']?>">
	                            </div>
	                            <label class="col-lg-2 control-label">User Type</label>
	                            <div class="col-lg-4">
	                                <select class="form-control" id="userType">
	                                	<option value="">Please select User Type.</option>
	                                	<option value="D" <?php if( $dataUser['ec_user_type'] == "D") echo "selected";?>>User</option>
	                                	<option value="A" <?php if( $dataUser['ec_user_type'] == "A") echo "selected";?>>Admin</option>
	                                </select>
	                            </div>	                                                        
	                        </div>
	                        
	                        <div class="form-group" id="photoItem">
	                            <label class="col-lg-2 control-label">Photo</label>
	                            <div class="col-lg-10">
									<form id="imageForm" method="post" enctype="multipart/form-data" action='async-uploadImage.php' style="margin-bottom:0px;">
										<input type="file" name="imageUpload" id="imageUpload" class="form-control" style="width: 75%;float:left;"/>						
										<input type="hidden" name="uploadType" value="profile">
										<input type="hidden" id="imagePrevDiv" value="previewImage">
										<div id="previewImage" class="previewImage floatleft">
											<?php if( $userId == "" ){ ?>
												<img src="<?php echo NO_PROFILE_PHOTO;?>" style="width:100%;"/>
											<?php }else{?>
												<img src="<?php echo $dataUser['ec_photo'];?>" style="width:100%;"/>
											<?php }?>
										</div>
										<div class="clearboth"></div>
									</form>
	                            </div>
	                        </div>		                        

	                        <div class="form-group">
	                            <label class="col-lg-2 control-label">Description</label>
	                            <div class="col-lg-10">
	                                <textarea class="form-control" id="description" rows="3" placeholder="Description"><?php echo $dataUser['ec_description']?></textarea>
	                            </div>
	                        </div>
	                        
	                        <div class="form-group">
	                            <div class="col-lg-12" style="text-align:center;">
	                                <button class="btn-u btn-u-green" style="width:120px;" onclick="onSaveUser()"><i class="icon-save"></i> Save</button>
	                                <button class="btn-u btn-u-red" style="width:120px;" onclick="window.location.href='userMgrList.php';"><i class="icon-list"></i> List</button>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
			</div>			
		</div>
	</div>
	<?php require_once("common/footer.php");?>

</body>
</html>	