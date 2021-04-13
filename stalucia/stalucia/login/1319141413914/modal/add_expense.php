<div class="modal fade" id="add_expense<?php echo $e_id; ?>" hidden="true" role="dialog">
	        <div class="modal-dialog">
	            <div class="modal-content">
	              	<div class="modal-header">
	                	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                  		<span aria-hidden="true">&times;</span>
	                  	</button>
	                  	<center>
	                		<h4 class="modal-title pull-left"><i class="fa fa-plus"></i>&nbsp;<b>ADD EXPENSE</b></h4>
	                	</center>
	             	</div>
	              	<div class="modal-body">
	              		<div class="row">
	              			<div class="box box-success">
	              				<div class="box-header">
	              					<h3 class="box-title">
	              						<i class="fa fa-industry"></i>Expense List
	              						<span>
	              							<a href="#" class="btn-sm btn-success navbar-btn right">
	              								<?php

	              									$get_expense = "SELECT * FROM tbl_expenses";

	              									$run_expense = mysqli_query($con,$get_expense);

	              									$total_expense = mysqli_num_rows($run_expense);

	              									echo $total_expense;

	              								?>
	              							</a>
	              						</span>
	              					</h3>
	              				</div>
	              				<div class="box-body table-responsive no-padding">
	              					<form action="add_trip_expenses.php" method="post" class="form-horizontal" enctype="multipart/form-data">
		              					<div class="form-group"><!-- form-group Starts -->
								<div class="col-md-6">
									<input type="hidden" name="trip_report_id" class="form-control" value="<?php echo $e_id; ?>">
								</div>
							</div><!-- form-group Ends -->
							
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Expense List
								</label>
								<div class="col-md-6">
									<select name="expenses" class="form-control">
                                	
                                	<option name="expenses" value="driver_commission">
                                		Driver Commission
                                	</option>
                                	<option name="expenses" value="conductor_commission">
                                		Conductor Commission
                                	</option>
                                	<option name="expenses" value="pihit">
                                		Pihit
                                	</option>
                                	<option name="expenses" value="toll_fee">
                                		Toll Fee
                                	</option>
                                	<option name="expenses" value="parking_fee">
                                		Parking Fee
                                	</option>
                                	<option name="expenses" value="coding_allowance">
                                		Coding Allowance
                                	</option>
                                	<option name="expenses" value="fix_mini">
                                		Fix Mini
                                	</option>
                                	<option name="expenses" value="b_allow">
                                		B-Allow Maint
                                	</option>
                                	<option name="expenses" value="oil_lube">
                                		Oil & Lube
                                	</option>
                                	<option name="expenses" value="maint_pms">
                                		Maint PMS
                                	</option>
                                	<option name="expenses" value="representation">
                                		Representation
                                	</option>
                                	
                                </select>
								</div>
							</div><!-- form-group Ends -->
							
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Price
								</label>
								<div class="col-md-6">
									<input type="text" name="price" class="form-control" required>
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
	    
