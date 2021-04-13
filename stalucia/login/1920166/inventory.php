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

	if(isset($_GET['inventory'])){

		$edit_id = $_GET['inventory'];
		$get_bus = "SELECT * FROM tbl_inventory_place WHERE inventory_place_id = '$edit_id' AND removed = 'No'";
		$run_get = mysqli_query($con,$get_bus);
		$row_get = mysqli_fetch_array($run_get);
		$e_id = $row_get['inventory_place_id'];
		$e_name = $row_get['place_name'];
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
	        			<?php echo $e_name; ?> Inventory
	      			</h1>
	      			<ol class="breadcrumb">
	        			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        			<li class="active">Inventory</li>
	      			</ol>
	    		</section>
	    		<!-- Main content -->
	    		<section class="content">
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && add_inventory=<?php echo $edit_id; ?> && getAdd=<?php echo $getDelete; ?>" class="btn btn-default">
	    				<i class="fa fa-plus"></i>
						Add
	    			</a>
					<a class="btn btn-default" href="#" target="_blank">
						<i class="fa fa-print"></i>
						Get PDF
					</a>
					<a class="btn btn-default" href="#"
						<i class="fa fa-print"></i>
						Get Excel
					</a>
	    			<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && inventory=<?php echo $edit_id; ?> && getRefresh=<?php echo $getUpdate; ?>" class="btn btn-default">
	    				<i class="fa fa-refresh"></i>
						Refresh
	    			</a>
					<div class="row">
	        			<div class="col-xs-12">
	          				<div class="box box-success">
	            				<div class="box-header">
	              					<h3 class="box-title"><i class="fa fa-list"></i>Inventory 
	              						<span>
	              							<a class="btn-sm btn-primary navbar-btn right" href="#"><!-- btn btn-primary navbar-btn right Starts -->
	            								<?php

	            								$total = "SELECT * FROM tbl_inventory WHERE removed = 'No' AND inventory_place_id = '$edit_id'";

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
	                  						<th>Supplier</th>
	                  						<th>Product Name</th>
	                  						<th>Product Code</th>
	                  						<th>Product Description</th>
	                  						<th>Quantity</th>
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
									   	 $getAdd = md5(rand(1,9));

	                						$i=0;

	                						$select_inventory = "SELECT * FROM tbl_inventory WHERE removed = 'No' AND inventory_place_id = '$edit_id' ORDER BY supplier_id";

	                						$run_select = mysqli_query($con,$select_inventory);

	                						while($row=mysqli_fetch_array($run_select)){

							                    $inventory_id = $row['inventory_id'];
							                    $sup_id = $row['supplier_id'];
							                    $product_name = $row['inventory_name'];
							                    $product_code = $row['inventory_code'];
							                    $quantity = $row['quantity'];
							                    $desc = $row['inventory_description'];
							                    $i++;
							                    $get_sup = "SELECT * FROM tbl_supplier WHERE supplier_id = '$sup_id' AND removed = 'No'";
												$run_get_sup = mysqli_query($con,$get_sup);
												$row_get_sup = mysqli_fetch_array($run_get_sup);
												$s_id = $row_get_sup['supplier_id'];
												$s_name = $row_get_sup['supplier_name'];

           								 ?> 
	                					<tr>
	                  						<td><?php echo $i; ?></td>
	                  						<td><?php echo $s_name; ?></td>
	                  						<td><?php echo $product_name; ?></td>
	                  						<td><?php echo $product_code; ?></td>
	                  						<td><?php echo $desc; ?></td>
	                  						<td><?php echo $quantity; ?></td>
	                  						<td>
	                  							<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && add_quantity=<?php echo $inventory_id; ?> && getAdd=<?php echo $getAdd; ?>" class="btn btn-default btn-small">
													<i class="fa fa-plus"></i>
												</a>
	                  							<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && edit_inventory=<?php echo $inventory_id; ?> && getUpdate=<?php echo $getUpdate; ?>" class="btn btn-default btn-small">
													<i class="fa fa-pencil"></i>
												</a>
												<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && delete_inventory=<?php echo $inventory_id; ?> && getDelete=<?php echo $getDelete; ?>" class="btn btn-default btn-small">
													<i class="fa fa-remove"></i>
												</a>
	                  						</td>
	                					</tr>
	                					<?php

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