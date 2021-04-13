<div class="modal fade" id="other_maintenance<?php echo $e_id; ?>" hidden="true" role="dialog">
	        <div class="modal-dialog">
	            <div class="modal-content">
	              	<div class="modal-header">
	                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  		<span aria-hidden="true">&times;</span>
	                  	</button>
	                  	<center>
	                		<h4 class="modal-title pull-left"><i class="fa fa-plus"></i>&nbsp;<b>OTHER MAINTENANCE</b></h4>
	                	</center>
	             	</div>
	              	<div class="modal-body">
	              		<div class="row">
	              			<div class="box box-success">
	              				<div class="box-header">
	              					
	              				</div>
	              				<div class="box-body table-responsive no-padding">
	              					<form action="other_maintenance.php" method="post" class="form-horizontal" enctype="multipart/form-data">
		              					<div class="form-group"><!-- form-group Starts -->
								<div class="col-md-6">
									<input type="hidden" name="bus_id" class="form-control" value="<?php echo $e_id; ?>">
								</div>
							</div><!-- form-group Ends -->
							
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Item Name
								</label>
								<div class="col-md-6">
									<input type="text" name="item_name" class="form-control" required>
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
									Item Price
								</label>
								<div class="col-md-6">
									<input type="text" name="price" class="form-control" required>
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Buy From
								</label>
								<div class="col-md-6">
									<input type="text" name="buy_from" class="form-control" required>
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
	    
