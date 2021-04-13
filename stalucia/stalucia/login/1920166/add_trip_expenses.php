<?php

	    	include("../include/db.php");

									$jScript = md5(rand(1,9));
										$newScript = md5(rand(1,9));
										$getUpdate = md5(rand(1,9));
										$real = md5(rand(1,9));

							$total_price = 0;

	    	$expenses_id = $_POST['expenses'];

	    		$trip_report_id = $_POST['trip_report_id'];
	    		$particular = $_POST['particular'];
	    		$date_created = $_POST['date_created'];

	    		$price = $_POST['price'];

	    		$select_inventory = "SELECT * FROM tbl_trip_report WHERE trip_report_id = '$trip_report_id'";

	    		$run_select = mysqli_query($con,$select_inventory);
				$row_edit = mysqli_fetch_array($run_select);
				$bus_company = $row_edit['bus_company_id'];

				$scan = $_FILES['scan']['name'];

	    		$temp_name = $_FILES['scan']['tmp_name'];
	    		move_uploaded_file($temp_name, "../supporting_files/$scan");

	    		$run_add_inventory = mysqli_query($con,"INSERT INTO tbl_trip_expense (trip_report_id,expenses_id,bus_company_id,particulars,supporting_file,price,date_created) VALUES ('$trip_report_id','$expenses_id','$bus_company','$particular','$scan','$price','$date_created')");

        if($run_add_inventory){

	    			echo "
						<script>
							alert('Trip Expense Added')
						</script>
					";

					echo "
						<script>
							window.location.href='trip_record.php?jScript=$jScript && newScript=$newScript && getUpdate=$getUpdate && trip_record=$trip_report_id && $real';
						</script>
					";

	    		}else{



	    			echo "
						<script>
							alert('Error Addding Expense')
						</script>
					";

					echo "
						<script>
							window.open('trip_record.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && getUpdate=<?php echo $getUpdate; ?> && trip_record=$trip_report_id && <?php echo $real; ?>','_self')
						</script>
					";

	    		}
        
    
   

	    	

	    ?>