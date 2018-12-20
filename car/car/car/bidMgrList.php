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
    <script type="text/javascript" src="js/bidMgrList.js"></script>
    <?php
    	if( EC_isLogin() && EC_getCurrentType() == "A" ){
			$pageNo = 4;
			$pageId = 6;
			$userType = EC_getCurrentType();
			$isLogin = "Y";
		}else 
			echo "<script>window.location.href='carList.php';</script>";
    	
    ?>
</head>
<body>
	<?php require_once("common/top.php"); ?>
	<div class="breadcrumbs margin-bottom-40">
	    <div class="container">
	        <h1 class="pull-left">Bid Management</h1>
	    </div>
	</div>
	<div class="container" style="margin-top:40px; min-height: 600px;">
		<div class="row">
			<?php require_once("leftMenu.php"); ?>
			<div class="col-md-9" style="margin-bottom:20px;">
				<div class="panel panel-green margin-bottom-40">
					<div class="panel-heading sidebar-nav-v1">
						<h3 class="panel-title"><i class="icon-bookmark"></i> Bid Management</h3>
					</div>					
					<table class="table" id="example">
						<thead>
							<tr>
								<!-- th><input type="checkbox" id="checkAll" onclick="onCheckAll( this )"/></th -->
								<th>No</th>
								<th>Saler</th>
								<th>Manufacturer</th>
								<th>Model</th>
								<th>Price</th>
								<th>Bidder</th>
								<th>Bid Price</th>
								<th>Bid Time</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "
										select t1.ec_bid_price, t1.ec_created_time, t2.ec_username as ec_buyer, t3.ec_price, t4.ec_title as ec_manufacturer_title, t5.ec_title as ec_model_title, t6.ec_username as ec_saler
										  from ec_bid t1, ec_user t2, ec_car t3, ec_manufacturer t4, ec_model t5, ec_user t6
										 where t1.ec_user = t2.ec_user
										   and t1.ec_car = t3.ec_car
										   and t3.ec_model = t5.ec_model
										   and t5.ec_manufacturer = t4.ec_manufacturer
										   and t3.ec_user = t6.ec_user
										   and t1.ec_allow_yn = 'N'
										 order by t1.ec_created_time desc";
								$bidList = $db->queryArray( $sql );
								for( $i = 0; $i < count( $bidList ); $i ++ ){
							?>						
							<tr>
								<td><?php echo $i + 1;?></td>
								<td><?php echo $bidList[$i]['ec_saler'];?></td>
								<td><?php echo $bidList[$i]['ec_manufacturer_title'];?></td>
								<td><?php echo $bidList[$i]['ec_model_title'];?></td>
								<td><?php echo $bidList[$i]['ec_price'];?></td>
								<td><?php echo $bidList[$i]['ec_buyer'];?></td>
								<td><?php echo $bidList[$i]['ec_bid_price'];?></td>
								<td><?php echo $bidList[$i]['ec_created_time'];?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php require_once("common/footer.php");?>

</body>
</html>	