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

	if(isset($_GET['dispatcher_bol'])){

		$edit_id = $_GET['dispatcher_bol'];
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
	        			<?php echo $e_name; ?> BOL
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">BOL</li>
	      			</ol>
	    		</section>
	    		<!-- Main content -->
	    		<section class="content">
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && add_dispatcher_bol=<?php echo $edit_id; ?> && getAdd=<?php echo $getDelete; ?>" class="btn btn-default">
	    				<i class="fa fa-plus"></i>
						Add BOL
	    			</a>
					<a class="btn btn-default" href="../PHPExcel/Examples/bol_info.php?bol_info=<?php echo $edit_id; ?>"
						<i class="fa fa-print"></i>
						Get Excel
					</a>
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && dispatcher_bol=<?php echo $edit_id; ?> && getRefresh=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-refresh"></i>
						Refresh
	    			</a>
	    			<form action="index.php?dispatcher_bol_search" method="POST" class="form-horizontal">
	    				<div class="form-group">
	    					<input type="hidden" name="bus_company" class="form-control" value="<?php echo $edit_id; ?>"><br>
	    					<label class="control-label col-md-1">
	    						Date 1
	    					</label>
	    					<div class="col-md-2">
	    						<input type="date" name="one" class="form-control">
	    					</div>
	    					<label class="control-label col-md-1">
	    						Date 2
	    					</label>
	    					<div class="col-md-2">
	    						<input type="date" name="two" class="form-control">
	    					</div>
	    				</div>
	    				<div class="form-group">
	    					<div class="col-md-6">
	    						<input type="submit" name="submit" value="Search" class="btn btn-primary form-control">
	    					</div>
	    				</div>
	    			</form>
					<div class="row">
	        			<div class="col-xs-12">
	          				<div class="box box-success">
	            				<div class="box-header">
	              					<h3 class="box-title"><i class="fa fa-money"></i><?php echo $e_name; ?> BOL
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT * FROM tbl_bol WHERE bus_company_id = '$edit_id'";

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
	                  						<th>BOL Number</th>
	                  						<th>Amount</th>
	                  						<th>Comp (60%)</th>
	                  						<th>Ipon (10%)</th>
	                  						<th>Crew (25%)</th>
	                  						<th>Dispatcher (5%)</th>
	                  						<th>Date</th>
	                  						<th>Action</th>
	                					</tr>
	                					</thead>
	                					<tbody>
	                					<?php

	                					
	                						$comp = 0;
	                						$amount = 0;
	                						$ipon = 0;
	                						$crew = 0;
	                						$dispatcher = 0;
	                						$i=0;
	                						$total_amount=0;
	                						$total_comp=0;
	                						$total_ipon=0;
	                						$total_crew=0;
	                						$total_dispatcher=0;

	                						$select_company = "SELECT * FROM tbl_bol WHERE bus_company_id = '$edit_id'";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    $bol_id = $row['bol_id'];
							                    $bol_number = $row['bol_number'];
							                    $amount = $row['bol_amount'];
							                    $comp = $row['comp'];
							                    $ipon = $row['ipon'];
							                    $crew = $row['crew'];
							                    $dispatcher = $row['dispatcher'];
							                    $date_created = $row['date_created'];
							                    $i++;

							                    $select_amount = "SELECT SUM(bol_amount) AS total_amount FROM tbl_bol WHERE bus_company_id = '$edit_id'";
		                						$run_amount = mysqli_query($con,$select_amount);

		                						$row_amount = mysqli_fetch_array($run_amount);

		                						$total_amount = $row_amount['total_amount'];

		                						$select_comp = "SELECT SUM(comp) AS total_comp FROM tbl_bol WHERE bus_company_id = '$edit_id'";
		                						$run_comp = mysqli_query($con,$select_comp);

		                						$row_comp = mysqli_fetch_array($run_comp);

		                						$total_comp = $row_comp['total_comp'];

		                						$select_ipon = "SELECT SUM(ipon) AS total_ipon FROM tbl_bol WHERE bus_company_id = '$edit_id'";
		                						$run_ipon = mysqli_query($con,$select_ipon);

		                						$row_ipon = mysqli_fetch_array($run_ipon);

		                						$total_ipon = $row_ipon['total_ipon'];

		                						$select_crew = "SELECT SUM(crew) AS total_crew FROM tbl_bol WHERE bus_company_id = '$edit_id'";
		                						$run_crew = mysqli_query($con,$select_crew);

		                						$row_crew = mysqli_fetch_array($run_crew);

		                						$total_crew = $row_crew['total_crew'];

		                						$select_dispatcher = "SELECT SUM(dispatcher) AS total_dispatcher FROM tbl_bol WHERE bus_company_id = '$edit_id'";
		                						$run_dispatcher = mysqli_query($con,$select_dispatcher);

		                						$row_dispatcher = mysqli_fetch_array($run_dispatcher);

		                						$total_dispatcher = $row_dispatcher['total_dispatcher'];


           								 ?> 
	                					<tr>
	                  						<td><?php echo $i; ?></td>
	                  						<td><?php echo $bol_number; ?></td>
	                  						<td><?php echo $amount; ?></td>
	                  						<td><?php echo $comp; ?></td>
	                  						<td><?php echo $ipon; ?></td>
	                  						<td><?php echo $crew; ?></td>
	                  						<td><?php echo $dispatcher; ?></td>
	                  						<td><?php echo $date_created; ?></td>
	                  						<td>
	                  							<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && remove_bol=<?php echo $bol_id; ?> && bus_comp=<?php echo $edit_id; ?> && getDelete=<?php echo $getDelete; ?>" class="btn btn-default btn-small">
													<i class="fa fa-remove"></i>
												</a>
											</td>
	                  						
	                					</tr>
	                					<?php

	                						}

	                					?>
	                					</tbody>
	                					<tfoot>
	                						<tr>
													            		<th colspan="2">
													            			
													            		</th>
													            		
													            		<th>
													            			<?php echo $total_amount; ?>
													            		</th>
													            		<th>
													            			<?php echo $total_comp; ?>
													            		</th>
													            		<th>
													            			<?php echo $total_ipon; ?>
													            		</th>
													            		<th>
													            			<?php echo $total_crew; ?>
													            		</th>
													            		<th>
													            			<?php echo $total_dispatcher; ?>
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