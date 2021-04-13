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
	    	$quan2 = 0;

	    		$check = $_POST['check'];
	    		

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
						$main_inventory_maximum_level = $row_select['main_inventory_maxlevel'];
						$main_inventory_remarks = $row_select['main_inventory_remarks'];

						$get_item = "SELECT * FROM tbl_malabon_inventory WHERE malabon_inventory_part_number='$main_inventory_part_number' AND malabon_inventory_description='$main_inventory_description' AND malabon_inventory_category = '$main_inventory_category' AND malabon_inventory_supplier = '$main_inventory_supplier'";


		$run_item = mysqli_query($con,$get_item);

		$count = mysqli_num_rows($run_item);

		$row_item = mysqli_fetch_array($run_item);

		$aydi = $row_item['malabon_inventory_id'];
		$kwantity = $row_item['malabon_inventory_quantity'];

		if($count > 0){

			$quan = $main_inventory_quantity - $quantity;

			$quan2 = $kwantity + $quantity;

			$update_quant = mysqli_query($con,"UPDATE tbl_malabon_inventory SET malabon_inventory_quantity = '$quan2' WHERE malabon_inventory_id = '$aydi'");

			$update_main = mysqli_query($con,"UPDATE tbl_main_inventory SET main_inventory_quantity = '$quan' WHERE main_inventory_id = '$main_inventory_id'");


			if($update_quant && $update_main){

	    			echo "
						<script>
							alert('Added')
						</script>
					";

					echo "
						 <script>
                            window.open('index.php?malabon_inventory','_self')
                        </script>
					";

	    		}else{
	    			echo "
						<script>
							alert('wrong')
						</script>
					";
	    		}


		}else{

			$quan = $main_inventory_quantity - $quantity;

			$add_quant = mysqli_query($con,"INSERT INTO tbl_malabon_inventory (malabon_inventory_part_number,malabon_inventory_description,malabon_inventory_quantity,malabon_inventory_category,malabon_inventory_price,malabon_inventory_supplier,malabon_inventory_critical_level,malabon_inventory_maxlevel,malabon_inventory_remarks) VALUES ('$main_inventory_part_number','$main_inventory_description','$quantity','$main_inventory_category','$main_inventory_price','$main_inventory_supplier','$main_inventory_critical_level','$main_inventory_maximum_level','$main_inventory_remarks')");


			$update_mainn = mysqli_query($con,"UPDATE tbl_main_inventory SET main_inventory_quantity = '$quan' WHERE main_inventory_id = '$main_inventory_id'");


			if($add_quant && $update_mainn){

	    			echo "
						<script>
							alert('Added')
						</script>
					";

					echo "
						 <script>
                            window.open('index.php?malabon_inventory','_self')
                        </script>
					";

	    		}
	    		else{
	    			echo "
						<script>
							alert('wrong2')
						</script>
					";
	    		}


		}



	

	    ?>