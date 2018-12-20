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
    <script type="text/javascript" src="js/myCars.js"></script>
    <?php
    	if( EC_getCurrentType() != "D" )
    		echo "<script>window.location.href='carList.php';</script>";
        
    	if( EC_isLogin() ){
			$isLogin = "Y";
			$userType = EC_getCurrentType();
			$userId = EC_getCurrentId();
		}else 
			$isLogin = "N";
    	
    ?>
</head>
<body>
	<?php require_once("common/top.php"); ?>
	<div class="breadcrumbs margin-bottom-40">
	    <div class="container">
	        <h1 class="pull-left">My Cars</h1>
	    </div>
	</div>	
	<div class="container" style="margin-top:40px; min-height: 600px;">
		<div class="row">
			<div class="col-md-3">
			
				<div class="panel panel-green margin-bottom-40">
	                <div class="panel-heading">
	                    <h3 class="panel-title"><i class="icon-search"></i> Search</h3>
	                </div>
	                <div class="panel-body">                                                      
	                    <div class="form-horizontal">
	                        <div class="form-group">
	                        	<label class="col-lg-2 control-label">Manufacturer</label>
	                            <div class="col-lg-12">
	                                <select id="manufacturer" class="form-control" >
	                                	<option>Select Manufacturer.</option>
	                                	<?php
	                                		$sql = "select * from ec_manufacturer";
	                                		$manuList = $db->queryArray( $sql );
	                                		for( $i = 0; $i < count( $manuList ); $i ++ ){
										?>
										<option value="<?php echo $manuList[$i]['ec_manufacturer']?>"><?php echo $manuList[$i]['ec_title']?></option>
										<?php } ?>
	                                </select>
	                            </div>
	                        </div>
	                        
	                        <div class="form-group">
	                        	<div class="col-lg-12">
	                        		<label class="control-label">Speed( Km )</label>
	                        	</div>
	                            <div class="col-lg-6">
	                                <input type="text" class="form-control" id="minSpeed" placeholder="Min Speed">
	                            </div>
	                            <div class="col-lg-6">
	                                <input type="text" class="form-control" id="maxSpeed" placeholder="Max Speed">
	                            </div>	                            
	                        </div>
	                        
	                        <div class="form-group">
	                        	<div class="col-lg-12">
	                        		<label class="control-label">Price( EGP )</label>
	                        	</div>
	                            <div class="col-lg-6">
	                                <input type="text" class="form-control" id="minPrice" placeholder="Min Price">
	                            </div>
	                            <div class="col-lg-6">
	                                <input type="text" class="form-control" id="maxPrice" placeholder="Max Price">
	                            </div>	                            
	                        </div>	
	                        
	                        <div class="form-group">
	                        	<div class="col-lg-12">
	                        		<label class="control-label">Manufactured Year</label>
	                        	</div>
	                            <div class="col-lg-6">
	                                <input type="text" class="form-control" id="minYear" placeholder="Min Year">
	                            </div>
	                            <div class="col-lg-6">
	                                <input type="text" class="form-control" id="maxYear" placeholder="Max Year">
	                            </div>	                            
	                        </div>	                                                
	                        <div class="form-group">
	                            <div class="col-lg-12">
	                                <button class="btn-u btn-u-green btn-block"><i class="icon-search"></i> Search</button>
	                            </div>
	                        </div>
							<hr/>
	                        <div class="form-group">
	                            <div class="col-lg-12">
	                                <button class="btn-u btn-u-blue btn-block" onclick="window.location.href='addCar.php';"><i class="icon-plus"></i> Add Car</button>
	                            </div>
	                        </div>
	                        
	                        <div class="form-group">
	                            <div class="col-lg-12">
	                                <button class="btn-u btn-u-red btn-block" onclick="onDeleteCar( );"><i class="icon-trash"></i> Delete</button>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>			
			
			</div>
			<div class="col-md-9" style="margin-bottom:20px;">
				<div class="panel panel-green margin-bottom-40">
					<div class="panel-heading sidebar-nav-v1">
						<h3 class="panel-title"><i class="icon-tasks"></i> My Cars</h3>
					</div>		
					<!-- div class="panel-body">
						<button class="floatright btn-u btn-u-red" style="width:100px;" onclick="onDeleteCar( );"><i class="icon-trash"></i> Delete</button>
						<button class="floatright btn-u btn-u-blue" style="margin-right: 10px;width:100px;" onclick="window.location.href='addCar.php'"><i class="icon-plus"></i> Add Car</button>						
						<div class="clearboth"></div>					
					</div -->				
					<table class="table" id="tblCarList">
						<thead>
							<tr>
								<th><input type="checkbox" id="checkAll" onclick="onCheckAll( this )"/></th>
								<th>No</th>
								<th>Manufacturer</th>
								<th>Model</th>
								<th>Price(EGP)</th>
								<th>Speed(Km)</th>
								<th>Year</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "
									select t1.*, t2.ec_title as ec_model_title, t3.ec_title as ec_manufacturer_title
									  from ec_car t1, ec_model t2, ec_manufacturer t3
									 where t1.ec_user = $userId
									   and t1.ec_model = t2.ec_model
									   and t2.ec_manufacturer = t3.ec_manufacturer";
								$carList = $db->queryArray( $sql );
								for( $i = 0; $i < count( $carList ); $i ++ ){
							?>						
							<tr>
								<td><input type="checkbox" id="chkCarId" value="<?php echo $carList[$i]['ec_car']; ?>"/></td>
								<td><a href="addCar.php?id=<?php echo base64_encode($carList[$i]['ec_car']); ?>"><?php echo $i + 1;?></a></td>
								<td><a href="addCar.php?id=<?php echo base64_encode($carList[$i]['ec_car']); ?>"><?php echo $carList[$i]['ec_manufacturer_title']?></a></td>
								<td><a href="addCar.php?id=<?php echo base64_encode($carList[$i]['ec_car']); ?>"><?php echo $carList[$i]['ec_model_title']?></a></td>
								<td><a href="addCar.php?id=<?php echo base64_encode($carList[$i]['ec_car']); ?>"><?php echo $carList[$i]['ec_price']?></a></td>
								<td><a href="addCar.php?id=<?php echo base64_encode($carList[$i]['ec_car']); ?>"><?php echo $carList[$i]['ec_speed']?></a></td>
								<td><a href="addCar.php?id=<?php echo base64_encode($carList[$i]['ec_car']); ?>"><?php echo $carList[$i]['ec_year']?></a></td>
								<td>
									<?php
									 	if( $carList[$i]['ec_car_status'] == "PENDING")
									 		$cssColor = "label-success";
									 	else if( $carList[$i]['ec_car_status'] == "REJECT")
									 		$cssColor = "label-danger";
									 	else if( $carList[$i]['ec_car_status'] == "AUCTION")
									 		$cssColor = "label-info";
									 	else if( $carList[$i]['ec_car_status'] == "SALED")
									 		$cssColor = "label-warning";
									?>
										<span class="label <?php echo $cssColor; ?>"><?php echo $carList[$i]['ec_car_status']; ?></span>
								</td>							
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