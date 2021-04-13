<?php
	if(!isset($_SESSION['account_username'])){
		echo "
            <script>
                window.open('../index.php','_self')
            </script>
        ";
	}else{
?>
<?php
	if(isset($_GET['remove_inventory'])){
		$delete_id = $_GET['remove_inventory'];
		$delete_bus = "SELECT * FROM tbl_main_inventory WHERE main_inventory_id = '$delete_id'";
		$run_delete = mysqli_query($con,$delete_bus);
		$row_delete = mysqli_fetch_array($run_delete);
		$d_id = $row_delete['main_inventory_id'];
		$d_main_inventory_part_number = $row_delete['main_inventory_part_number'];
		$d_main_inventory_description = $row_delete['main_inventory_description'];
	}
?>
<div class="row"><!-- 1 row Starts -->
	<div class="col-lg-12"><!-- col-lg-12 Starts -->
		<ol class="breadcrumb"><!-- breadcrumb Starts -->
			<li>
				<i class="fa fa-list"></i>
				Inventory / Remove Inventory
			</li>
		</ol><!-- breadcrumb Ends -->
	</div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->
<div class="row"><!-- 2 row Starts -->
	<div class="col-lg-12"><!-- col-lg-12 Starts -->
		<div class="panel panel-default"><!-- panel panel-default Starts -->
			<div class="panel-heading"><!-- panel-heading Starts -->
				<h3 class="panel-title"><!-- panel-title Starts -->
					<i class="fa fa-trash-o fa-fw"></i>
					Remove Inventory
				</h3><!-- panel-title Ends -->
			</div><!-- panel-heading Ends -->
			<div class="panel-body"><!-- panel-body Starts -->
				<form action="" method="post" class="form-horizontal">
	                       		<h3 class="text-center">Are you sure you want to remove <span style="color: red;"><?php echo $d_main_inventory_part_number; ?> -- <?php echo $d_main_inventory_description; ?></span> ? </h3> <br>
	                       		<div class="form-group"><!-- form-group Starts -->
									<label class="col-md-3 control-label">
										
									</label>
									<div class="col-md-6">
										<input type="submit" name="delete" value="Remove" class="btn btn-primary form-control">
									</div>
								</div><!-- form-group Ends -->
								<div class="form-group"><!-- form-group Starts -->
									<label class="col-md-3 control-label">
										
									</label>
									<div class="col-md-6">
										<a href="index.php?main_inventory" class="btn btn-danger form-control">
											Cancel
										</a>
									</div>
								</div><!-- form-group Ends -->
	              			</form>
			</div><!-- panel-body Ends -->
		</div><!-- panel panel-default Ends -->
	</div><!-- col-lg-12 Ends -->
</div><!-- 2 row Ends -->
<?php
	if(isset($_POST['delete'])){
		$update_delete = "DELETE FROM tbl_main_inventory WHERE main_inventory_id = '$d_id'";

		$run_update_delete = mysqli_query($con,$update_delete);

		if($run_update_delete){

			echo "
                <script>
                    alert('Inventory Has Been Removed')
                </script>
            ";

            echo "
				<script>
					window.open('index.php?main_inventory','_self')
				</script>
			";

		}else{

			echo "
                <script>
                    alert('Error Removing Inventory')
                </script>
            ";

		}
	}
?>
<?php
	}
?>