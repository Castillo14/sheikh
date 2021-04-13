
<div class="modal fade" id="from_inventory<?php echo $e_id; ?>" hidden="true" role="dialog">
	        <div class="modal-dialog">
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

	              									$get_in = "select * from tbl_inventory";

	              									$run_in = mysqli_query($con,$get_in);

	              									$total_in = mysqli_num_rows($run_in);

	              									echo $total_in;

	              								?>
	              							</a>
	              						</span>
	              					</h3>
	              				</div>
	              				<div class="box-body table-responsive no-padding">
	              					<form action="from_inventory.php" method="post">
	              						<input type="hidden" name="bus_id" value="<?php echo $e_id; ?>">
		              					<table class="table table-hover table-bordered ample2">
											<thead>
										        <tr>
										            <th>#</th>
										            <th>Inventory Place</th>
										            <th>Supplier</th> 
										            <th>Item Name</th>
										            <th>Item Description</th>
										            <th>Price</th>
										            <th>Remaining Stock</th>
										            <th>Action</th>
										        </tr>
										    </thead>
										    <tbody>
										    	<?php

										    		$get_docu = "SELECT * FROM tbl_inventory ORDER BY inventory_place_id, supplier_id";

										    		$run_docu = mysqli_query($con,$get_docu);

										    		$i = 0;

										    		while($row_docu = mysqli_fetch_array($run_docu)){

										    			$inventory_id = $row_docu['inventory_id'];

										    			$supplier_id = $row_docu['supplier_id'];
										    			$inventory_place_id = $row_docu['inventory_place_id'];
										    			$inventory_name = $row_docu['inventory_name'];
										    			$inventory_description = $row_docu['inventory_description'];
										    			$price = $row_docu['price'];
										    			$quant = $row_docu['quantity'];

										    			$i++;

										    			$select_place = mysqli_query($con,"SELECT * FROM tbl_inventory_place WHERE inventory_place_id = '$inventory_place_id'");
														$row_select2 = mysqli_fetch_array($select_place);
														$e_place_name = $row_select2['place_name'];

														$select_supply = mysqli_query($con,"SELECT * FROM tbl_supplier WHERE supplier_id = '$supplier_id'");
														$row_select3 = mysqli_fetch_array($select_supply);
														$e_sup_name = $row_select3['supplier_name'];

										    	?>
										    	<tr>
										    		<td><?php echo $i; ?></td>
										    		<td><?php echo $e_place_name; ?></td>
													<td><?php echo $e_sup_name; ?></td>
													<td><?php echo $inventory_name; ?></td>
													<td><?php echo $inventory_description; ?></td>
													<td><?php echo $price; ?></td>
													<td><?php echo $quant; ?></td>
										    		<td>
										    			<input type="radio" name="check" value="<?php echo $inventory_id; ?>">
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
	    
