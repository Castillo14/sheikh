<?php

	include("../include/db.php");

?>
<?php

	                $bus_id = $_REQUEST["bus_maintenance"];
	    
	    			$bus_id;       

                    $edit_bus = "SELECT * FROM tbl_bus WHERE bus_id = '$bus_id' AND removed = 'No'";

                    $run_edit = mysqli_query($con,$edit_bus);

                    $row_edit = mysqli_fetch_assoc($run_edit);

                    $e_id = $row_edit['bus_id'];

                    $e_bus_number = $row_edit['bus_number'];
                    
                    $e_plate_number = $row_edit['plate_number'];
                    $e_bus_company = $row_edit['bus_company_id'];
                    $e_engine_number = $row_edit['engine_number'];
                    $e_chasis_number = $row_edit['chasis_number'];
                    $e_make = $row_edit['make'];
                    $e_franchise_number = $row_edit['franchise_number'];
                    $e_route_from = $row_edit['route_from'];
                    $e_route_to = $row_edit['route_to'];

                    $select_bus_company = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$e_bus_company'";
							                    $run_select_bus_company = mysqli_query($con,$select_bus_company);
												$row_bus_company = mysqli_fetch_array($run_select_bus_company);
												$bc_id = $row_bus_company['bus_company_id'];
												$bc_company_name = $row_bus_company['bus_company_name'];

	$jScript = md5(rand(1,9));
	 $newScript = md5(rand(1,9));
	 $Script = md5(rand(1,9));
	 $getUpdate = md5(rand(1,9));
   	 $getDelete = md5(rand(1,9));
   	 $getAdd = md5(rand(1,9));
            ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/x-icon" href="../img/stalucia_logo.ico">
	<title>Sta Lucia Express Bus Co.</title>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
     <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  	<script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	.error{
		color: red;
	}
