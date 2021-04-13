
<div class="modal fade" id="remove_expense2<?php echo $trp_exp; ?>" hidden="true" role="dialog">
	        <div class="modal-dialog">
	            <div class="modal-content">
	              	<div class="modal-header">
	                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  		<span aria-hidden="true">&times;</span>
	                  	</button>
	                  	<center>
	                		<h4 class="modal-title"><b>REMOVE EXPENSE</b></h4>
	                	</center>
	             	</div>
	              	<div class="modal-body">
	              		<?php

	              			$get_applicant = "SELECT * FROM tbl_trip_expense WHERE trip_expense_id = '$trp_exp'";

	              			$run_get = mysqli_query($con,$get_applicant);

	              			$row_get = mysqli_fetch_array($run_get);

	              			$trip_id = $row_get['trip_report_id'];

	              			$price = $row_get['price'];
	              			
	              			$exp_id = $row_get['expenses_id'];

	              			$get_docu = "SELECT * FROM tbl_expenses WHERE expenses_id = '$exp_id'";

	              			$run_docu = mysqli_query($con,$get_docu);

	              			$row_docu = mysqli_fetch_array($run_docu);

	              			$exp_name = $row_docu['expense_name'];

	              		?>
	    				<form class="form-horizontal" action="remove_trip_expense2.php" method="post" enctype="multipart/form-data">
	    					<div class="form-group"><!-- form-group Starts -->
								<div class="col-md-6">
									<input type="hidden" name="trip" class="form-control" value="<?php echo $trip_id; ?>">
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<div class="col-md-6">
									<input type="hidden" name="expense" class="form-control" value="<?php echo $trp_exp; ?>">
								</div>
							</div><!-- form-group Ends -->
							<h3 class="text-center">Are you sure you want to remove <span style="color: red;"><?php echo $exp_name; ?> : <?php echo $price; ?></span>&nbsp;?</h3><br>
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
	    
