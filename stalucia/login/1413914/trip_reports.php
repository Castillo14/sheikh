<?php

				if(!isset($_SESSION['account_username'])){

					echo "
						<script>
							window.open('../index.php','_self')
						</script>
					";

				}else{

			?>
			<?php

	if(isset($_GET['trip_reports'])){

		$edit_id = $_GET['trip_reports'];
		$get_bus = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$edit_id' AND removed = 'No'";
		$run_get = mysqli_query($con,$get_bus);
		$run_get = mysqli_fetch_array($run_get);
		$e_id = $run_get['bus_company_id'];
		$e_name = $run_get['bus_company_name'];
	}

	$jScript = md5(rand(1,9));
	 $newScript = md5(rand(1,9));
	 $Script = md5(rand(1,9));
	 $getUpdate = md5(rand(1,9));
   	 $getDelete = md5(rand(1,9));
   	 $getAdd = md5(rand(1,9));

?>
			<section class="content-header">
	      			<h1>
	        			<?php echo $e_name; ?> Trip Reports
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">Trip Reports</li>
	      			</ol>
	    		</section>
	    		<!-- Main content -->
	    		<section class="content">
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && add_trip_report=<?php echo $edit_id; ?> && getAdd=<?php echo $getDelete; ?>" class="btn btn-default">
	    				<i class="fa fa-plus"></i>
						Add Trip
	    			</a>
					<a class="btn btn-default" href="../TCPDF/User/bus_company_busses.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && bus_company_busses=<?php echo $edit_id; ?> && getView=<?php echo $getAdd; ?>" target="_blank">
						<i class="fa fa-print"></i>
						Get PDF
					</a>
					<a class="btn btn-default" href="../PHPExcel/Examples/trip_reports.php?trip_reports=<?php echo $edit_id; ?>"
						<i class="fa fa-print"></i>
						Get Excel
					</a>
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && trip_reports=<?php echo $edit_id; ?> && getRefresh=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-refresh"></i>
						Refresh
	    			</a>
					<div class="row">
	        			<div class="col-xs-12">
	          				<div class="box box-success">
	            				<div class="box-header">
	              					<h3 class="box-title"><i class="fa fa-tasks"></i><?php echo $e_name; ?> Trip Reports
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT * FROM tbl_trip_report WHERE bus_company_id = '$edit_id'";

	            								$run_total = mysqli_query($con,$total);

	            								$count_total = mysqli_num_rows($run_total);

	            								echo $count_total;

	            								?>
	        								</a><!-- btn btn-primary navbar-btn right Ends -->
	        							</span>
	    							</h3>
	              					
	            				</div>
	            				<!-- /.box-header -->
	            				<div class="box-body table-responsive no-padding">
	              					<table class="table table-hover" id="ample2">
	              						<thead>
	                					<tr>
	                  						<th>#</th>
	                  						<th>TOR Number</th>
	                  						<th>Bus Number</th>
	                  						<th>Plate Number</th>
	                  						<th>Driver</th>
	                  						<th>Conductor</th>
	                  						<th>Date</th>
	                  						<th>Actions</th>
	                					</tr>
	                					</thead>
	                					<tbody>
	                					<?php

	                					

	                						$i=0;

	                						$select_company = "SELECT * FROM tbl_trip_report WHERE bus_company_id = '$edit_id'";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    $trip_report_id = $row['trip_report_id'];
							                    $bus_id = $row['bus_id'];
							                    $tor_number = $row['tor_number'];
							                    $driver_id = $row['driver_id'];
							                    $conductor_id = $row['conductor_id'];
							                    $date_created = $row['date_created'];
							                    $i++;
							                    $select_bus = "SELECT * FROM tbl_bus WHERE bus_id = '$bus_id'";
							                    $run_select_bus = mysqli_query($con,$select_bus);
												$row_bus = mysqli_fetch_array($run_select_bus);
												$b_id = $row_bus['bus_id'];
												$b_number = $row_bus['bus_number'];
												$b_plate = $row_bus['plate_number'];
												$select_driver = "SELECT * FROM tbl_driver WHERE driver_id = '$driver_id'";
							                    $run_select_driver = mysqli_query($con,$select_driver);
												$row_driver = mysqli_fetch_array($run_select_driver);
												$d_id = $row_driver['driver_id'];
												$d_fname = $row_driver['first_name'];
												$d_mname = $row_driver['middle_name'];
												$d_lname = $row_driver['last_name'];
												$d_name = ucfirst($d_fname) . " " . ucfirst($d_mname) . " " . ucfirst($d_lname);

												$select_conductor = "SELECT * FROM tbl_conductor WHERE conductor_id = '$conductor_id'";
							                    $run_select_conductor = mysqli_query($con,$select_conductor);
												$row_conductor = mysqli_fetch_array($run_select_conductor);
												$c_id = $row_conductor['conductor_id'];
												$c_fname = $row_conductor['first_name'];
												$c_mname = $row_conductor['middle_name'];
												$c_lname = $row_conductor['last_name'];
												$c_name = ucfirst($c_fname) . " " . ucfirst($c_mname) . " " . ucfirst($c_lname);

           								 ?> 
	                					<tr>
	                  						<td><?php echo $i; ?></td>
	                  						<td><?php echo $tor_number; ?></td>
	                  						<td><?php echo $b_number; ?></td>
	                  						<td><?php echo $b_plate; ?></td>
	                  						<td><?php echo $d_name; ?></td>
	                  						<td><?php echo $c_name; ?></td>
	                  						<td><?php echo $date_created; ?></td>
	                  						<td>
	                  							<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && edit_trip_report=<?php echo $trip_report_id; ?> && getUpdate=<?php echo $getDelete; ?>" class="btn btn-default btn-small">
													<i class="fa fa-pencil"></i>
												</a>
	                  							<a href="trip_record.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && trip_record=<?php echo $trip_report_id; ?> && getUpdate=<?php echo $getUpdate; ?>" class="btn btn-default btn-small">
													<i class="fa fa-wrench"></i>
												</a>
	                  						</td>
	                  						
	                					</tr>
	                					<?php

	                						}

	                					?>
	                					</tbody>
	              					</table>
	            				</div>
	            				<!-- /.box-body -->
	          				</div>
	          				<!-- /.box -->
	        			</div>
	      			</div>
	    		</section>
	    		<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	

<script>
  	$(function () {
    $('#ample1').DataTable()
    $('#ample2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true
    })
  	})
	</script>
			<?php

				}

			?>