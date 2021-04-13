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

	if(isset($_GET['view_revolving_list'],$_GET['view_revolving_list_company'])){

		$category_id = $_GET['view_revolving_list'];
		$company_id = $_GET['view_revolving_list_company'];
		$get_category = "SELECT * FROM tbl_revolving_category WHERE revolving_category_id = '$category_id' AND removed = 'No'";
		$run_get = mysqli_query($con,$get_category);
		$row_get = mysqli_fetch_array($run_get);
		$e_id = $row_get['revolving_category_id'];
		$e_name = $row_get['category_name'];

		$get_company = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$company_id' AND removed = 'No'";
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
	        			<li class="active">Revolving List</li>
	      			</ol>
	    		</section>
	    		<!-- Main content -->
	    		<section class="content">
	    			<a class="btn btn-default" href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && revolving_list=<?php echo $company_id; ?> && getUpdate=<?php echo $getUpdate; ?>">
						<i class="fa fa-reply"></i>
						Back
					</a>
					<a href="../PHPExcel/Examples/view_revolving_list.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && view_revolving_list=<?php echo $category_id; ?> && view_revolving_list_company=<?php echo $company_id; ?> && getView=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-print"></i>
						Get Excel
	    			</a>
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && view_revolving_list=<?php echo $category_id; ?> && view_revolving_list_company=<?php echo $company_id; ?> && getUpdate=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-refresh"></i>
						Refresh
	    			</a>
	    			<form action="index.php?view_revolving_list_search" method="POST" class="form-horizontal">
	    				<div class="form-group">
	    					<input type="hidden" name="category" class="form-control" value="<?php echo $category_id; ?>"><br>
	    					<input type="hidden" name="bus_company" class="form-control" value="<?php echo $company_id; ?>">
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
	              					<h3 class="box-title"><i class="fa fa-industry"></i><?php echo $ee_name; ?> <?php echo $e_name; ?> List
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT * FROM tbl_revolving_fund WHERE revolving_category_id = '$category_id' AND bus_company_id = '$company_id'";

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
	                  						<th>Revolving Category</th>
	                  						<th>Amount</th>
	                  						<th>Date</th>
	                					</tr>
	                					</thead>
	                					<tbody>
	                					<?php

	                					

	                						$i=0;

	                						$select_sum = "SELECT SUM(amount) AS total_sum FROM tbl_revolving_fund WHERE bus_company_id = '$company_id' AND revolving_category_id = '$category_id'";
	                						$run_sum = mysqli_query($con,$select_sum);

	                						$row_sum = mysqli_fetch_array($run_sum);

	                						$total_sum = $row_sum['total_sum'];

	                						$select_company = "SELECT * FROM tbl_revolving_fund WHERE revolving_category_id = '$category_id' AND bus_company_id = '$company_id'";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    $cat_id = $row['revolving_category_id'];
							                    $amount = $row['amount'];
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