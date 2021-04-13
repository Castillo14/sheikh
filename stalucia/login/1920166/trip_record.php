<?php

	include("../include/db.php");

?>
<?php

	                $trip_id = $_REQUEST["trip_record"];
	    
	    			$trip_id;       

                    $edit_trip = "SELECT * FROM tbl_trip_report WHERE trip_report_id = '$trip_id'";

                    $run_edit = mysqli_query($con,$edit_trip);

                    $row_edit = mysqli_fetch_assoc($run_edit);
                    $gross = 0;
                    $total_net = 0;
                    $e_id = $row_edit['trip_report_id'];
                    $bus_id = $row_edit['bus_id'];
                    $bus_company_id = $row_edit['bus_company_id'];
                    $driver_id = $row_edit['driver_id'];
                    $conductor_id = $row_edit['conductor_id'];
                    $depart_from = $row_edit['depart_from'];
                    $time_depart = $row_edit['time_depart'];
                    $arrive_to = $row_edit['arrive_to'];
                    $time_arrive = $row_edit['time_arrive'];
                    $round_trip = $row_edit['round_trip'];
                    $date_created = $row_edit['date_created'];
                    $north = $row_edit['nb'];
                    $south = $row_edit['sb'];
                    $gross = $north + $south;

                    $select_bus = "SELECT * FROM tbl_bus WHERE bus_id = '$bus_id'";
                    $run_select_bus = mysqli_query($con,$select_bus);
					$row_bus = mysqli_fetch_array($run_select_bus);
					$bb_id = $row_bus['bus_id'];
					$bb_bus_number = $row_bus['bus_number'];
					$bb_plate_number = $row_bus['plate_number'];

					$select_bus_company = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$bus_company_id'";
                    $run_select_bus_company = mysqli_query($con,$select_bus_company);
					$row_bus_company = mysqli_fetch_array($run_select_bus_company);
					$bc_id = $row_bus_company['bus_company_id'];
					$bc_name = $row_bus_company['bus_company_name'];

					$select_driver = "SELECT * FROM tbl_driver WHERE driver_id = '$driver_id'";
                    $run_select_driver = mysqli_query($con,$select_driver);
					$row_driver = mysqli_fetch_array($run_select_driver);
					$d_id = $row_driver['driver_id'];
					$d_first_name = $row_driver['first_name'];
					$d_middle_name = $row_driver['middle_name'];
					$d_last_name = $row_driver['last_name'];
					$d_image = $row_driver['image'];
					$d_full = ucfirst($d_first_name) . " " . ucfirst($d_middle_name) . " " . ucfirst($d_last_name);

					$select_conductor = "SELECT * FROM tbl_conductor WHERE conductor_id = '$conductor_id'";
                    $run_select_conductor = mysqli_query($con,$select_conductor);
					$row_conductor = mysqli_fetch_array($run_select_conductor);
					$c_id = $row_conductor['conductor_id'];
					$c_first_name = $row_conductor['first_name'];
					$c_middle_name = $row_conductor['middle_name'];
					$c_last_name = $row_conductor['last_name'];
					$c_image = $row_conductor['image'];
					$c_full = ucfirst($c_first_name) . " " . ucfirst($c_middle_name) . " " . ucfirst($c_last_name);

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
	<meta name="keyword" content="sta lucia bus, sta lucia express, sta lucia, sta lucia website">
	<link rel="icon" type="image/x-icon" href="../../images/stalucia_logo.ico">
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
									Trip Record
								</h3><!-- panel-title Ends -->
							</div><!-- panel-heading Ends -->
							<div class="panel-body"><!-- panel-body Starts -->
								<form class='form-horizontal' action='' method='post'><!-- form-horizontal Starts -->
									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class="form-group"><!-- form-group Starts -->
											<label class="col-md-4 control-label">
												Driver Name
											</label>
											<div class="col-md-8">
												<input type="text" name="driver_name" class="form-control" value="<?php echo $d_full; ?>" disabled><br>
												<img src="../driver_conductor_images/<?php echo $d_image; ?>" width="70" height="70">
											</div>
										</div><!-- form-group Ends -->
									</div><!-- col-md-12 Ends -->
									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Conductor Name
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type="text" name="conductor_name" class="form-control" value="<?php echo $c_full; ?>" disabled><br>
												<img src="../driver_conductor_images/<?php echo $c_image; ?>" width="70" height="70">
					                        </div>  
					                    </div>
									</div><!-- col-md-12 Ends -->
									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Depart From
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type="text" name="depart_from" class="form-control" value="<?php echo $depart_from; ?>" disabled>
					                        </div>  
					                    </div>
					                    <div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Time Depart
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type="text" name="time_depart" class="form-control" value="<?php echo $time_depart; ?>" disabled>
					                        </div>  
					                    </div>
									</div><!-- col-md-12 Ends -->
									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Arrive To
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type="text" name="arrive_to" class="form-control" value="<?php echo $arrive_to; ?>" disabled>
					                        </div>  
					                    </div>
					                    <div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Time Arrive
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type="text" name="time_arrive" class="form-control" value="<?php echo $time_arrive; ?>" disabled>
					                        </div>  
					                    </div>
									</div><!-- col-md-12 Ends -->
									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Date
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type="text" name="date_created" class="form-control" value="<?php echo $date_created; ?>" disabled>
					                        </div>  
					                    </div>
									</div><!-- col-md-12 Ends -->
									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Total KM (Round Trip)
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type="text" name="km" class="form-control" value="<?php echo $round_trip; ?>" disabled>
					                        </div>  
					                    </div>
									</div><!-- col-md-12 Ends -->
					                <div class='col-md-12'><!-- col-md-12 Starts -->
					                	<ul class='nav nav-tabs'><!-- nav nav-tabs Starts -->
					                		<li class='active'>
					        					<a href='' id='btn1' data-toggle='tab'>
					            					<i class='fa fa-bus'></i> <span>Bus Information</span>
					        					</a>
					    					</li>
					    					<li class=''>
					        					<a href='' id='btn2' data-toggle='tab'>
					            					<i class='fa fa-wrench'></i> <span>Expense Report</span>
					        					</a>
					    					</li>
					    					<li class=''>
					        					<a href='' id='btn3' data-toggle='tab'>
					            					<i class='fa fa-wrench'></i> <span>Diesel Info</span>
					        					</a>
					    					</li>
					    					<li class=''>
					        					<a href='' id='btn4' data-toggle='tab'>
					            					<i class='fa fa-wrench'></i> <span>Net Info</span>
					        					</a>
					    					</li>
					    					<li class=''>
					        					<a href='' id='btn5' data-toggle='tab'>
					            					<i class='fa fa-wrench'></i> <span>Other Info</span>
					        					</a>
					    					</li>
					  					</ul><!-- nav nav-tabs Ends -->
					  					<br><br>
					                </div><!-- col-md-12 Ends -->
					                <section class='content-header'><!-- content-header Starts -->
					                	<div id='applicant_info'><!-- applicant_info Starts -->
					                		<div class="col-md-12"><!-- col-md-12 Starts -->
													<div class='form-group'>
								                        <label class='control-label col-sm-5'>
								                            Bus Company
								                        </label>
								                        <div class='col-sm-4'>
								                        	<input type='text' class='form-control' name='bus_company' value="<?php echo $bc_name; ?>" disabled>
								                        </div>  
								                    </div>
												</div>
					                			<div class="col-md-6"><!-- col-md-12 Starts -->
													<div class="form-group"><!-- form-group Starts -->
														<label class="col-md-4 control-label">
															Bus Number
														</label>
														<div class="col-md-8">
															<input type="text" class="form-control" name="bus_number" maxlength="74" minlength="2" onkeypress='return isAlphaKey(event)' disabled value="<?php echo $bb_bus_number; ?>">
														</div>
													</div><!-- form-group Ends -->
												</div><!-- col-md-12 Ends -->

									<div class="col-md-6"><!-- col-md-12 Starts -->
										<div class='form-group'>
					                        <label class='control-label col-sm-4'>
					                            Plate Number
					                        </label>
					                        <div class='col-sm-8'>
					                        	<input type='text' class='form-control' name='plate_number' value="<?php echo $bb_plate_number; ?>" disabled>
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
						          						<a href='index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && trip_reports=<?php echo $bus_company_id; ?> && getTrip=<?php echo $getAdd; ?>' class='btn btn-default pull-left'><i class='fa fa-close'></i> Close</a>
						        					</div>
							                    </div>
							                </div>
							                
							    </form><!-- form-horizontal Ends -->
					                	</div><!-- applicant_info Ends -->
					                	<div id='status_info' style='display: none;'><!-- status_info Starts -->
								        	<div class='col-md-12'>
									        	<button class='btn btn-default' type='button' data-toggle='modal' data-target='#add_expense<?php echo $e_id; ?>'>
													<i class='fa fa-plus'></i>
													Add Expense
												</button>
												<?php

													            	include("modal/add_expense.php");

													            ?> 	
	            <a href="../PHPExcel/Examples/trip_record_expenses.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && trip_record_expenses=<?php echo $e_id; ?> && getView=<?php echo $getUpdate; ?>" class="btn btn-default">
