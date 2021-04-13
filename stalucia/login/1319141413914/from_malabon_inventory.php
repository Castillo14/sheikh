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

						$select_invent = mysqli_query($con,"SELECT * FROM tbl_malabon_inventory WHERE malabon_inventory_id = '$check'");

						$row_select = mysqli_fetch_array($select_invent);

						$malabon_inventory_id = $row_select['malabon_inventory_id'];

						$malabon_inventory_part_number = $row_select['malabon_inventory_part_number'];
						$malabon_inventory_description = $row_select['malabon_inventory_description'];
						$malabon_inventory_quantity = $row_select['malabon_inventory_quantity'];
						$malabon_inventory_category = $row_select['malabon_inventory_category'];
						$malabon_inventory_price = $row_select['malabon_inventory_price'];
						$malabon_inventory_supplier = $row_select['malabon_inventory_supplier'];
						$malabon_inventory_critical_level = $row_select['malabon_inventory_critical_level'];

		

		$total_price = $quantity * $malabon_inventory_price;

		$quan = $malabon_inventory_quantity - $quantity;

		$update_quant = mysqli_query($con,"UPDATE tbl_malabon_inventory SET malabon_inventory_quantity = '$quan' WHERE malabon_inventory_id = '$check'");
		
					$run_add = mysqli_query($con,"INSERT INTO tbl_bus_maintenance (bus_id,inventory_place,inventory_name,quantity,price,total_price,date_created,supplier,from_) values ('$bus_id','Malabon Inventory','$malabon_inventory_description','$quantity','$malabon_inventory_price','$total_price',now(),'$malabon_inventory_supplier','Inventory')");	    		

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