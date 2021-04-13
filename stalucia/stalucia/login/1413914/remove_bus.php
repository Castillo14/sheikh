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
	if(isset($_GET['remove_bus'])){
		$delete_id = $_GET['remove_bus'];
		$delete_bus = "SELECT * FROM tbl_bus WHERE bus_id = '$delete_id' AND removed = 'No'";
		$run_delete = mysqli_query($con,$delete_bus);
		$row_delete = mysqli_fetch_array($run_delete);
		$d_id = $row_delete['bus_id'];
		$d_bus_number = $row_delete['bus_number'];
		$d_plate_number = $row_delete['plate_number'];
		$d_bus_company = $row_delete['bus_company_id'];
		$select_bus_company = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$d_bus_company'";
                                                $run_select_bus_company = mysqli_query($con,$select_bus_company);
                                                $row_bus_company = mysqli_fetch_array($run_select_bus_company);
                                                $bc_id = $row_bus_company['bus_company_id'];
                                                $bc_company_name = $row_bus_company['bus_company_name'];
	}
	$jScript = md5(rand(1,9));
       $newScript = md5(rand(1,9));
       $Script = md5(rand(1,9));
       $getUpdate = md5(rand(1,9));
         $getDelete = md5(rand(1,9));
         $getAdd = md5(rand(1,9));
?>
<div class="row"><!-- 1 row Starts -->
	<div class="col-lg-12"><!-- col-lg-12 Starts -->
		<ol class="breadcrumb"><!-- breadcrumb Starts -->
			<li>
				<i class="fa fa-bus"></i>
				Busses / Remove Bus
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
					Remove Bus
				</h3><!-- panel-title Ends -->
			</div><!-- panel-heading Ends -->
			<div class="panel-body"><!-- panel-body Starts -->
				<form action="" method="post" class="form-horizontal">
	                       		<h3 class="text-center">Are you sure you want to remove ?<br>
	                       			Bus Number : <span style="color: red;"><?php echo $d_bus_number; ?></span> <br>
	                       			Plate Number : <span style="color: red;"><?php echo $d_plate_number; ?></span></h3><br>
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
										<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && busses=<?php echo $d_bus_company; ?> && getBusses=<?php echo $getAdd; ?>" class="btn btn-danger form-control">
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
		$update_delete = "UPDATE tbl_bus SET removed = 'Yes', removed_by = '$creator' , date_removed = now() WHERE bus_id = '$d_id'";

		$run_update_delete = mysqli_query($con,$update_delete);

		if($run_update_delete){

			echo "
                <script>
                    alert('Bus Has Been Removed')
                </script>
            ";

            echo "
				<script>
					window.open('index.php?jScript=$jScript && newScript=$newScript && busses=$d_bus_company && getBusses=$getAdd','_self')
				</script>
			";

		}else{

			echo "
                <script>
                    alert('Error Removing Bus')
                </script>
            ";

		}
	}
?>
<?php
	}
?>