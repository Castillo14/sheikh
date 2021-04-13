<?php

	    	include("../include/db.php");

									$jScript = md5(rand(1,9));
										$newScript = md5(rand(1,9));
										$getUpdate = md5(rand(1,9));
										$real = md5(rand(1,9));

							$total_pricee = 0;

	    	$diesel = $_POST['diesel'];
	    	$place = $_POST['place'];

	    		$bus_id = $_POST['buss_id'];
	    		$trip_report_id = $_POST['trip_report_id'];

	    		$price = $_POST['price'];
	    		$liters = $_POST['liters'];
	    		$date_created = $_POST['datee'];

	    		$total_pricee = $price * $liters;


	    		$run_add_diesel = mysqli_query($con,"INSERT INTO tbl_diesel (bus_id,trip_report_id,liters,price,total_price,diesel_from,place,date_created) VALUES ('$bus_id','$trip_report_id','$liters','$price','$total_pricee','$diesel','$place','$date_created')");

        if($run_add_diesel){

	    			echo "
						<script>
							alert('Diesel Added')
						</script>
					";

					echo "
						<script>
							window.location.href='trip_record3.php?jScript=$jScript && newScript=$newScript && getUpdate=$getUpdate && trip_record3=$trip_report_id && $real';
						</script>
					";

	    		}else{



	    			echo "
						<script>
							alert('Error Addding Diesel')
						</script>
					";

					echo "
						<script>
							window.open('trip_record3.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && getUpdate=<?php echo $getUpdate; ?> && trip_record3=$trip_report_id && <?php echo $real; ?>','_self')
						</script>
					";

	    		}
        
    
   

	    	

	    ?>