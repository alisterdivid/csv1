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
    <script type="text/javascript" src="js/manuMgrList.js"></script>
    <?php
    	if( EC_isLogin() && EC_getCurrentType() == "A" ){
			$pageNo = 3;
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
	        <h1 class="pull-left">Manufacturer Management</h1>
	    </div>
	</div>
	<div class="container" style="margin-top:40px; min-height: 600px;">
		<div class="row">
			<?php require_once("leftMenu.php"); ?>
			<div class="col-md-9" style="margin-bottom:20px;">
				<div class="panel panel-green margin-bottom-40">
					<div class="panel-heading sidebar-nav-v1">
						<h3 class="panel-title"><i class="icon-bookmark"></i> Manufacturer Management</h3>
					</div>					
					<table class="table" id="example">
						<thead>
							<tr>
								<!-- th><input type="checkbox" id="checkAll" onclick="onCheckAll( this )"/></th -->
								<th>No</th>
								<th>Manufacturer</th>
								<th>Created Time</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from ec_manufacturer";
								$manuList = $db->queryArray( $sql );
								for( $i = 0; $i < count( $manuList ); $i ++ ){
							?>
							<tr>
								<td><?php echo $i + 1;?></td>
								<td><?php echo $manuList[$i]['ec_title'];?></td>
								<td><?php echo $manuList[$i]['ec_created_time'];?></td>
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