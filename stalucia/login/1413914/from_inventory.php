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

						$select_invent = mysqli_query($con,"SELECT * FROM tbl_inventory WHERE inventory_id = '$check'");

						$row_select = mysqli_fetch_array($select_invent);
		$e_place = $row_select['inventory_place_id'];
		$e_sup = $row_select['supplier_id'];
		$e_name = $row_select['inventory_name'];
		$e_desc = $row_select['inventory_description'];
		$e_price = $row_select['price'];
		$e_quan = $row_select['quantity'];

		$select_place = mysqli_query($con,"SELECT * FROM tbl_inventory_place WHERE inventory_place_id = '$e_place'");
		$row_select2 = mysqli_fetch_array($select_place);
		$e_place_name = $row_select2['place_name'];

		$select_sup = mysqli_query($con,"SELECT * FROM tbl_supplier WHERE supplier_id = '$e_sup'");
		$row_sup = mysqli_fetch_array($select_sup);
		$e_sup_name = $row_sup['supplier_name'];

		$total_price = $quantity * $e_price;

		$quan = $e_quan - $quantity;

		$update_quant = mysqli_query($con,"UPDATE tbl_inventory SET quantity = '$quan' WHERE inventory_id = '$check'");
		
					$run_add = mysqli_query($con,"INSERT INTO tbl_bus_maintenance (bus_id,inventory_place,inventory_name,inventory_description,quantity,price,total_price,date_created,supplier,from_) values ('$bus_id','$e_place_name','$e_name','$e_desc','$quantity','$e_price','$total_price',now(),'$e_sup_name','Inventory')");	    		

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