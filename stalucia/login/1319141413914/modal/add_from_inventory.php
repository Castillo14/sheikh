<div class="modal fade" id="add_from_inventory<?php echo $e_id; ?><?php echo $inventory_place_id; ?>" hidden="true" role="dialog">
	        <div class="modal-dialog">
	            <div class="modal-content">
	              	<div class="modal-header">
	                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  		<span aria-hidden="true">&times;</span>
	                  	</button>
	                  	<center>
	                		<h4 class="modal-title pull-left"><i class="fa fa-plus"></i>&nbsp;<b>ADD FROM INVENTORY</b></h4>
	                	</center>
	             	</div>
	              	<div class="modal-body">
	              		<div class="row">
	              			<div class="box box-success">
	              				<div class="box-header">
	              					<h3 class="box-title">
	              						<i class="fa fa-industry"></i>Inventory List
	              						<span>
	              							<a href="#" class="btn-sm btn-success navbar-btn right">
	              								<?php

	              									$get_inventory = "SELECT * FROM tbl_inventory WHERE removed = 'No'";

	              									$run_inventory = mysqli_query($con,$get_inventory);

	              									$total_inventory = mysqli_num_rows($run_inventory);

	              									echo $total_inventory;

	              								?>
	              							</a>
	              						</span>
	              					</h3>
	              				</div>
	              				<div class="box-body table-responsive no-padding">
	              					<form action="add_from_inventory.php" method="post" class="form-horizontal" enctype="multipart/form-data">
		              					<div class="form-group"><!-- form-group Starts -->
								<div class="col-md-6">
									<input type="text" name="bus_id" class="form-control" value="<?php echo $e_id; ?>">
								</div>
								<div class="col-md-6">
									<input type="text" name="inventory_aydi" class="form-control" value="<?php echo $inventory_place_id; ?>">
								</div>
							</div><!-- form-group Ends -->
							
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Product Name
								</label>
								<div class="col-md-6">
									<select name="inventory" class="form-control">
                                	<?php

                                	$get_products = "SELECT * FROM tbl_inventory WHERE removed = 'No'";

                                	$run_products = mysqli_query($con,$get_products);

                                	while($row_products = mysqli_fetch_array($run_products)){

                                		$inventory_id = $row_products['inventory_id'];
                                		$inventory_name = $row_products['inventory_name'];
                                		
                                	?>
                                	<option name="inventory" value="<?php echo $inventory_id; ?>">
                                		<?php echo $inventory_name; ?>
                                	</option>
                                	<?php

                                		}

                                	?>
                                </select>
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Description
								</label>
								<div class="col-md-6">
									<input type="text" name="description" class="form-control" required>
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Quantity
								</label>
								<div class="col-md-6">
									<input type="number" name="quantity" class="form-control" required>
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									
								</label>
								<div class="col-md-6">
									<input type="submit" name="add" class="form-control btn btn-primary" value="Insert">
								</div>
							</div><!-- form-group Ends -->
									</form>
	              				</div>
	              			</div>
	              		</div>
	              	</div>
	            </div>
	            <!-- /.modal-content -->
	        </div>
	        <!-- /.modal-dialog -->
	    </div>
	    
