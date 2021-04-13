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
	        			Main Inventory
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">Main Inventory</li>
	      			</ol>
	    		</section>

	    		<section class="content">
	    			<a href="index.php?add_inventory" class="btn btn-default">
	    				<i class="fa fa-plus"></i>
						Add
	    			</a>
	    			<a href="index.php?main_inventory" class="btn btn-default">
	    				<i class="fa fa-refresh"></i>
						Refresh
	    			</a>
					<div class="row">
	        			<div class="col-xs-12">
	          				<div class="box box-success">
	            				<div class="box-header">
	              					<h3 class="box-title"><i class="fa fa-list"></i>Main Inventory 
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT * FROM tbl_main_inventory";

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
	                  						<th>Actions</th>
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

	                						$select_company = "SELECT * FROM tbl_main_inventory";

	                						$run_select_company = mysqli_query($con,$select_company);

	                						while($row=mysqli_fetch_array($run_select_company)){

							                    $main_id = $row['main_inventory_id'];
							                    $part_no = $row['main_inventory_part_number'];
							                    $description = $row['main_inventory_description'];
							                    $quantity = $row['main_inventory_quantity'];
							                    $category = $row['main_inventory_category'];
							                    $price = $row['main_inventory_price'];
							                    $supplier = $row['main_inventory_supplier'];
							                    $critical_level = $row['main_inventory_critical_level'];
							                    $maximum_level = $row['main_inventory_maxlevel'];
							                    $remarks = $row['main_inventory_remarks'];
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
						                  						<td>
						                  							
																	<a href='index.php?jScript=$jScript && newScript=$newScript && add_quantity=$main_id && getUpdate=$getUpdate' class='btn btn-default btn-small'>
																		<i class='fa fa-plus'></i>
																	</a>
																	<a href='index.php?jScript=$jScript && newScript=$newScript && edit_inventory=$main_id && getUpdate=$getUpdate' class='btn btn-default btn-small'>
																		<i class='fa fa-pencil'></i>
																	</a>
																	<a href='index.php?jScript=$jScript && newScript=$newScript && remove_inventory=$main_id && getUpdate=$getUpdate' class='btn btn-default btn-small'>
																		<i class='fa fa-trash-o'></i>
																	</a>
						                  						</td>
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
						                  						<td>
						                  							
																	<a href='index.php?jScript=$jScript && newScript=$newScript && add_quantity=$main_id && getUpdate=$getUpdate' class='btn btn-default btn-small'>
																		<i class='fa fa-plus'></i>
																	</a>
																	<a href='index.php?jScript=$jScript && newScript=$newScript && edit_inventory=$main_id && getUpdate=$getUpdate' class='btn btn-default btn-small'>
																		<i class='fa fa-pencil'></i>
																	</a>
																	<a href='index.php?jScript=$jScript && newScript=$newScript && remove_inventory=$main_id && getUpdate=$getUpdate' class='btn btn-default btn-small'>
																		<i class='fa fa-trash-o'></i>
																	</a>
						                  						</td>
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