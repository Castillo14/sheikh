<?php

	    	include("../include/db.php");

	    	$jScript = md5(rand(1,9));
	 $newScript = md5(rand(1,9));
	 $Script = md5(rand(1,9));
	 $getUpdate = md5(rand(1,9));
   	 $getDelete = md5(rand(1,9));
   	 $getAdd = md5(rand(1,9));

	    	$total_price = 0;
	    	

	    		$item_name = $_POST['item_name'];
	    		$desc = $_POST['desc'];
	    		$price = $_POST['price'];
	    		$buy_from = $_POST['buy_from'];
				
				

	    		$bus_id = $_POST['bus_id'];
				
	    		

						$quantity = $_POST['quantity'];


		$total_price = $quantity * $price;
		
					$run_add = mysqli_query($con,"INSERT INTO tbl_bus_maintenance (bus_id,inventory_place,inventory_name,inventory_description,quantity,price,total_price,date_created,supplier,from_) values ('$bus_id','$buy_from','$item_name','$desc','$quantity','$price','$total_price',now(),'','Outside')");	    		

	    		if($run_add){

	    			echo "
						<script>
							alert('Added')
						</script>
					";

					echo "
						<script>
							window.location.href='bus_maintenance.php?jScript=$jScript && newScript=$newScript && bus_maintenance=$bus_id && getUpdate=$getUpdate';
						</script>
					";

	    		}

	    ?>