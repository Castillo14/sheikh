
<div class="modal fade" id="malabon_inventory<?php echo $e_id; ?>" hidden="true" role="dialog">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	              	<div class="modal-header">
	                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  		<span aria-hidden="true">&times;</span>
	                  	</button>
	                  	<center>
	                		<h4 class="modal-title pull-left"><i class="fa fa-plus"></i>&nbsp;<b>INVENTORY</b></h4>
	                	</center>
	             	</div>
	              	<div class="modal-body">
	              		<div class="row">
	              			<div class="box box-success">
	              				<div class="box-header">
	              					<h3 class="box-title">
	              						<i class="fa fa-list"></i>Inventory List
	               						<span>
	              							<a href="#" class="btn-sm btn-success navbar-btn right">
	              								<?php

	              									$get_in = "select * from tbl_malabon_inventory";

	              									$run_in = mysqli_query($con,$get_in);

	              									$total_in = mysqli_num_rows($run_in);

	              									echo $total_in;

	              								?>
	              							</a>
	              						</span>
	              					</h3>
	              				</div>
	              				<div class="box-body table-responsive no-padding">
	              					<form action="from_malabon_inventory.php" method="post">
	              						<input type="hidden" name="bus_id" value="<?php echo $e_id; ?>">
		              					<table class="table table-hover table-bordered ample2">
											<thead>
										        <tr>
										            <th>#</th>
										            <th>Part Number</th>
										            <th>Supplier</th> 
										            <th>Description</th>
										            <th>Category</th>
										            <th>Price</th>
										            <th>Remaining Stock</th>
										            <th>Action</th>
										        </tr>
										    </thead>
										    <tbody>
										    	<?php

										    		$get_docu = "SELECT * FROM tbl_malabon_inventory ORDER BY malabon_inventory_supplier";

										    		$run_docu = mysqli_query($con,$get_docu);

										    		$i = 0;

										    		while($row_docu = mysqli_fetch_array($run_docu)){

										    			$malabon_inventory_id = $row_docu['malabon_inventory_id'];

										    			$malabon_inventory_part_number = $row_docu['malabon_inventory_part_number'];
										    			$malabon_inventory_description = $row_docu['malabon_inventory_description'];
										    			$malabon_inventory_quantity = $row_docu['malabon_inventory_quantity'];
										    			$malabon_inventory_category = $row_docu['malabon_inventory_category'];
										    			$malabon_inventory_price = $row_docu['malabon_inventory_price'];
										    			$malabon_inventory_supplier = $row_docu['malabon_inventory_supplier'];
										    			$malabon_inventory_critical_level = $row_docu['malabon_inventory_critical_level'];

										    			$i++;


										    	?>
										    	<tr>
										    		<td><?php echo $i; ?></td>
										    		<td><?php echo $malabon_inventory_part_number; ?></td>
													<td><?php echo $malabon_inventory_supplier; ?></td>
													<td><?php echo $malabon_inventory_description; ?></td>
													<td><?php echo $malabon_inventory_category; ?></td>
													<td><?php echo $malabon_inventory_price; ?></td>
													<td><?php echo $malabon_inventory_quantity; ?></td>
										    		<td>
										    			<input type="radio" name="check" value="<?php echo $malabon_inventory_id; ?>">
										    		</td>
										    	</tr>
										    	<?php

										    		}

										    	?>
										    </tbody>
										    <tfoot>
										    	<tr>
										    		<td colspan="1"></td>
										    		<td>Quantity</td>
										    		<td><input type="text" name="quantity"></td>
										    		<td><button type="submit" name="submit" class="btn btn-primary form-control"><i class="fa fa-plus"></i>&nbsp;Add</button></td>
										    	</tr>
										    </tfoot>
										</table>
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
	    
