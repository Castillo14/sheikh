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
	if(isset($_GET['remove_account'])){
		$delete_id = $_GET['remove_account'];
		$delete_driver = "SELECT * FROM tbl_accounts WHERE account_id = '$delete_id' AND removed = 'No'";
		$run_delete = mysqli_query($con,$delete_driver);
		$row_delete = mysqli_fetch_array($run_delete);
		$d_id = $row_delete['account_id'];
		$d_first_name = $row_delete['first_name'];
		$d_middle_name = $row_delete['middle_name'];
		$d_last_name = $row_delete['last_name'];
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
				<i class="fa fa-users"></i>
				Accounts / Remove Account
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
					Remove Account
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
										<a href="index.php?accounts" class="btn btn-danger form-control">
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
		$update_delete = "UPDATE tbl_accounts SET removed = 'Yes', removed_by = '$creator' , date_removed = now() WHERE account_id = '$d_id'";

		$run_update_delete = mysqli_query($con,$update_delete);

		if($run_update_delete){

			echo "
                <script>
                    alert('Account Has Been Removed')
                </script>
            ";

            echo "
				<script>
					window.open('index.php?accounts','_self')
				</script>
			";

		}else{

			echo "
                <script>
                    alert('Error Removing Account')
                </script>
            ";

		}
	}
?>
<?php
	}
?>