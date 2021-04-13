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
                                	<?php

                                	$get_products = "SELECT * FROM tbl_expenses WHERE removed = 'No'";

                                	$run_products = mysqli_query($con,$get_products);

                                	while($row_products = mysqli_fetch_array($run_products)){

                                		$expenses_id = $row_products['expenses_id'];
                                		$expense_name = $row_products['expense_name'];
                                		
                                	?>
                                	<option name="expenses" value="<?php echo $expenses_id; ?>">
                                		<?php echo $expense_name; ?>
                                	</option>
                                	<?php

                                		}

                                	?>
                                </select>
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Particular
								</label>
								<div class="col-md-6">
									<input type="text" name="particular" class="form-control" required>
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
									Scanned File
								</label>
								<div class="col-md-6">
									<input type="file" name="scan" class="form-control">
								</div>
							</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
								<label class="col-md-3 control-label">
									Date
								</label>
								<div class="col-md-6">
									<input type="date" name="date_created" class="form-control" required>
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
	    
