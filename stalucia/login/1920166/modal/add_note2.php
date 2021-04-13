<div class="modal fade" id="add_note2<?php echo $e_id; ?>" hidden="true" role="dialog">
	        <div class="modal-dialog">
	            <div class="modal-content">
	              	<div class="modal-header">
	                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  		<span aria-hidden="true">&times;</span>
	                  	</button>
	                  	<center>
	                		<h4 class="modal-title pull-left"><i class="fa fa-plus"></i>&nbsp;<b>ADD NOTE</b></h4>
	                	</center>
	             	</div>
	             	<?php 

	             	$get_diesel_bus = "SELECT * FROM tbl_trip_report WHERE trip_report_id = '$trip_id'";
	             	$run_diesel_bus = mysqli_query($con,$get_diesel_bus);
					$row_diesel_bus = mysqli_fetch_array($run_diesel_bus);
					$diesel_bus_id = $row_diesel_bus['bus_id'];	

	             	?>
	              	<div class="modal-body">
	              		<div class="row">
	              			<div class="box box-success">
	              				<div class="box-header">
	              					<h3 class="box-title">
	              						<i class="fa fa-industry"></i>Notes
	              						<span>
	              							<a href="#" class="btn-sm btn-success navbar-btn right">
	              								<?php

	              									$get_diesel = "SELECT * FROM tbl_info WHERE bus_id = '$diesel_bus_id' AND trip_report_id = '$trip_id'";

	              									$run_diesel = mysqli_query($con,$get_diesel);

	              									$total_diesel = mysqli_num_rows($run_diesel);

	              									echo $total_diesel;

	              								?>
	              							</a>
	              						</span>
	              					</h3>
	              				</div>
	              				<div class="box-body table-responsive no-padding">
	              					<form action="add_note2.php" method="post" class="form-horizontal" enctype="multipart/form-data">
		              					<div class="form-group"><!-- form-group Starts -->
								<div class="col-md-6">
									<input type="hidden" name="trip_report_id" class="form-control" value="<?php echo $e_id; ?>">
									<input type="hidden" name="buss_id" class="form-control" value="<?php echo $diesel_bus_id; ?>">
								</div>
							</div><!-- form-group Ends -->
							
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Note
								</label>
								<div class="col-md-6">
									<input type="text" name="note" class="form-control" required>
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
	    