<i class="fa fa-print"></i>
Get Excel
</a>											
<div class='row'><!-- row Starts -->
													<div class='box box-success'><!--box box-success Starts -->
														<div class='box-header'><!-- box-header Starts -->
															<h3 class='box-title'>
																<i class='fa fa-wrench'></i> Expenses
																<span>
																	<a class='btn-sm btn-success navbar-btn right' href='#''><!-- btn btn-primary navbar-btn right Starts -->
																		<?php

																			$get_maintenance = "SELECT * FROM tbl_trip_expense WHERE trip_report_id = '$e_id'";

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
													                  	<th>Name</th> 
													                  	<th>Particulars</th> 
													                  	<th>Price</th>
													                  	<th>Scanned File</th>
													                  	<th>Date</th>
													                  	<th>Action</th>
													                </tr>
													            </thead>
													            <tbody>
													            <?php

													            	$i = 0;

													            	$select_sum = "SELECT SUM(price) AS total_price FROM tbl_trip_expense WHERE trip_report_id = '$e_id'";
							                						$run_sum = mysqli_query($con,$select_sum);

							                						$row_sum = mysqli_fetch_array($run_sum);

							                						$total_price = $row_sum['total_price'];

													            	$get_bus_maintenance = "SELECT * FROM tbl_trip_expense WHERE trip_report_id = '$e_id'";

													            	$run_bus_maintenance = mysqli_query($con,$get_bus_maintenance);

													            	while($row_bus_maintenance = mysqli_fetch_array($run_bus_maintenance)){

													            		$bus_id = $row_bus_maintenance['trip_report_id'];

													            		$trp_exp = $row_bus_maintenance['trip_expense_id'];
													            		
													            		$expense_name = $row_bus_maintenance['expenses_id'];


													            		$price = $row_bus_maintenance['price'];

													            		$particulars = $row_bus_maintenance['particulars'];

													            		$supporting_files = $row_bus_maintenance['supporting_file'];

													            		$date_created = $row_bus_maintenance['date_created'];

													            		$i++;

													            		$select_expense = "SELECT * FROM tbl_expenses WHERE expenses_id = '$expense_name'";
																		$run_edit = mysqli_query($con,$select_expense);
																		$row_edit = mysqli_fetch_array($run_edit);
																		$e_idd = $row_edit['expenses_id'];
																		$e_expense_name = $row_edit['expense_name'];

													            ?>
													            	<tr>
													            		<td><?php echo $i; ?></td>
													            		<td><?php echo $e_expense_name; ?></td>
													            		<td><?php echo $particulars; ?></td>
													                  	<td><?php echo $price; ?></td>
													                  	<td><a download="../supporting_files/<?php echo $supporting_files; ?>" href="../supporting_files/<?php echo $supporting_files; ?>"><?php echo $supporting_files; ?></a></td>
													                  	<td><?php echo $date_created; ?></td>
													                  	<td>
					                  										<button class='btn btn-default btn-small' type='button' data-toggle='modal' data-target='#remove_expense<?php echo $trp_exp; ?>'>
					                  											<i class='fa fa-trash-o'></i>
					                  										</button>
													                  	</td>
													            	</tr>
													            	<?php

													            	include("modal/remove_expense.php");

													            ?>
													            	
													            	<?php

													            	}

													            ?>
													            </tbody>
													            <tfoot>
													            	<tr>
													            		<th colspan='2'>
													            			
													            		</th>
													            		<th>
													            			<i class='fa fa-money'></i> Total Amount 
													            		</th>
													            		<th>
													            			<?php echo $total_price; ?>
													            		</th>
													            	</tr>
													            </tfoot>
															</table>
														</div><!-- box-body table-responsive no-padding Ends -->
													</div><!--box box-success Ends -->
												</div><!-- row Ends -->
									        </div>
								        </div><!-- status_info Ends -->
								       










 <div id='diesel_info' style='display: none;'><!-- status_info Starts -->
								        	<div class='col-md-12'>
									        	<button class='btn btn-default' type='button' data-toggle='modal' data-target='#add_diesel<?php echo $e_id; ?>'>
													<i class='fa fa-plus'></i>
													Add Diesel
												</button>
												<?php 

								             	$get_diesel_bus = "SELECT * FROM tbl_trip_report WHERE trip_report_id = '$e_id'";
								             	$run_diesel_bus = mysqli_query($con,$get_diesel_bus);
												$row_diesel_bus = mysqli_fetch_array($run_diesel_bus);
												$diesel_bus_id = $row_diesel_bus['bus_id'];	

								             	?>
												<?php

													            	include("modal/add_diesel.php");

													            ?> 	
	<a href="../PHPExcel/Examples/trip_record_diesel.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && trip_record_diesel=<?php echo $e_id; ?> && getView=<?php echo $getUpdate; ?>" class="btn btn-default">
