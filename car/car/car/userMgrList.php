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
    <script type="text/javascript" src="js/userMgrList.js"></script>
    <?php
    	if( EC_isLogin() && EC_getCurrentType() == "A" ){
			$pageId = 6;
			$pageNo = 1;
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
	        <h1 class="pull-left">User Management</h1>
	    </div>
	</div>
	<div class="container" style="margin-top:40px; min-height: 600px;">
		<div class="row">
			<?php require_once("leftMenu.php"); ?>
			<div class="col-md-9" style="margin-bottom:20px;">
				<div class="floatright" style="margin-bottom:5px;">
					<button class="btn-u" style="width:100px;" onclick="window.location.href='userMgrDetail.php';"><i class="icon-plus"></i> ADD</button>
					<button class="btn-u btn-u-red" style="width:100px;" onclick="onDeleteUser()"><i class="icon-trash"></i> DELETE</button>
				</div>
				<div class="clearboth"></div>
				<div class="panel panel-green margin-bottom-40">
					<div class="panel-heading sidebar-nav-v1">
						<h3 class="panel-title"><i class="icon-user"></i> User List</h3>
					</div>					
					<table class="table" id="example">
						<thead>
							<tr>
								<th><input type="checkbox" id="checkAll" onclick="onCheckAll( this )"/></th>
								<th>No</th>
								<th>Username</th>
								<th>Email</th>
								<th>Name</th>
								<th>Phone</th>
								<th>User Type</th>
								<th>Photo</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "select * from ec_user";
								$userList = $db->queryArray( $sql );
								for( $i = 0; $i < count( $userList ); $i ++ ){
							?>						
							<tr>
								<td><input type="checkbox" id="chkUserId" value="<?php echo $userList[$i]['ec_user']; ?>"/></td>
								<td><a href="userMgrDetail.php?id=<?php echo base64_encode($userList[$i]['ec_user'])?>"><?php echo $i + 1;?></a></td>
								<td><a href="userMgrDetail.php?id=<?php echo base64_encode($userList[$i]['ec_user'])?>"><?php echo $userList[$i]['ec_username']?></a></td>
								<td><a href="userMgrDetail.php?id=<?php echo base64_encode($userList[$i]['ec_user'])?>"><?php echo $userList[$i]['ec_email']?></a></td>
								<td><a href="userMgrDetail.php?id=<?php echo base64_encode($userList[$i]['ec_user'])?>"><?php echo $userList[$i]['ec_firstname']." ".$userList[$i]['ec_lastname']?></a></td>
								<td><a href="userMgrDetail.php?id=<?php echo base64_encode($userList[$i]['ec_user'])?>"><?php echo $userList[$i]['ec_phone']?></a></td>
								<td>
									<?php 
										if( $userList[$i]['ec_user_type'] == "A")
											echo "Admin";
										else if( $userList[$i]['ec_user_type'] == "D")
											echo "User";
									?>
								</td>
								<td><img src="<?php echo $userList[$i]['ec_photo']; ?>" style="width:32px;height:32px;"/></td>							
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