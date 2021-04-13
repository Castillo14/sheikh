<?php

	    	include("../include/db.php");

	    	$jScript = md5(rand(1,9));
	 $newScript = md5(rand(1,9));
	 $Script = md5(rand(1,9));
	 $getUpdate = md5(rand(1,9));
   	 $getDelete = md5(rand(1,9));
   	 $getAdd = md5(rand(1,9));

	    	$total_price = 0;
	    	$quan = 0;

	    		$check = $_POST['check'];
				
				

	    		$bus_id = $_POST['bus_id'];
				
	    		

						$quantity = $_POST['quantity'];

						$select_invent = mysqli_query($con,"SELECT * FROM tbl_main_inventory WHERE main_inventory_id = '$check'");

						$row_select = mysqli_fetch_array($select_invent);

						$main_inventory_id = $row_select['main_inventory_id'];

						$main_inventory_part_number = $row_select['main_inventory_part_number'];
						$main_inventory_description = $row_select['main_inventory_description'];
						$main_inventory_quantity = $row_select['main_inventory_quantity'];
						$main_inventory_category = $row_select['main_inventory_category'];
						$main_inventory_price = $row_select['main_inventory_price'];
						$main_inventory_supplier = $row_select['main_inventory_supplier'];
						$main_inventory_critical_level = $row_select['main_inventory_critical_level'];

		

		$total_price = $quantity * $main_inventory_price;

		$quan = $main_inventory_quantity - $quantity;

		$update_quant = mysqli_query($con,"UPDATE tbl_main_inventory SET main_inventory_quantity = '$quan' WHERE main_inventory_id = '$check'");
		
					$run_add = mysqli_query($con,"INSERT INTO tbl_bus_maintenance (bus_id,inventory_place,inventory_name,quantity,price,total_price,date_created,supplier,from_) values ('$bus_id','Main Inventory','$main_inventory_description','$quantity','$main_inventory_price','$total_price',now(),'$main_inventory_supplier','Inventory')");	    		

	    		if($run_add && $update_quant){

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