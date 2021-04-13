<?php

	    	include("../include/db.php");


$jScript = md5(rand(1,9));
										$newScript = md5(rand(1,9));
										$getUpdate = md5(rand(1,9));
										$real = md5(rand(1,9));

	    		$trip = $_POST['trip'];
	    		$tripr = $_POST['tripr'];

	    		$delete_docu = "DELETE FROM tbl_info WHERE info_id = '$trip'";

	    		$run_delete = mysqli_query($con,$delete_docu);

	    		if($run_delete){

	    			echo "
						<script>
							alert('Removed')
						</script>
					";

					echo "
						<script>
							window.location.href='trip_record3.php?jScript=$jScript && newScript=$newScript && getUpdate=$getUpdate && trip_record3=$tripr && $real';
						</script>
					";

	    		}

	    	

	    ?>