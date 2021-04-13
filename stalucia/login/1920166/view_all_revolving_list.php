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

	if(isset($_GET['view_all_revolving_list'])){

		$category_id = $_GET['view_all_revolving_list'];
		$get_category = "SELECT * FROM tbl_revolving_category WHERE revolving_category_id = '$category_id' AND removed = 'No'";
		$run_get = mysqli_query($con,$get_category);
		$row_get = mysqli_fetch_array($run_get);
		$e_id = $row_get['revolving_category_id'];
		$e_name = $row_get['category_name'];
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
	        			<?php echo $e_name; ?> List
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">Revolving List</li>
	      			</ol>
	    		</section>
	    		<!-- Main content -->
	    		<section class="content">
	    			<a class="btn btn-default" href="index.php?add_edit_revolving_category">
						<i class="fa fa-reply"></i>
						Back
					</a>
					<a href="../PHPExcel/Examples/view_all_revolving_list.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && view_all_revolving_list=<?php echo $category_id; ?> && getView=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-print"></i>
						Get Excel
	    			</a>
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && view_all_revolving_list=<?php echo $category_id; ?> && getView=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-refresh"></i>
						Refresh
	    			</a>
	    			<form action="index.php?view_all_revolving_list_search" method="POST" class="form-horizontal">
	    				<div class="form-group">
	    					<input type="hidden" name="category" class="form-control" value="<?php echo $category_id; ?>"><br>
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
	              					<h3 class="box-title"><i class="fa fa-industry"></i><?php echo $e_name; ?> List
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT * FROM tbl_revolving_fund WHERE revolving_category_id = '$category_id'";

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
	                  						<th>Bus Company</th>
	                  						<th>Amount</th>
	                  						<th>Date</th>
	                					</tr>
	                					</thead>
	                					<tbody>
	                					<?php

	                					

	                						$i=0;

	                						$select_sum = "SELECT SUM(amount) AS total_sum FROM tbl_revolving_fund WHERE revolving_category_id = '$category_id'";
	                						$run_sum = mysqli_query($con,$select_sum);

	                						$row_sum = mysqli_fetch_array($run_sum);

	                						$total_sum = $row_sum['total_sum'];

	                						$select_company = "SELECT * FROM tbl_revolving_fund WHERE revolving_category_id = '$category_id' ORDER BY bus_company_id";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    $cat_id = $row['revolving_category_id'];
							                    $amount = $row['amount'];
							                    $date = $row['date_created'];
							                    $bus = $row['bus_company_id'];
							                    $i++;
							                    $get_company = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$bus'";
												$run_gett = mysqli_query($con,$get_company);
												$row_gett = mysqli_fetch_array($run_gett);
												$ee_id = $row_gett['bus_company_id'];
												$ee_name = $row_gett['bus_company_name'];

           								 ?> 
	                					<tr>
	                  						<td><?php echo $i; ?></td>
	                  						<td><?php echo $e_name; ?></td>
	                  						<td><?php echo $ee_name; ?></td>
	                  						<td><?php echo $amount; ?></td>
	                  						<td><?php echo $date; ?></td>
	                					</tr>
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