<?php

	    	include("../include/db.php");

									$jScript = md5(rand(1,9));
										$newScript = md5(rand(1,9));
										$getUpdate = md5(rand(1,9));
										$real = md5(rand(1,9));


	    		$bus_id = $_POST['buss_id'];
	    		$trip_report_id = $_POST['trip_report_id'];

	    		$note = $_POST['note'];
	    		$date_created = $_POST['datee'];


	    		$run_add_diesel = mysqli_query($con,"INSERT INTO tbl_info (bus_id,trip_report_id,notes,date_created) VALUES ('$bus_id','$trip_report_id','$note','$date_created')");

        if($run_add_diesel){

	    			echo "
						<script>
							alert('Note Added')
						</script>
					";

					echo "
						<script>
							window.location.href='trip_record2.php?jScript=$jScript && newScript=$newScript && getUpdate=$getUpdate && trip_record2=$trip_report_id && $real';
						</script>
					";

	    		}else{



	    			echo "
						<script>
							alert('Error Addding Note')
						</script>
					";

					echo "
						<script>
							window.open('trip_record2.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && getUpdate=<?php echo $getUpdate; ?> && trip_record2=$trip_report_id && <?php echo $real; ?>','_self')
						</script>
					";

	    		}
        
    
   

	    	

	    ?>