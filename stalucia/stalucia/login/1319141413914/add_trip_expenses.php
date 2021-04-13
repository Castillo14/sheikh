<?php

	    	include("../include/db.php");

									$jScript = md5(rand(1,9));
										$newScript = md5(rand(1,9));
										$getUpdate = md5(rand(1,9));
										$real = md5(rand(1,9));

							$total_price = 0;

	    	$expense = $_POST['expenses'];

	    		$trip_report_id = $_POST['trip_report_id'];
	    		

	    		$price = $_POST['price'];

	    	
				$run_add_inventory = mysqli_query($con,"UPDATE tbl_trip_report SET $expense = '$price' WHERE trip_report_id = '$trip_report_id'");

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