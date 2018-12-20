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
		$pageId = 5;
    ?>
</head>
<body>
	<?php require_once("common/top.php"); ?>
	<div style="position: relative;">
		<div id="divBackgroundArea"></div>
		<div class="container" style="padding-top:30px;">
			<p id="headerBreadcrum">
			Home &rsaquo; About Us
			</p>
			<hr style="border-top: 1px solid #999;">
			<h1 id="headerTitle">About Us</h1>
		</div>
			
		<div class="container" style="margin-top:40px; min-height: 600px;">
			<div class="row">
				<div class="col-md-9">
					<p>
						This is the description of this site. Hope to fill beautiful descriptions here. We are always ready for you. We are car dealer company. Thank you.
					</p>
					<p>
						This is the description of this site. Hope to fill beautiful descriptions here. We are always ready for you. We are car dealer company. Thank you.
					</p>				
					<p>
						This is the description of this site. Hope to fill beautiful descriptions here. We are always ready for you. We are car dealer company. Thank you.
					</p>																		
					<div style="box-shadow: 0px 0px 5px rgba( 0, 0, 0, 0.5 ); margin-top: 30px;">
						<iframe width="100%" height="440" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Downingtown,+PA&amp;aq=1&amp;oq=down&amp;sll=41.117935,-77.604698&amp;sspn=6.818691,15.864258&amp;ie=UTF8&amp;hq=&amp;hnear=Downingtown,+Chester,+Pennsylvania&amp;t=m&amp;ll=40.006514,-75.703268&amp;spn=0.013149,0.018797&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
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