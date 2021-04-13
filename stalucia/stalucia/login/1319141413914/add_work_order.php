<?php

	    	include("../include/db.php");

									$jScript = md5(rand(1,9));
										$newScript = md5(rand(1,9));
										$getUpdate = md5(rand(1,9));
										$real = md5(rand(1,9));


	    	$summary = $_POST['summary'];
	    	$remarks = $_POST['remarks'];
	    		$bus_id = $_POST['buss_id'];

	    		$date_created = $_POST['datee'];


	    		$run_add_diesel = mysqli_query($con,"INSERT INTO tbl_work_order (bus_id,summary,remarks,date_created) VALUES ('$bus_id','$summary','$remarks','$date_created')");

        if($run_add_diesel){

	    			echo "
						<script>
							alert('Work Order Added')
						</script>
					";

					echo "
						<script>
							window.location.href='bus_maintenance.php?jScript=$jScript && newScript=$newScript && getUpdate=$getUpdate && bus_maintenance=$bus_id && $real';
						</script>
					";

	    		}else{



	    			echo "
						<script>
							alert('Error Addding Work Order')
						</script>
					";

					echo "
						<script>
							window.open('bus_maintenance.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && getUpdate=<?php echo $getUpdate; ?> && bus_maintenance=$bus_id && <?php echo $real; ?>','_self')
						</script>
					";

	    		}
        
    
   

	    	

	    ?>