</style>
<body class="hold-transition sidebar-mini">
	<div class="wrapper"><!-- wrapper Starts -->
		<section class="content"><!-- content Starts -->
			<div class="row"><!-- row Starts -->
				<div class="col-lg-12"><!-- col-lg-12 Starts -->
					<div class="box box-success"><!-- box box-success Starts -->
						<div class="panel panel-default"><!-- panel panel-default Starts -->
							<div class="panel-heading"><!-- panel-heading Starts -->
								<h3 class="panel-title"><!-- panel-title Starts -->
									<i class="fa fa-bus fa-fw"></i>
									Bus Maintenance
								</h3><!-- panel-title Ends -->
							</div><!-- panel-heading Ends -->
							<div class="panel-body"><!-- panel-body Starts -->
								<form class='form-horizontal' action='' method='post'><!-- form-horizontal Starts -->
									
					                <div class='col-md-12'><!-- col-md-12 Starts -->
					                	<ul class='nav nav-tabs'><!-- nav nav-tabs Starts -->
					                		<li class='active'>
					        					<a href='' id='btn1' data-toggle='tab'>
					            					<i class='fa fa-bus'></i> <span>Bus Information</span>
					        					</a>
					    					</li>
					    					<li class=''>
					        					<a href='' id='btn2' data-toggle='tab'>
					            					<i class='fa fa-wrench'></i> <span>Maintenance Report</span>
					        					</a>
					    					</li>
					    					<li class=''>
					        					<a href='' id='btn3' data-toggle='tab'>
					            					<i class='fa fa-wrench'></i> <span>Diesel Report</span>
					        					</a>
					    					</li>
					  					</ul><!-- nav nav-tabs Ends -->
					  					<br><br>
					                </div><!-- col-md-12 Ends -->
					                <section class='content-header'><!-- content-header Starts -->
					                	<div id='applicant_info'><!-- applicant_info Starts -->
					                			<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class="form-group"><!-- form-group Starts -->
											<label class="col-md-4 control-label">
												Bus Number
											</label>
											<div class="col-md-8">
												<input type="text" class="form-control" name="bus_number" maxlength="74" minlength="2" onkeypress='return isAlphaKey(event)' disabled value="<?php echo $e_bus_number; ?>">
											</div>
										</div><!-- form-group Ends -->
									</div><!-- col-md-12 Ends -->

									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Plate Number
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type='text' class='form-control' name='plate_number' value="<?php echo $e_plate_number; ?>" disabled>
					                        </div>  
					                    </div>
									</div>
									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Bus Company
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type='text' class='form-control' name='bus_company' value="<?php echo $bc_company_name; ?>" disabled>
					                        </div>  
					                    </div>
									</div>
									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Engine Number
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type='text' class='form-control' name='engine_number' value="<?php echo $e_engine_number; ?>" disabled>
					                        </div>  
					                    </div>
									</div><div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Chasis Number
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type='text' class='form-control' name='chasis_number' value="<?php echo $e_chasis_number; ?>" disabled>
					                        </div>  
					                    </div>
									</div>
									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Make
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type='text' class='form-control' name='make' value="<?php echo $e_make; ?>" disabled>
					                        </div>  
					                    </div>
									</div>
									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Route From
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type='text' class='form-control' name='route_from' value="<?php echo $e_route_from; ?>" disabled>
					                        </div>  
					                    </div>
					                    <div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Route To
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type='text' class='form-control' name='route_to' value="<?php echo $e_route_to; ?>" disabled>
					                        </div>  
					                    </div>
									</div>
									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Franchise Number
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type='text' class='form-control' name='franchise_number' value="<?php echo $e_franchise_number; ?>" disabled>
					                        </div>  
					                    </div>
									</div>
									<div class='col-md-12'><!-- col-md-12 Starts -->
							                    <div class='form-group'>
							                    	<div class='col-sm-6'>
						          						
						        					</div>
							                        <div class='col-sm-6'>
						          						
						        					</div>
							                    </div>
							                </div>
							                <div class='col-md-12'><!-- col-md-12 Starts -->
							                    <div class='form-group'>
							                    	<div class='col-sm-6'>
						          						
						        					</div>
							                        <div class='col-sm-6'>
						          						
						        					</div>
							                    </div>
							                </div>
									<div class='col-md-12'><!-- col-md-12 Starts -->
							                    <div class='form-group'>
							                    	<div class='col-sm-6'>
						          						
						        					</div>
							                        <div class='col-sm-6'>
						          						<a href='index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && busses=<?php echo $bc_id; ?> && getRefresh=<?php echo $getUpdate; ?>' class='btn btn-default pull-left'><i class='fa fa-close'></i> Close</a>
						        					</div>
							                    </div>
							                </div>
							                
							    </form><!-- form-horizontal Ends -->
					                	</div><!-- applicant_info Ends -->
					                	<div id='status_info' style='display: none;'><!-- status_info Starts -->
								        	<div class='col-md-12'>
												<button class='btn btn-default' type='button' data-toggle='modal' data-target='#from_inventory<?php echo $e_id; ?>'>
													<i class='fa fa-plus'></i>
													From Inventory
												</button>
												<button class='btn btn-default' type='button' data-toggle='modal' data-target='#other_maintenance<?php echo $e_id; ?>'>
													<i class='fa fa-plus'></i>
													Other Maintenance
												</button> 
													            <?php

													            	include("modal/from_inventory.php");

													            ?> 
													            <?php

													            	include("modal/other_maintenance.php");

													            ?> 
												<div class='row'><!-- row Starts -->
													<div class='box box-success'><!--box box-success Starts -->
														<div class='box-header'><!-- box-header Starts -->
															<h3 class='box-title'>
																<i class='fa fa-wrench'></i> Maintenance
																<span>
																	<a class='btn-sm btn-success navbar-btn right' href='#''><!-- btn btn-primary navbar-btn right Starts -->
																		<?php

																			$get_maintenance = "SELECT * FROM tbl_bus_maintenance WHERE bus_id = '$e_id'";

																			$run_maintenance = mysqli_query($con,$get_maintenance);

																			$total_maintenance = mysqli_num_rows($run_maintenance);

																		?>
																		<?php echo $total_maintenance; ?>
																	</a><!-- btn btn-primary navbar-btn right Ends -->
																</span>
															</h3>
														</div><!-- box-header Ends -->
														<div class='box-body table-responsive no-padding'><!-- box-body table-responsive no-padding Starts -->
															<table class="table table-hover ample2">
																<thead>
													                <tr>
													                  	<th>#</th>
													                  	<th>From</th>
													                  	<th>Place</th> 
													                  	<th>Supplier</th>
													                  	<th>Item Name</th>
													                  	<th>Item Description</th>
													                  	<th>Price</th>
													                  	<th>Quantity</th>
													                  	<th>Total Price</th>
													                  	<th>Date</th>
													                </tr>
													            </thead>
													            <tbody>
													            <?php

													            	$i = 0;

													            	$get_bus_maintenance = "SELECT * FROM tbl_bus_maintenance WHERE bus_id = '$e_id'";

													            	$run_bus_maintenance = mysqli_query($con,$get_bus_maintenance);

													            	while($row_bus_maintenance = mysqli_fetch_array($run_bus_maintenance)){

													            		$bus_id = $row_bus_maintenance['bus_id'];

													            		$from_ = $row_bus_maintenance['from_'];

													            		$supplier = $row_bus_maintenance['supplier'];
													            		
													            		$inventory_name = $row_bus_maintenance['inventory_name'];

													            		$quantity = $row_bus_maintenance['quantity'];

													            		$price = $row_bus_maintenance['price'];

													            		$total_price = $row_bus_maintenance['total_price'];

													            		$date_created = $row_bus_maintenance['date_created'];

													            		$inventory_place = $row_bus_maintenance['inventory_place'];

													            		$inventory_description = $row_bus_maintenance['inventory_description'];

													            		$i++;

													            ?>
													            	<tr>
													            		<td><?php echo $i; ?></td>
													            		<td><?php echo $from_; ?></td>
													                  	<td><?php echo $inventory_place; ?></td>
													                  	<td><?php echo $supplier; ?></td>
													                  	<td><?php echo $inventory_name; ?></td>
													                  	<td><?php echo $inventory_description; ?></td>
													                  	<td><?php echo $price; ?></td>
													                  	<td><?php echo $quantity; ?></td>
													                  	<td><?php echo $total_price; ?></td>
													                  	<td><?php echo $date_created; ?></td>
													            	</tr>
													            	
													            	<?php

													            	}

													            ?>
													            </tbody>
															</table>
														</div><!-- box-body table-responsive no-padding Ends -->
													</div><!--box box-success Ends -->
												</div><!-- row Ends -->
									        </div>
								        </div><!-- status_info Ends -->


								          <div id='diesel_info' style='display: none;'><!-- status_info Starts -->
								        	<div class='col-md-12'>
									        	<button class='btn btn-default' type='button' data-toggle='modal' data-target='#add_diesell<?php echo $e_id; ?>'>
													<i class='fa fa-plus'></i>
													Add Diesel
												</button>

												<?php

													            	include("modal/add_diesell.php");

													            ?> 												<div class='row'><!-- row Starts -->
													<div class='box box-success'><!--box box-success Starts -->
														<div class='box-header'><!-- box-header Starts -->
															<h3 class='box-title'>
																<i class='fa fa-wrench'></i> Diesel
																<span>
																	<a class='btn-sm btn-success navbar-btn right' href='#''><!-- btn btn-primary navbar-btn right Starts -->
																		<?php

																			$get_maintenancee = "SELECT * FROM tbl_diesel WHERE bus_id = '$e_id'";

																			$run_maintenancee = mysqli_query($con,$get_maintenancee);

																			$total_maintenancee = mysqli_num_rows($run_maintenancee);

																		?>
																		<?php echo $total_maintenancee; ?>
																	</a><!-- btn btn-primary navbar-btn right Ends -->
																</span>
															</h3>
														</div><!-- box-header Ends -->
														<div class='box-body table-responsive no-padding'><!-- box-body table-responsive no-padding Starts -->
															<table class="table table-hover ample2">
																<thead>
													                <tr>
													                  	<th>#</th>
													                  	<th>Diesel From</th>
													                  	<th>Place</th>
													                  	<th>Liters</th>
													                  	<th>Price/Liter</th>
													                  	<th>Total Price</th>
													                  	<th>Date</th>
													                </tr>
													            </thead>
													            <tbody>
													            <?php

													            	$i = 0;

													            	$select_sum_diesel = "SELECT SUM(total_price) AS total_price_diesel FROM tbl_diesel WHERE bus_id = '$e_id'";
							                						$run_sum_diesel = mysqli_query($con,$select_sum_diesel);

							                						$row_sum_diesel = mysqli_fetch_array($run_sum_diesel);

							                						$total_price_diesel = $row_sum_diesel['total_price_diesel'];

													            	$get_bus_maintenancee = "SELECT * FROM tbl_diesel WHERE  bus_id = '$e_id'";

													            	$run_bus_maintenancee = mysqli_query($con,$get_bus_maintenancee);

													            	while($row_bus_maintenancee = mysqli_fetch_array($run_bus_maintenancee)){

													            		
													            		$liters = $row_bus_maintenancee['liters'];


													            		$pricee = $row_bus_maintenancee['price'];

													            		$total_pricee = $row_bus_maintenancee['total_price'];

													            		$diesel_from = $row_bus_maintenancee['diesel_from'];

													            		$place = $row_bus_maintenancee['place'];

													            		$datee = $row_bus_maintenancee['date_created'];

													            		$i++;

													            ?>
													            	<tr>
													            		<td><?php echo $i; ?></td>
													            		<td><?php echo $diesel_from; ?></td>
													            		<td><?php echo $place; ?></td>
													            		<td><?php echo $liters; ?></td>
													                  	<td><?php echo $pricee; ?></td>
													                  	<td><?php echo $total_pricee; ?></td>
													                  	<td><?php echo $datee; ?></td>
													            	</tr>
													            	
													            	<?php

													            	}

													            ?>
													            </tbody>
													            <tfoot>
													            	<tr>
													            		<th colspan='4'>
													            			
													            		</th>
													            		<th>
													            			<i class='fa fa-money'></i> Total Amount 
													            		</th>
													            		<th>
													            			<?php echo $total_price_diesel; ?>
													            		</th>
													            	</tr>
													            </tfoot>
															</table>
														</div><!-- box-body table-responsive no-padding Ends -->
													</div><!--box box-success Ends -->
												</div><!-- row Ends -->
									        </div>
								        </div><!-- status_info Ends -->



								      
					                </section><!-- content-header Ends -->
							</div><!-- panel-body Ends -->
						</div><!-- panel panel-default Ends -->
					</div><!-- box box-success Ends -->
				</div><!-- col-lg-12 Ends -->
			</div><!-- row Ends -->
		</section><!-- content Ends -->
	</div><!-- wrapper Ends -->
	
	<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script>
		  	$(function () {
		    $('#ample1').DataTable()
		    $('.ample2').DataTable({
		      'paging'      : true,
		      'lengthChange': true,
		      'searching'   : true,
		      'ordering'    : false,
		      'info'        : true,
		      'autoWidth'   : true
		    })
		  	})
		</script>

<script type="application/javascript">

    function isNumericKey(evt){

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;

        return true;
    }

     function isAlphaKey(evt){

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return true;

        return false;
    }

    </script>

<script>

	$(document).ready(function(){

		$('#btn1').on('click', function(){

			$("#applicant_info").show();

			$("#status_info").hide();
			$("#diesel_info").hide();

		});
	});

	$(document).ready(function(){

		$('#btn2').on('click', function(){

			$("#status_info").show();

			$("#applicant_info").hide();
			$("#diesel_info").hide();

		});
	});

	$(document).ready(function(){

		$('#btn3').on('click', function(){

			$("#diesel_info").show();

			$("#applicant_info").hide();
			$("#status_info").hide();

		});
	});


</script>
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../dist/js/adminlte.min.js"></script>
	<!-- Sparkline -->
	<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<!-- jvectormap  -->
	<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<!-- SlimScroll -->
	<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- ChartJS -->
	<script src="../bower_components/Chart.js/Chart.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="../dist/js/pages/dashboard2.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="../dist/js/demo.js"></script>
</body>
</html>