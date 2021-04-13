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
	if(isset($_GET['remove_bol'],$_GET['bus_comp'])){
		$delete_id = $_GET['remove_bol'];
		$company_id = $_GET['bus_comp'];
		$delete_bus = "SELECT * FROM tbl_bol WHERE bol_id = '$delete_id' AND removed = 'No'";
		$run_delete = mysqli_query($con,$delete_bus);
		$row_delete = mysqli_fetch_array($run_delete);
		$d_id = $row_delete['bol_id'];
		 $bol_number = $row_delete['bol_number'];
			$amount = $row_delete['bol_amount'];

			$get_company = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$company_id' AND removed = 'No'";
		$run_gett = mysqli_query($con,$get_company);
		$row_gett = mysqli_fetch_array($run_gett);
		$ee_id = $row_gett['bus_company_id'];
		$ee_name = $row_gett['bus_company_name'];
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
				<i class="fa fa-industry"></i>
				BOL / Remove BOL
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
					Remove BOL
				</h3><!-- panel-title Ends -->
			</div><!-- panel-heading Ends -->
			<div class="panel-body"><!-- panel-body Starts -->
				<form action="" method="post" class="form-horizontal">
	                       		<h3 class="text-center">Are you sure you want to remove <span style="color: red;"><?php echo $bol_number; ?>,<?php echo $company_id; ?>, <?php echo $amount; ?></span> ? </h3> <br>
	                       		<div class="form-group"><!-- form-group Starts -->
									<label class="col-md-3 control-label">
										
									</label>
									<div class="col-md-6">
										<input type="submit" name="delete" value="Remove BOL" class="btn btn-primary form-control">
									</div>
								</div><!-- form-group Ends -->
								<div class="form-group"><!-- form-group Starts -->
									<label class="col-md-3 control-label">
										
									</label>
									<div class="col-md-6">
										<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && dispatcher_bol=<?php echo $company_id; ?> && getUpdate=<?php echo $getUpdate; ?>" class="btn btn-danger form-control">
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
		$update_delete = "UPDATE tbl_bol SET removed = 'Yes', removed_by = '$creator' , date_removed = now() WHERE bol_id = '$d_id'";

		$run_update_delete = mysqli_query($con,$update_delete);

		if($run_update_delete){

			echo "
                <script>
                    alert('BOL Has Been Removed')
                </script>
            ";

            echo "
				<script>
					window.open('index.php?jScript=$jScript && newScript=$newScript && dispatcher_bol=$company_id && getUpdate=$getUpdate','_self')
				</script>
			";

		}else{

			echo "
                <script>
                    alert('Error Removing BOL')
                </script>
            ";

		}
	}
?>
<?php
	}
?>