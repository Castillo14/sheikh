<div class="modal fade" id="add_diesell<?php echo $e_id; ?>" hidden="true" role="dialog">
	        <div class="modal-dialog">
	            <div class="modal-content">
	              	<div class="modal-header">
	                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  		<span aria-hidden="true">&times;</span>
	                  	</button>
	                  	<center>
	                		<h4 class="modal-title pull-left"><i class="fa fa-plus"></i>&nbsp;<b>ADD DIESEL</b></h4>
	                	</center>
	             	</div>
	              	<div class="modal-body">
	              		<div class="row">
	              			<div class="box box-success">
	              				<div class="box-header">
	              					<h3 class="box-title">
	              						<i class="fa fa-industry"></i>Diesel
	              						<span>
	              							<a href="#" class="btn-sm btn-success navbar-btn right">
	              								<?php

	              									$get_diesel = "SELECT * FROM tbl_diesel WHERE bus_id = '$e_id'";

	              									$run_diesel = mysqli_query($con,$get_diesel);

	              									$total_diesel = mysqli_num_rows($run_diesel);

	              									echo $total_diesel;

	              								?>
	              							</a>
	              						</span>
	              					</h3>
	              				</div>
	              				<div class="box-body table-responsive no-padding">
	              					<form action="add_diesell.php" method="post" class="form-horizontal" enctype="multipart/form-data">
		              					<div class="form-group"><!-- form-group Starts -->
								<div class="col-md-6">
									<input type="hidden" name="buss_id" class="form-control" value="<?php echo $e_id; ?>">
								</div>
							</div><!-- form-group Ends -->
							
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Diesel From
								</label>
								<div class="col-md-6">
									<select name="diesel" class="form-control">
                                	
                                	<option name="diesel" value="Terminal">
                                		Terminal
                                	</option>
                                	<option name="diesel" value="Outside">
                                		Outside
                                	</option>
                                	
                                </select>
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Place
								</label>
								<div class="col-md-6">
									<input type="text" name="place" class="form-control" required>
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Destination
								</label>
								<div class="col-md-6">
									<input type="text" name="destination" class="form-control">
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Liters
								</label>
								<div class="col-md-6">
									<input type="text" name="liters" class="form-control" required>
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Price / Liter
								</label>
								<div class="col-md-6">
									<input type="text" name="price" class="form-control" required>
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Date
								</label>
								<div class="col-md-6">
									<input type="date" name="datee" class="form-control" required>
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
	    
