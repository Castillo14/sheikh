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

		$one = $_POST['one'];
		$two = $_POST['two'];
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
	        			All Revolving Fund
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">Revolving Fund</li>
	      			</ol>
	    		</section>
	    		<!-- Main content -->
	    		<section class="content">
	    			
					<form action="../PHPExcel/Examples/view_all_revolving_list_search_2.php" method="POST">
						<a href="index.php?all_revolving_fund" class="btn btn-default">
	    				<i class="fa fa-reply"></i>
						Back
	    			</a>
						
						<input type="hidden" name="one" value="<?php echo $one; ?>">
						<input type="hidden" name="two" value="<?php echo $two; ?>">
						<input type="submit" name="get" value="Get Excel" class="btn btn-default">
					</form>
					<div class="row">
	        			<div class="col-xs-12">
	          				<div class="box box-success">
	            				<div class="box-header">
	              					<h3 class="box-title"><i class="fa fa-industry"></i>All Revolving Fund
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT * FROM tbl_revolving_fund WHERE date_created BETWEEN '$one' AND '$two'";

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
	                  						<th>Bus Company</th>
	                  						<th>Date</th>
	                  						<th>Payee To</th>
	                  						<th>Purchases</th>
	                  						<th>Amount</th>
	                  						<th>Category</th>
	                					</tr>
	                					</thead>
	                					<tbody>
	                					<?php

	                					

	                						$i=0;

	                						$select_sum = "SELECT SUM(amount) AS total_sum FROM tbl_revolving_fund WHERE date_created BETWEEN '$one' AND '$two'";
	                						$run_sum = mysqli_query($con,$select_sum);

	                						$row_sum = mysqli_fetch_array($run_sum);

	                						$total_sum = $row_sum['total_sum'];

	                						$select_company = "SELECT * FROM tbl_revolving_fund WHERE date_created BETWEEN '$one' AND '$two' ORDER BY bus_company_id";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    $cat_id = $row['revolving_category_id'];
							                    $bus_id = $row['bus_company_id'];
							                    $pcv = $row['pcv_no'];
							                    $payee_to = $row['payee_to'];
							                    $purchases = $row['purchases'];
							                    $amount = $row['amount'];
							                    $date = $row['date_created'];
							                    $i++;
							                    $select_bus_company = "SELECT * FROM tbl_revolving_category WHERE revolving_category_id = '$cat_id'";
							                    $run_select_bus_company = mysqli_query($con,$select_bus_company);
												$row_bus_company = mysqli_fetch_array($run_select_bus_company);
												$bc_cat_name = $row_bus_company['category_name'];
												$select_bus_companyy = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$bus_id'";
							                    $run_select_bus_companyy = mysqli_query($con,$select_bus_companyy);
												$row_bus_companyy = mysqli_fetch_array($run_select_bus_companyy);
												$bc_bus_name = $row_bus_companyy['bus_company_name'];

           								 ?> 
	                					<tr>
	                  						<td><?php echo $i; ?></td>
	                  						<td><?php echo $pcv; ?></td>
	                  						<td><?php echo $bc_bus_name; ?></td>
	                  						<td><?php echo $date; ?></td>
	                  						<td><?php echo $payee_to; ?></td>
	                  						<td><?php echo $purchases; ?></td>
	                  						<td><?php echo $amount; ?></td>
	                  						<td><?php echo $bc_cat_name; ?></td>
	                					</tr>
	                					<?php

	                						}

	                					?>
	                					</tbody>
	                					<tfoot>
	                						<tr>
													            		<th colspan='5'>
													            			
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