<i class="fa fa-print"></i>
Get Excel
</a>															<div class='row'><!-- row Starts -->
													<div class='box box-success'><!--box box-success Starts -->
														<div class='box-header'><!-- box-header Starts -->
															<h3 class='box-title'>
																<i class='fa fa-wrench'></i> Diesel
																<span>
																	<a class='btn-sm btn-success navbar-btn right' href='#''><!-- btn btn-primary navbar-btn right Starts -->
																		<?php

																			$get_maintenancee = "SELECT * FROM tbl_diesel WHERE trip_report_id = '$e_id' AND bus_id = '$diesel_bus_id'";

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
													                  	<th>Action</th>
													                </tr>
													            </thead>
													            <tbody>
													            <?php

													            	$i = 0;

													            	$select_sum_diesel = "SELECT SUM(total_price) AS total_price_diesel FROM tbl_diesel WHERE trip_report_id = '$e_id'";
							                						$run_sum_diesel = mysqli_query($con,$select_sum_diesel);

							                						$row_sum_diesel = mysqli_fetch_array($run_sum_diesel);

							                						$total_price_diesel = $row_sum_diesel['total_price_diesel'];

													            	$get_bus_maintenancee = "SELECT * FROM tbl_diesel WHERE trip_report_id = '$e_id' AND bus_id = '$diesel_bus_id'";

													            	$run_bus_maintenancee = mysqli_query($con,$get_bus_maintenancee);

													            	while($row_bus_maintenancee = mysqli_fetch_array($run_bus_maintenancee)){

													            		$buss_id = $row_bus_maintenancee['trip_report_id'];
													            		
													            		$liters = $row_bus_maintenancee['liters'];

													            		$diesel_id = $row_bus_maintenancee['diesel_id'];


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
													                  	<td>
					                  										<button class='btn btn-default btn-small' type='button' data-toggle='modal' data-target='#remove_diesel<?php echo $diesel_id; ?>'>
					                  											<i class='fa fa-trash-o'></i>
					                  										</button>
													                  	</td>
													            	</tr>
													            	<?php

													            	include("modal/remove_diesel.php");

													            ?>
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





<div id='other_info' style='display: none;'><!-- status_info Starts -->
								        	<div class='col-md-12'>
									        	<button class='btn btn-default' type='button' data-toggle='modal' data-target='#add_note<?php echo $e_id; ?>'>
													<i class='fa fa-plus'></i>
													Add Note
												</button>
												<?php 

								             	$get_info_bus = "SELECT * FROM tbl_trip_report WHERE trip_report_id = '$e_id'";
								             	$run_info_bus = mysqli_query($con,$get_info_bus);
												$row_info_bus = mysqli_fetch_array($run_info_bus);
												$info_bus_id = $row_info_bus['bus_id'];	

								             	?>
												<?php

													            	include("modal/add_note.php");

													            ?> 	
	<a href="../PHPExcel/Examples/trip_record_info.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && trip_record_info=<?php echo $e_id; ?> && getView=<?php echo $getUpdate; ?>" class="btn btn-default">
<i class="fa fa-print"></i>
Get Excel
</a>															<div class='row'><!-- row Starts -->
													<div class='box box-success'><!--box box-success Starts -->
														<div class='box-header'><!-- box-header Starts -->
															<h3 class='box-title'>
																<i class='fa fa-wrench'></i> Notes
																<span>
																	<a class='btn-sm btn-success navbar-btn right' href='#''><!-- btn btn-primary navbar-btn right Starts -->
																		<?php

																			$get_maintenanceee = "SELECT * FROM tbl_info WHERE trip_report_id = '$e_id' AND bus_id = '$info_bus_id'";

																			$run_maintenanceee = mysqli_query($con,$get_maintenanceee);

																			$total_maintenanceee = mysqli_num_rows($run_maintenanceee);

																		?>
																		<?php echo $total_maintenanceee; ?>
																	</a><!-- btn btn-primary navbar-btn right Ends -->
																</span>
															</h3>
														</div><!-- box-header Ends -->
														<div class='box-body table-responsive no-padding'><!-- box-body table-responsive no-padding Starts -->
															<table class="table table-hover ample2">
																<thead>
													                <tr>
													                  	<th>#</th>
													                  	<th>Note</th>
													                  	<th>Date</th>
													                  	<th>Action</th>
													                </tr>
													            </thead>
													            <tbody>
													            <?php

													            	$i = 0;

													            	

													            	$get_bus_maintenanceee = "SELECT * FROM tbl_info WHERE trip_report_id = '$e_id' AND bus_id = '$diesel_bus_id'";

													            	$run_bus_maintenanceee = mysqli_query($con,$get_bus_maintenanceee);

													            	while($row_bus_maintenanceee = mysqli_fetch_array($run_bus_maintenanceee)){

													            		$busss_id = $row_bus_maintenanceee['trip_report_id'];
													            		
													            		$notes = $row_bus_maintenanceee['notes'];
													            		$info_id = $row_bus_maintenanceee['info_id'];

													            		$dateee = $row_bus_maintenanceee['date_created'];

													            		$i++;

													            ?>
													            	<tr>
													            		<td><?php echo $i; ?></td>
													            		<td><?php echo $notes; ?></td>
													                  	<td><?php echo $dateee; ?></td>
													            	<td>
					                  										<button class='btn btn-default btn-small' type='button' data-toggle='modal' data-target='#remove_info<?php echo $info_id; ?>'>
					                  											<i class='fa fa-trash-o'></i>
					                  										</button>
													                  	</td>
													            	</tr>
													            	<?php

													            	include("modal/remove_info.php");

													            ?>
													            	
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






								        <div id='net_info' style='display: none;'><!-- status_info Starts -->
								        	<div class='col-md-12'>
			<a href="../PHPExcel/Examples/trip_record_net.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && trip_record_net=<?php echo $e_id; ?> && getView=<?php echo $getUpdate; ?>" class="btn btn-default">
<i class="fa fa-print"></i>
Get Excel
</a>
									        												
<div class='row'><!-- row Starts -->
													<div class='box box-success'><!--box box-success Starts -->
														<div class='box-header'><!-- box-header Starts -->
															<h3 class='box-title'>
																<i class='fa fa-wrench'></i> Net Information
															</h3>
														</div><!-- box-header Ends -->
														<div class='box-body no-padding'><!-- box-body table-responsive no-padding Starts -->
															<form class="form-horizontal" action="" method="post">
																<div class="col-md-6"><!-- col-md-12 Starts -->
																	<div class='form-group'>
												                        <label class='control-label col-sm-4'>
												                            North Bound (Collections)
												                        </label>
												                        <div class='col-sm-8'>
												                        	<input type="text" name="nb" class="form-control" value="<?php echo $north; ?>" disabled>
												                        </div>  
												                    </div>
																</div><!-- col-md-12 Ends -->
																<div class="col-md-6"><!-- col-md-12 Starts -->
																	<div class='form-group'>
												                        <label class='control-label col-sm-4'>
												                            South Bound (Collections)
												                        </label>
												                        <div class='col-sm-8'>
												                        	<input type="text" name="sb" class="form-control" value="<?php echo $south; ?>" disabled>
												                        </div>  
												                    </div>
																</div><!-- col-md-12 Ends -->
																<div class="col-md-12"><!-- col-md-12 Starts -->
																	<div class='form-group'>
																		<label class='control-label col-sm-5'>
												                            Gross
												                        </label>
												                        <div class='col-sm-4'>
												                        	<input type='text' class='form-control' name='gross' value="<?php echo $gross; ?>" disabled>
												                        </div> 
												                    </div>
																</div><!-- col-md-12 Ends -->
																<div class="col-md-12"><!-- col-md-12 Starts -->
																	<div class='form-group'>
																		<label class='control-label col-sm-5'>
												                            Expense
												                        </label>
												                        <div class='col-sm-4'>
												                        	<input type='text' class='form-control' name='gross' value="<?php echo $total_price; ?>" disabled>
												                        </div> 
												                    </div>
																</div><!-- col-md-12 Ends -->
																<?php

																$total_net = $gross - $total_price;

																?>
																<div class="col-md-12"><!-- col-md-12 Starts -->
																	<div class='form-group'>
																		<label class='control-label col-sm-5'>
												                            Net
												                        </label>
												                        <div class='col-sm-4'>
												                        	<input type='text' class='form-control' name='gross' value="<?php echo $total_net; ?>" disabled>
												                        </div> 
												                    </div>
																</div><!-- col-md-12 Ends -->
															</form>
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

			$("#net_info").hide();
			$("#other_info").hide();

		});
	});

	$(document).ready(function(){

		$('#btn2').on('click', function(){

			$("#status_info").show();

			$("#applicant_info").hide();

			$("#diesel_info").hide();

			$("#net_info").hide();
			$("#other_info").hide();

		});
	});

	$(document).ready(function(){

		$('#btn5').on('click', function(){

$("#other_info").show();
			$("#status_info").hide();

			$("#applicant_info").hide();

			$("#diesel_info").hide();

			$("#net_info").hide();
			

		});
	});

	$(document).ready(function(){

		$('#btn3').on('click', function(){

			$("#diesel_info").show();

			$("#applicant_info").hide();

			$("#status_info").hide();

			$("#net_info").hide();
			$("#other_info").hide();

		});
	});

	$(document).ready(function(){

		$('#btn4').on('click', function(){

			$("#net_info").show();

			$("#diesel_info").hide();

			$("#applicant_info").hide();

			$("#status_info").hide();
			$("#other_info").hide();

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
