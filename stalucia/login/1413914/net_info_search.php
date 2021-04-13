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

	if(isset($_POST['submit'])){

		$bus_company = $_POST['bus_company'];
		$one = $_POST['one'];
		$two = $_POST['two'];

	
		$get_bus = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$bus_company' AND removed = 'No'";
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
	        			<?php echo $e_name; ?> Net Information
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">Net Information</li>
	      			</ol>
	    		</section>
	    		<!-- Main content -->
	    		<section class="content">
					
	    			<form action="../PHPExcel/Examples/net_info_search.php" method="POST">
						<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && net_info=<?php echo $bus_company; ?> && getRefresh=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-reply"></i>
						Back
	    			</a>
						<input type="hidden" name="bus_company" value="<?php echo $bus_company; ?>">
						<input type="hidden" name="one" value="<?php echo $one; ?>">
						<input type="hidden" name="two" value="<?php echo $two; ?>">
						<input type="submit" name="get" value="Get Excel" class="btn btn-default">
					</form>
					<div class="row">
	        			<div class="col-xs-12">
	          				<div class="box box-success">
	            				<div class="box-header">
	              					<h3 class="box-title"><i class="fa fa-money"></i><?php echo $e_name; ?> Net Information
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT * FROM tbl_trip_report WHERE bus_company_id = '$bus_company'  AND date_created BETWEEN '$one' AND '$two'";

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
	                  						<th>Driver</th>
	                  						<th>Conductor</th>
	                  						<th>Date</th>
	                  						<th>NB</th>
	                  						<th>SB</th>
	                  						<th>Gross</th>
	                  						<th>Expense</th>
	                  						<th>Net</th>
	                					</tr>
	                					</thead>
	                					<tbody>
	                					<?php

	                					
	                						$nb = 0;
	                						$sb = 0;
	                						$total_price = 0;
	                						$total_pricee = 0;
	                						$net_total = 0;
	                						$net_totall = 0;
	                						$gross = 0;
	                						$grosss = 0;
	                						$i=0;

	                						$select_company = "SELECT * FROM tbl_trip_report WHERE bus_company_id = '$bus_company' AND date_created BETWEEN '$one' AND '$two'";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    $trip_report_id = $row['trip_report_id'];
							                    $bus_id = $row['bus_id'];
							                    $tor_number = $row['tor_number'];
							                    $driver_id = $row['driver_id'];
							                    $conductor_id = $row['conductor_id'];
							                    $date_created = $row['date_created'];
							                    $nb = $row['nb'];
							                    $sb = $row['sb'];
							                    $i++;
							                    $select_bus = "SELECT * FROM tbl_bus WHERE bus_id = '$bus_id'";
							                    $run_select_bus = mysqli_query($con,$select_bus);
												$row_bus = mysqli_fetch_array($run_select_bus);
												$b_id = $row_bus['bus_id'];
												$b_number = $row_bus['bus_number'];
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

												$select_sum = "SELECT SUM(price) AS total_price FROM tbl_trip_expense WHERE trip_report_id = '$trip_report_id' AND date_created BETWEEN '$one' AND '$two'";
		                						$run_sum = mysqli_query($con,$select_sum);

		                						$row_sum = mysqli_fetch_array($run_sum);

		                						$total_price = $row_sum['total_price'];

		                						$select_summm = "SELECT SUM(price) AS total_pricee FROM tbl_trip_expense WHERE bus_company_id = '$bus_company' AND date_created BETWEEN '$one' AND '$two'";
		                						$run_summm = mysqli_query($con,$select_summm);

		                						$row_summm = mysqli_fetch_array($run_summm);

		                						$total_pricee = $row_summm['total_pricee'];

		                						$select_summ = "SELECT SUM(nb) AS total_nb, SUM(sb) AS total_sb FROM tbl_trip_report WHERE bus_company_id = '$bus_company' AND date_created BETWEEN '$one' AND '$two'";
		                						$run_summ = mysqli_query($con,$select_summ);

		                						$row_summ = mysqli_fetch_array($run_summ);

		                						$total_nb = $row_summ['total_nb'];
		                						$total_sb = $row_summ['total_sb'];

		                						$grosss = $total_nb + $total_sb;

		                						$gross = $nb + $sb;

		                						$net_total = $gross - $total_price;

		                						$net_totall = $grosss - $total_pricee;


           								 ?> 
	                					<tr>
	                  						<td><?php echo $i; ?></td>
	                  						<td><?php echo $tor_number; ?></td>
	                  						<td><?php echo $b_number; ?></td>
	                  						<td><?php echo $d_name; ?></td>
	                  						<td><?php echo $c_name; ?></td>
	                  						<td><?php echo $date_created; ?></td>
	                  						<td><?php echo $nb; ?></td>
	                  						<td><?php echo $sb; ?></td>
	                  						<td><?php echo $gross; ?></td>
	                  						<td><?php echo $total_price; ?></td>
	                  						<td><?php echo $net_total; ?></td>
	                  						
	                					</tr>
	                					<?php

	                						}

	                					?>
	                					</tbody>
	                					<tfoot>
	                						<tr>
													            		<th colspan='9'>
													            			
													            		</th>
													            		<th>
													            			<i class='fa fa-money'></i> Total Net 
													            		</th>
													            		<th>
													            			<?php echo $net_totall; ?>
													            		</th>
													            	</tr>
	                					</tfoot>
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