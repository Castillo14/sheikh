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


		$category = $_POST['category'];
		$bus_company = $_POST['bus_company'];
		$one = $_POST['one'];
		$two = $_POST['two'];

		$get_category = "SELECT * FROM tbl_expenses WHERE expenses_id = '$category' AND removed = 'No'";
		$run_get = mysqli_query($con,$get_category);
		$row_get = mysqli_fetch_array($run_get);
		$e_id = $row_get['expenses_id'];
		$e_name = $row_get['expense_name'];

		$get_company = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$bus_company' AND removed = 'No'";
		$run_gett = mysqli_query($con,$get_company);
		$row_gett = mysqli_fetch_array($run_gett);
		$ee_id = $row_gett['bus_company_id'];
		$ee_name = $row_gett['bus_company_name'];
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
	        			<?php echo $ee_name; ?> <?php echo $e_name; ?> List
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">Expense List</li>
	      			</ol>
	    		</section>
	    		<!-- Main content -->
	    		<section class="content">
	    			<a class="btn btn-default" href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && expense_list=<?php echo $category; ?> && view_expense_list_company=<?php echo $bus_company; ?> && getUpdate=<?php echo $getUpdate; ?>">
						<i class="fa fa-reply"></i>
						Back
					</a>
					<a href="../PHPExcel/Examples/view_expense_list_search.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && view_expense_list_search=<?php echo $e_id; ?> && one=<?php echo $one; ?> && two=<?php echo $two; ?> && view_expense_list_company=<?php echo $bus_company; ?> && getView=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-print"></i>
						Get Excel
	    			</a>
					<div class="row">
	        			<div class="col-xs-12">
	          				<div class="box box-success">
	            				<div class="box-header">
	              					<h3 class="box-title"><i class="fa fa-industry"></i><?php echo $ee_name; ?> <?php echo $e_name; ?> List
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT * FROM tbl_trip_expense WHERE expenses_id = '$category' AND bus_company_id = '$bus_company' AND date_created BETWEEN '$one' AND '$two'";

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
	                  						<th>Amount</th>
	                  						<th>Date</th>
	                					</tr>
	                					</thead>
	                					<tbody>
	                					<?php

	                					

	                						$i=0;

	                						$select_sum = "SELECT SUM(price) AS total_sum FROM tbl_trip_expense WHERE bus_company_id = '$bus_company' AND expenses_id = '$category' AND date_created BETWEEN '$one' AND '$two'";
	                						$run_sum = mysqli_query($con,$select_sum);

	                						$row_sum = mysqli_fetch_array($run_sum);

	                						$total_sum = $row_sum['total_sum'];

	                						$select_company = "SELECT * FROM tbl_trip_expense WHERE expenses_id = '$category' AND bus_company_id = '$bus_company' AND date_created BETWEEN '$one' AND '$two'";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    $cat_id = $row['expenses_id'];
							                    $amount = $row['price'];
							                    $date = $row['date_created'];
							                    $i++;

           								 ?> 
	                					<tr>
	                  						<td><?php echo $i; ?></td>
	                  						<td><?php echo $e_name; ?></td>
	                  						<td><?php echo $amount; ?></td>
	                  						<td><?php echo $date; ?></td>
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
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true
    })
  	})
	</script>
			<?php

				}

			?>