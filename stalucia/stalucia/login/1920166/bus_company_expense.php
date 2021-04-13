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

	if(isset($_GET['bus_company_expense'])){

		$edit_id = $_GET['bus_company_expense'];
	}

	$jScript = md5(rand(1,9));
	 $newScript = md5(rand(1,9));
	 $Script = md5(rand(1,9));
	 $getUpdate = md5(rand(1,9));
   	 $getDelete = md5(rand(1,9));
   	 $getAdd = md5(rand(1,9));

?>
<?php
	
	$select_buss_comp = mysqli_query($con,"SELECT * FROM tbl_bus_company WHERE bus_company_id = '$edit_id'");
	$row_buss_comp = mysqli_fetch_array($select_buss_comp);
	$bus_comp_name = $row_buss_comp['bus_company_name'];

?>
			<section class="content-header">
	      			<h1>
	        			<?php echo $bus_comp_name; ?> Expenses
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">Bus Company Expenses</li>
	      			</ol>
	    		</section>
	    		<!-- Main content -->
	    		<section class="content">
					<a class="btn btn-default" href="#!" target="_blank">
						<i class="fa fa-print"></i>
						Get PDF
					</a>
					<a class="btn btn-default" href="../PHPExcel/Examples/bus_company_expense.php?bus_company_expense=<?php echo $edit_id; ?>"
						<i class="fa fa-print"></i>
						Get Excel
					</a>
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && bus_company_expense=<?php echo $edit_id; ?> && getRefresh=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-refresh"></i>
						Refresh
	    			</a>
					<div class="row">
	        			<div class="col-xs-12">
	          				<div class="box box-success">
	            				<div class="box-header">
	              					<h3 class="box-title"><i class="fa fa-industry"></i>Bus Company Expenses
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT tbl_expenses.expenses_id, tbl_expenses.expense_name AS cat_name, tbl_expenses.removed, tbl_trip_expense.bus_company_id, SUM(tbl_trip_expense.price) AS total_amount, tbl_trip_expense.expenses_id FROM tbl_expenses LEFT JOIN tbl_trip_expense ON tbl_expenses.expenses_id = tbl_trip_expense.expenses_id WHERE tbl_expenses.removed = 'No' AND tbl_trip_expense.bus_company_id = '$edit_id' GROUP BY tbl_expenses.expenses_id";

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
	                  						<th>Expense Name</th>
	                  						<th>Total Amount</th>
	                  						<th>Details</th>
	                					</tr>
	                					</thead>
	                					<tbody>
	                					<?php

	                					$jScript = md5(rand(1,9));
										 $newScript = md5(rand(1,9));
										 $Script = md5(rand(1,9));
										 $getUpdate = md5(rand(1,9));
									   	 $getDelete = md5(rand(1,9));

	                						$i=0;

	                						$select_sum = "SELECT SUM(price) AS total_sum FROM tbl_trip_expense WHERE bus_company_id = '$edit_id'";
	                						$run_sum = mysqli_query($con,$select_sum);

	                						$row_sum = mysqli_fetch_array($run_sum);

	                						$total_sum = $row_sum['total_sum'];

	                						$select_company = "SELECT tbl_expenses.expenses_id, tbl_expenses.expense_name AS cat_name, tbl_expenses.removed, tbl_trip_expense.bus_company_id AS buss_company_idd, SUM(tbl_trip_expense.price) AS total_amount, tbl_trip_expense.expenses_id FROM tbl_expenses LEFT JOIN tbl_trip_expense ON tbl_expenses.expenses_id = tbl_trip_expense.expenses_id WHERE tbl_expenses.removed = 'No' AND tbl_trip_expense.bus_company_id = '$edit_id' GROUP BY tbl_expenses.expenses_id";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    
							                    $exp_id = $row['expenses_id'];
							                    $cat_name = $row['cat_name'];
							                    $total_amount = $row['total_amount'];
							                    $i++;

           								 ?> 
	                					<tr>
	                  						<td><?php echo $i; ?></td>
	                  						<td><?php echo $cat_name; ?></td>
	                  						<td><?php echo $total_amount; ?></td>
	                  						<td>
	                  							<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && expense_list=<?php echo $exp_id; ?> && view_expense_list_company=<?php echo $edit_id; ?> && getUpdate=<?php echo $getUpdate; ?>" class="btn btn-default btn-small">
													<i class="fa fa-eye"></i>
												</a>
	                  						</td>
	                  						
	                					</tr>
	                					<?php

	                						}

	                					?>
	                					</tbody>
	                					<tfoot>
	                						<tr>
													            		<th colspan='1'>
													            			
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