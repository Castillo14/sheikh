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
	if(isset($_GET['remove_conductor'])){
		$delete_id = $_GET['remove_conductor'];
		$delete_driver2 = "SELECT * FROM tbl_conductor INNER JOIN tbl_bus_company ON tbl_conductor.bus_company_id = tbl_bus_company.bus_company_id WHERE tbl_conductor.conductor_id = '$delete_id' AND tbl_conductor.removed = 'No'";
		$run_delete = mysqli_query($con,$delete_driver2);
		$row_delete = mysqli_fetch_array($run_delete);
		$d_id = $row_delete['conductor_id'];
		$d_first_name = $row_delete['first_name'];
		$d_middle_name = $row_delete['middle_name'];
		$d_last_name = $row_delete['last_name'];
		$d_bus_company_id = $row_delete['bus_company_id'];
		$d_bus_company_name = $row_delete['bus_company_name'];
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
				<i class="fa fa-user"></i>
				Conductor / Remove Conductor
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
					Remove Conductor
				</h3><!-- panel-title Ends -->
			</div><!-- panel-heading Ends -->
			<div class="panel-body"><!-- panel-body Starts -->
				<form action="" method="post" class="form-horizontal">
	                       		<h3 class="text-center">Are you sure you want to remove <span style="color: red;"><?php echo $d_last_name; ?>, <?php echo $d_first_name; ?> <?php echo $d_middle_name; ?></span> ?</h3><br>
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
										<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && conductors=<?php echo $d_bus_company_id; ?> && getConductor=<?php echo $getAdd; ?>" class="btn btn-danger form-control">
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
		$update_delete = "UPDATE tbl_conductor SET removed = 'Yes', removed_by = '$creator' , date_removed = now() WHERE conductor_id = '$d_id'";

		$run_update_delete = mysqli_query($con,$update_delete);

		if($run_update_delete){

			echo "
                <script>
                    alert('Conductor Has Been Removed')
                </script>
            ";

            echo "
				<script>
					window.open('index.php?jScript=$jScript && newScript=$newScript && conductors=$d_bus_company_id && getConductor=$getAdd','_self')
				</script>
			";

		}else{

			echo "
                <script>
                    alert('Error Removing Conductor')
                </script>
            ";

		}
	}
?>
<?php
	}
?>