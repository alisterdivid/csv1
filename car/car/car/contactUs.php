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
    <?php
		$pageId = 4;
    ?>
</head>
<body>
	<?php require_once("common/top.php"); ?>
	<div style="position: relative;">
		<div id="divBackgroundArea"></div>
		<div class="container" style="padding-top:30px;">
			<p id="headerBreadcrum">
			Home &rsaquo; Contact Us
			</p>
			<hr style="border-top: 1px solid #999;">
			<h1 id="headerTitle">Contact Us</h1>
		</div>
			
		<div class="container" style="margin-top:40px; min-height: 600px;">
			<div class="row">
				<div class="col-md-9">
					<div class="panel panel-black1 margin-bottom-40">
						<div class="panel-heading">
		                    <h3 class="panel-title"><i class="icon-home"></i> Quick Contact</h3>
		                </div>
		                <div class="panel-body">
	                        <div class="form-group">
	                        	<div class="col-lg-12">
	                        		<label class="control-label">Your Name*</label>
	                        	</div>
	                            <div class="col-lg-12">
	                                <input type="text" class="form-control" id="txtName" placeholder="Your Name">
	                            </div>	                            
	                        </div>
	                        <div class="form-group">
	                        	<div class="col-lg-12">
	                        		<label class="control-label">Your Email*</label>
	                        	</div>
	                            <div class="col-lg-12">
	                                <input type="text" class="form-control" id="txtEmail" placeholder="Your Email">
	                            </div>	                            
	                        </div>	   
	                        <div class="form-group">
	                        	<div class="col-lg-12">
	                        		<label class="control-label">Subject</label>
	                        	</div>
	                            <div class="col-lg-12">
	                                <input type="text" class="form-control" id="txtSubject" placeholder="Subject">
	                            </div>	                            
	                        </div>
	                        <div class="form-group">
	                        	<div class="col-lg-12">
	                        		<label class="control-label">Your Message</label>
	                        	</div>
	                            <div class="col-lg-12">
	                                <textarea id="txtMessage" class="form-control" placeholder="Your Message" rows="10"></textarea>
	                            </div>	                            
	                        </div>
	                        <div class="form-group">
	                        	<div class="col-lg-12">
	                        		<button class="btn-u btn-u-blue">Send Message</button>
	                        	</div>
	                        </div>	                        	                                             		                
		                </div>
					</div>		
				</div>
				<div class="col-md-3">
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
</body>
</html>