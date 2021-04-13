
<div class="modal fade" id="main_inventory" hidden="true" role="dialog">
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

	              									$get_in = "select * from tbl_main_inventory";

	              									$run_in = mysqli_query($con,$get_in);

	              									$total_in = mysqli_num_rows($run_in);

	              									echo $total_in;

	              								?>
	              							</a>
	              						</span>
	              					</h3>
	              				</div>
	              				<div class="box-body table-responsive no-padding">
	              					<form action="from_inventory1.php" method="post">
	              						
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

										    		$get_docu = "SELECT * FROM tbl_main_inventory ORDER BY main_inventory_supplier";

										    		$run_docu = mysqli_query($con,$get_docu);

										    		$i = 0;

										    		while($row_docu = mysqli_fetch_array($run_docu)){

										    			$main_inventory_id = $row_docu['main_inventory_id'];

										    			$main_inventory_part_number = $row_docu['main_inventory_part_number'];
										    			$main_inventory_description = $row_docu['main_inventory_description'];
										    			$main_inventory_quantity = $row_docu['main_inventory_quantity'];
										    			$main_inventory_category = $row_docu['main_inventory_category'];
										    			$main_inventory_price = $row_docu['main_inventory_price'];
										    			$main_inventory_supplier = $row_docu['main_inventory_supplier'];
										    			$main_inventory_critical_level = $row_docu['main_inventory_critical_level'];
										    			$main_inventory_maximum_level = $row_docu['main_inventory_maxlevel'];
										    			$main_inventory_remarks = $row_docu['main_inventory_remarks'];

										    			$i++;


										    	?>
										    	<tr>
										    		<td><?php echo $i; ?></td>
										    		<td><?php echo $main_inventory_part_number; ?></td>
													<td><?php echo $main_inventory_supplier; ?></td>
													<td><?php echo $main_inventory_description; ?></td>
													<td><?php echo $main_inventory_category; ?></td>
													<td><?php echo $main_inventory_price; ?></td>
													<td><?php echo $main_inventory_quantity; ?></td>
										    		<td>
										    			<input type="radio" name="check" value="<?php echo $main_inventory_id; ?>">
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
	    
