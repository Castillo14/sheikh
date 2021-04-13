<?php

	    	include("../include/db.php");


$jScript = md5(rand(1,9));
										$newScript = md5(rand(1,9));
										$getUpdate = md5(rand(1,9));
										$real = md5(rand(1,9));

	    		$trip = $_POST['trip'];

	    		$expense = $_POST['expense'];

	    		$delete_docu = "DELETE FROM tbl_trip_expense WHERE trip_expense_id = '$expense'";

	    		$run_delete = mysqli_query($con,$delete_docu);

	    		if($run_delete){

	    			echo "
						<script>
							alert('Removed')
						</script>
					";

					echo "
						<script>
							window.location.href='trip_record2.php?jScript=$jScript && newScript=$newScript && getUpdate=$getUpdate && trip_record2=$trip && $real';
						</script>
					";

	    		}

	    	

	    ?>