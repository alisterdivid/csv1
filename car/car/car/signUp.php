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
    <script type="text/javascript" src="js/signUp.js"></script>
</head>
<body style="background:#333 !important;">
	<div class="container" style="margin-top:30px; margin-bottom:30px;">
		<h2 class="txtcenter"><a href="index.php" style="color:#FFF;"><?php echo SITE_NAME;?></a></h2>
		<div class="row">
        	<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">	
				<div class="reg-page">
	                <div class="reg-header">            
	                    <h2>Register Your Account</h2>
	                </div>
	
	                <div class="input-group margin-bottom-20">
	                    <span class="input-group-addon"><i class="icon-user"></i></span>
	                    <input type="text" placeholder="Username" class="form-control" id="username">
	                </div>
	                <div class="input-group margin-bottom-20">
	                    <span class="input-group-addon"><i class="icon-lock"></i></span>
	                    <input type="password" placeholder="Password" class="form-control" id="password">
	                </div>
	                <div class="input-group margin-bottom-20">
	                    <span class="input-group-addon"><i class="icon-envelope"></i></span>
	                    <input type="text" placeholder="Email Address" class="form-control" id="email">
	                </div>	                
	                <div class="input-group margin-bottom-20">
	                    <span class="input-group-addon"><i class="icon-phone-sign"></i></span>
	                    <input type="text" placeholder="Phone Number" class="form-control" id="phone">
	                </div>	                
	                <!-- div class="input-group margin-bottom-20">
	                    <span class="input-group-addon"><i class="icon-male"></i></span>
	                    <select class="form-control" id="userType">
	                    	<option value="">Please Select User Type.</option>
	                    	<option value="D">Dealer</option>
	                    	<option value="U">User</option>
	                    </select>
	                </div -->	                                    	                	                                    
	                <div class="row" style="text-align:center;">
	                    <div class="col-md-10 col-md-offset-1">
	                    	<button class="btn-u btn-block marginRight10" onclick="onSignUpSubmit();">Sign Up</button>
	                    </div>
	                </div>
	                <hr>
	                <p><a class="color-green" href="index.php">Click here</a> to go Home Page.</p>
	            </div>
			</div>
		</div>	
	</div>
</body>
</html>