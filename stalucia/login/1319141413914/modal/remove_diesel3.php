
<div class="modal fade" id="remove_diesel3<?php echo $diesel_id; ?>" hidden="true" role="dialog">
	        <div class="modal-dialog">
	            <div class="modal-content">
	              	<div class="modal-header">
	                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  		<span aria-hidden="true">&times;</span>
	                  	</button>
	                  	<center>
	                		<h4 class="modal-title"><b>REMOVE DIESEL</b></h4>
	                	</center>
	             	</div>
	              	<div class="modal-body">
	              		<?php

	              			$get_applicant = "SELECT * FROM tbl_diesel WHERE diesel_id = '$diesel_id'";

	              			$run_get = mysqli_query($con,$get_applicant);

	              			$row_get = mysqli_fetch_array($run_get);

	              			$trip_id = $row_get['diesel_id'];
	              			$trip_report = $row_get['trip_report_id'];

	              			$liters = $row_get['liters'];

	              		?>
	    				<form class="form-horizontal" action="remove_trip_diesel3.php" method="post" enctype="multipart/form-data">
	    					<div class="form-group"><!-- form-group Starts -->
								<div class="col-md-6">
									<input type="hidden" name="trip" class="form-control" value="<?php echo $trip_id; ?>">
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<div class="col-md-6">
									<input type="hidden" name="tripr" class="form-control" value="<?php echo $trip_report; ?>">
								</div>
							</div><!-- form-group Ends -->
							
							<h3 class="text-center">Are you sure you want to remove <span style="color: red;"><?php echo $liters; ?> Liters</span>&nbsp;?</h3><br>
	                       		<div class="form-group"><!-- form-group Starts -->
									<label class="col-md-3 control-label">
										
									</label>
									<div class="col-md-6">
										<input type="submit" name="delete" value="Remove" class="btn btn-primary form-control">
									</div>
								</div><!-- form-group Ends -->
	    				</form>
	              	</div>
	            </div>
	            <!-- /.modal-content -->
	        </div>
	        <!-- /.modal-dialog -->
	    </div>
	    
