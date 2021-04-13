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

	if(isset($_GET['drivers_attendance'])){

		$edit_id = $_GET['drivers_attendance'];
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
	        			<?php echo $e_name; ?> Drivers Attendance
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">Drivers</li>
	      			</ol>
	    		</section>
	    		<!-- Main content -->
	    		<section class="content">
	    			<a class="btn btn-default" href="#" target="_blank">
						<i class="fa fa-print"></i>
						Get PDF
					</a>
					<a class="btn btn-default" href="#"
						<i class="fa fa-print"></i>
						Get Excel
					</a>
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && drivers_attendance=<?php echo $edit_id; ?> && getRefresh=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-refresh"></i>
						Refresh
	    			</a>
					<div class="row">
	        			<div class="col-xs-12">
	          				<div class="box box-success">
	            				<div class="box-header">
	              					<h3 class="box-title"><i class="fa fa-user"></i><?php echo $e_name; ?> Drivers
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
	                  						<th>Driver Name</th>
	                  						<th>Contact Number</th>
	                  						<th>Email Address</th>
	                  						<th>Date</th>
	                  						<th>Time</th>
	                  						<th>Bus No</th>
	                					</tr>
	                					</thead>
	                					<tbody>
	                					<?php

	                					

	                						$i=0;

	                						$select_company = "SELECT * FROM tbl_trip_report WHERE bus_company_id = '$edit_id'";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    $trip_report_id = $row['trip_report_id'];
							                    $driver_id = $row['driver_id'];
							                    $datee = $row['date_created'];
							                    $timee = $row['time_depart'];
							                    $busid = $row['bus_id'];

							                    $select_bus = "SELECT * FROM tbl_bus WHERE bus_id = '$busid'";
							                    $run_select_bus = mysqli_query($con,$select_bus);
												$row_bus = mysqli_fetch_array($run_select_bus);
												$bb_id = $row_bus['bus_id'];
												$bb_bus_number = $row_bus['bus_number'];
												$bb_plate_number = $row_bus['plate_number'];

												$select_driver = "SELECT * FROM tbl_driver WHERE driver_id = '$driver_id'";
							                    $run_select_driver = mysqli_query($con,$select_driver);
												$row_driver = mysqli_fetch_array($run_select_driver);
												$d_id = $row_driver['driver_id'];
												$d_first_name = $row_driver['first_name'];
												$d_middle_name = $row_driver['middle_name'];
												$d_last_name = $row_driver['last_name'];
												$d_contact_number = $row_driver['contact_number'];
												$d_email_address = $row_driver['email_address'];
												$d_full = ucfirst($d_first_name) . " " . ucfirst($d_middle_name) . " " . ucfirst($d_last_name);
							                    $i++;

           								 ?> 
	                					<tr>
	                  						<td><?php echo $i; ?></td>
	                  						<td><?php echo $d_full; ?></td>
	                  						<td><?php echo $d_contact_number; ?></td>
	                  						<td><?php echo $d_email_address; ?></td>
	                  						<td><?php echo $datee; ?></td>
	                  						<td><?php echo $timee; ?></td>
	                  						<td><?php echo $bb_bus_number; ?></td>
	                  						<td>
	                  							
	                  							<a href="trip_record2.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && trip_record2=<?php echo $trip_report_id; ?> && getUpdate=<?php echo $getUpdate; ?>" class="btn btn-default btn-small">
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