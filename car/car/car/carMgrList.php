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
    <script type="text/javascript" src="js/carMgrList.js"></script>
    <?php
    	if( EC_isLogin() && EC_getCurrentType() == "A" ){
			$pageNo = 2;
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
	        <h1 class="pull-left">Car Management List</h1>
	    </div>
	</div>
	<div class="container" style="margin-top:40px; min-height: 600px;">
		<div class="row">
			<?php require_once("leftMenu.php"); ?>
			<div class="col-md-9" style="margin-bottom:20px;">
				<div class="floatright" style="margin-bottom:5px;">
					<button class="btn-u btn-u-red" style="width:100px;" onclick="onDeleteCar()"><i class="icon-trash"></i> DELETE</button>
				</div>
				<div class="clearboth"></div>			
				<div class="panel panel-green margin-bottom-40">
					<div class="panel-heading sidebar-nav-v1">
						<h3 class="panel-title"><i class="icon-bookmark"></i> Car List</h3>
					</div>					
					<table class="table" id="example">
						<thead>
							<tr>
								<th><input type="checkbox" id="checkAll" onclick="onCheckAll( this )"/></th>
								<th>No</th>
								<th>Manufacturer</th>
								<th>Model</th>
								<th>Year</th>
								<th>Price</th>
								<th>Speed</th>
								<th>External</th>
								<th>Internal</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "
									select t1.*, t2.ec_title as ec_model_title, t3.ec_title as ec_manufacturer_title
									  from ec_car t1, ec_model t2, ec_manufacturer t3
									 where t1.ec_model = t2.ec_model
									   and t2.ec_manufacturer = t3.ec_manufacturer";
								$carList = $db->queryArray( $sql );
								for( $i = 0; $i < count( $carList ); $i ++ ){
							?>						
							<tr>
								<td><input type="checkbox" id="chkCarId" value="<?php echo $carList[$i]['ec_car']; ?>"/></td>
								<td><a href="carMgrDetail.php?id=<?php echo base64_encode($carList[$i]['ec_car']);?>"><?php echo $i + 1;?></a></td>
								<td><a href="carMgrDetail.php?id=<?php echo base64_encode($carList[$i]['ec_car']);?>"><?php echo $carList[$i]['ec_manufacturer_title']?></a></td>
								<td><a href="carMgrDetail.php?id=<?php echo base64_encode($carList[$i]['ec_car']);?>"><?php echo $carList[$i]['ec_model_title']?></a></td>
								<td><a href="carMgrDetail.php?id=<?php echo base64_encode($carList[$i]['ec_car']);?>"><?php echo $carList[$i]['ec_year']?></a></td>
								<td><a href="carMgrDetail.php?id=<?php echo base64_encode($carList[$i]['ec_car']);?>"><?php echo $carList[$i]['ec_price']?></a></td>
								<td><a href="carMgrDetail.php?id=<?php echo base64_encode($carList[$i]['ec_car']);?>"><?php echo $carList[$i]['ec_speed']?></a></td>							
								<td><a href="carMgrDetail.php?id=<?php echo base64_encode($carList[$i]['ec_car']);?>"><?php echo $carList[$i]['ec_color_int']?></a></td>
								<td><a href="carMgrDetail.php?id=<?php echo base64_encode($carList[$i]['ec_car']);?>"><?php echo $carList[$i]['ec_color_ext']?></a></td>
								<td><a href="carMgrDetail.php?id=<?php echo base64_encode($carList[$i]['ec_car']);?>"><?php echo $carList[$i]['ec_car_status']?></a></td>
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