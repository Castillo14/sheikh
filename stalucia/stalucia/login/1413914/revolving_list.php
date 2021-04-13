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

	if(isset($_GET['revolving_list'])){

		$edit_id = $_GET['revolving_list'];
		$get_bus = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$edit_id' AND removed = 'No'";
		$run_get = mysqli_query($con,$get_bus);
		$row_get = mysqli_fetch_array($run_get);
		$e_id = $row_get['bus_company_id'];
		$e_name = $row_get['bus_company_name'];
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
	        			<?php echo $e_name; ?> Revolving List
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">Revolving List</li>
	      			</ol>
	    		</section>
	    		<!-- Main content -->
	    		<section class="content">
					<a class="btn btn-default" href="../TCPDF/User/revolving_list.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && revolving_list=<?php echo $edit_id; ?> && getView=<?php echo $getAdd; ?>" target="_blank">
						<i class="fa fa-print"></i>
						Get PDF
					</a>
					<a class="btn btn-default" href="../PHPExcel/Examples/revolving_list.php?revolving_list=<?php echo $edit_id; ?>"
						<i class="fa fa-print"></i>
						Get Excel
					</a>
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && revolving_list=<?php echo $edit_id; ?> && getRefresh=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-refresh"></i>
						Refresh
	    			</a>
					<div class="row">
	        			<div class="col-xs-12">
	          				<div class="box box-success">
	            				<div class="box-header">
	              					<h3 class="box-title"><i class="fa fa-industry"></i><?php echo $e_name; ?> Revolving List
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT tbl_revolving_category.revolving_category_id, tbl_revolving_category.category_name AS cat_name, tbl_revolving_category.removed, tbl_revolving_fund.bus_company_id, SUM(tbl_revolving_fund.amount) AS total_amount, tbl_revolving_fund.revolving_category_id FROM tbl_revolving_category LEFT JOIN tbl_revolving_fund ON tbl_revolving_category.revolving_category_id = tbl_revolving_fund.revolving_category_id WHERE tbl_revolving_category.removed = 'No' AND tbl_revolving_fund.bus_company_id = '$edit_id' GROUP BY tbl_revolving_category.revolving_category_id";

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
	                  						<th>Total Amount</th>
	                  						<th>Actions</th>
	                					</tr>
	                					</thead>
	                					<tbody>
	                					<?php

	                					

	                						$i=0;

	                						$select_sum = "SELECT SUM(amount) AS total_sum FROM tbl_revolving_fund WHERE bus_company_id = '$edit_id'";
	                						$run_sum = mysqli_query($con,$select_sum);

	                						$row_sum = mysqli_fetch_array($run_sum);

	                						$total_sum = $row_sum['total_sum'];

	                						$select_company = "SELECT tbl_revolving_category.revolving_category_id, tbl_revolving_category.category_name AS cat_name, tbl_revolving_category.removed, tbl_revolving_fund.bus_company_id, SUM(tbl_revolving_fund.amount) AS total_amount, tbl_revolving_fund.revolving_category_id FROM tbl_revolving_category LEFT JOIN tbl_revolving_fund ON tbl_revolving_category.revolving_category_id = tbl_revolving_fund.revolving_category_id WHERE tbl_revolving_category.removed = 'No' AND tbl_revolving_fund.bus_company_id = '$edit_id' GROUP BY tbl_revolving_category.revolving_category_id";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    $cat_id = $row['revolving_category_id'];
							                    $cat_name = $row['cat_name'];
							                    $total_amount = $row['total_amount'];
							                    $i++;

           								 ?> 
	                					<tr>
	                  						<td><?php echo $i; ?></td>
	                  						<td><?php echo $cat_name; ?></td>
	                  						<td><?php echo $total_amount; ?></td>
	                  						<td>
	                  							
	                  							<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && view_revolving_list=<?php echo $cat_id; ?> && view_revolving_list_company=<?php echo $edit_id; ?> && getUpdate=<?php echo $getUpdate; ?>" class="btn btn-default btn-small">
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