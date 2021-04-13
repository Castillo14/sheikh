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

	if(isset($_GET['revolving_fund'])){

		$edit_id = $_GET['revolving_fund'];
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
	        			<?php echo $e_name; ?> Revolving Fund
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">Revolving Fund</li>
	      			</ol>
	    		</section>
	    		<!-- Main content -->
	    		<section class="content">
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && add_revolving_fund=<?php echo $edit_id; ?> && getAdd=<?php echo $getDelete; ?>" class="btn btn-default">
	    				<i class="fa fa-plus"></i>
						Add Fund
	    			</a>
					<a class="btn btn-default" href="../TCPDF/User/revolving_fund.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && revolving_fund=<?php echo $edit_id; ?> && getView=<?php echo $getAdd; ?>" target="_blank">
						<i class="fa fa-print"></i>
						Get PDF
					</a>
					<a class="btn btn-default" href="../PHPExcel/Examples/revolving_fund.php?revolving_fund=<?php echo $edit_id; ?>"
						<i class="fa fa-print"></i>
						Get Excel
					</a>
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && revolving_fund=<?php echo $edit_id; ?> && getRefresh=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-refresh"></i>
						Refresh
	    			</a>
	    			<form action="index.php?revolving_fund_search" method="POST" class="form-horizontal">
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
	              					<h3 class="box-title"><i class="fa fa-industry"></i><?php echo $e_name; ?> Revolving Fund
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT * FROM tbl_revolving_fund WHERE bus_company_id = '$edit_id'";

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
	                  						<th>PCV No</th>
	                  						<th>Date</th>
	                  						<th>Payee To</th>
	                  						<th>Purchases</th>
	                  						<th>Amount</th>
	                  						<th>Scanned File</th>
	                  						<th>Category</th>
	                					</tr>
	                					</thead>
	                					<tbody>
	                					<?php

	                					

	                						$i=0;

	                						$select_sum = "SELECT SUM(amount) AS total_sum FROM tbl_revolving_fund WHERE bus_company_id = '$edit_id'";
	                						$run_sum = mysqli_query($con,$select_sum);

	                						$row_sum = mysqli_fetch_array($run_sum);

	                						$total_sum = $row_sum['total_sum'];

	                						$select_company = "SELECT * FROM tbl_revolving_fund WHERE bus_company_id = '$edit_id' ORDER BY revolving_category_id";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    $cat_id = $row['revolving_category_id'];
							                    $pcv = $row['pcv_no'];
							                    $payee_to = $row['payee_to'];
							                    $purchases = $row['purchases'];
							                    $amount = $row['amount'];
							                    $scanned_file = $row['scanned_file'];
							                    $date = $row['date_created'];
							                    $i++;
							                    $select_bus_company = "SELECT * FROM tbl_revolving_category WHERE revolving_category_id = '$cat_id'";
							                    $run_select_bus_company = mysqli_query($con,$select_bus_company);
												$row_bus_company = mysqli_fetch_array($run_select_bus_company);
												$bc_cat_name = $row_bus_company['category_name'];

           								 ?> 
	                					<tr>
	                  						<td><?php echo $i; ?></td>
	                  						<td><?php echo $pcv; ?></td>
	                  						<td><?php echo $date; ?></td>
	                  						<td><?php echo $payee_to; ?></td>
	                  						<td><?php echo $purchases; ?></td>
	                  						<td><?php echo $amount; ?></td>
	                  						<td><a download="../revolving_files/<?php echo $scanned_file; ?>" href="../revolving_files/<?php echo $scanned_file; ?>"><?php echo $scanned_file; ?></a></td>
	                  						<td><?php echo $bc_cat_name; ?></td>
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
													            			<?php echo $total_sum; ?>
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