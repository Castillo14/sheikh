<?php

				if(!isset($_SESSION['account_username'])){

					echo "
						<script>
							window.open('../index.php','_self')
						</script>
					";

				}else{

			?>

			<section class="content-header">
	      			<h1>
	        			Malabon Inventory
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">Malabon Inventory</li>
	      			</ol>
	    		</section>

	    		<section class="content">
	    			<button class='btn btn-default' type='button' data-toggle='modal' data-target='#main_inventory'>
						<i class='fa fa-plus'></i>
						Add
					</button>
	    			<a href="index.php?malabon_inventory" class="btn btn-default">
	    				<i class="fa fa-refresh"></i>
						Refresh
	    			</a>
	    			 <?php

		            	include("modal/main_inventory1.php");

		            ?> 
					<div class="row">
	        			<div class="col-xs-12">
	          				<div class="box box-success">
	            				<div class="box-header">
	              					<h3 class="box-title"><i class="fa fa-list"></i>Malabon Inventory 
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT * FROM tbl_malabon_inventory";

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
	                  						<th>Part No.</th>
	                  						<th>Description</th>
	                  						<th>Quantity</th>
	                  						<th>Category</th>
	                  						<th>Price</th>
	                  						<th>Supplier</th>
	                  						<th>Critical Level</th>
	                  						<th>Maximum Level</th>
	                  						<th>Remarks</th>
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

	                						$select_company = "SELECT * FROM tbl_malabon_inventory";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    $main_id = $row['malabon_inventory_id'];
							                    $part_no = $row['malabon_inventory_part_number'];
							                    $description = $row['malabon_inventory_description'];
							                    $quantity = $row['malabon_inventory_quantity'];
							                    $category = $row['malabon_inventory_category'];
							                    $price = $row['malabon_inventory_price'];
							                    $supplier = $row['malabon_inventory_supplier'];
							                    $critical_level = $row['malabon_inventory_critical_level'];
							                    $maximum_level = $row['malabon_inventory_maxlevel'];
							                    $remarks = $row['malabon_inventory_remarks'];
							                    $i++;

							                    	if($quantity < $critical_level || $quantity == $critical_level){


							                    		 echo" <tr style='background-color: #D95555;'>
						                  						<td>$i</td>
						                  						<td>$part_no</td>
						                  						<td>$description</td>
						                  						<td>$quantity</td>
						                  						<td>$category</td>
						                  						<td>$price</td>
						                  						<td>$supplier</td>
						                  						<td>$critical_level</td>
						                  						<td>$maximum_level</td>
						                  						<td>$remarks</td>
						                  						
						                					</tr>";


							                    	}else{
							                    		echo" <tr>
						                  						<td>$i</td>
						                  						<td>$part_no</td>
						                  						<td>$description</td>
						                  						<td>$quantity</td>
						                  						<td>$category</td>
						                  						<td>$price</td>
						                  						<td>$supplier</td>
						                  						<td>$critical_level</td>
						                  						<td>$maximum_level</td>
						                  						<td>$remarks</td>
						                  						
						                					</tr>";
							                    	}
           								 
	                				
	                					

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