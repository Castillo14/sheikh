<?php

				if(!isset($_SESSION['account_username'])){

					echo "
						<script>
							window.open('../index.php','_self')
						</script>
					";

				}else{

			?>
            <?php

      if(isset($_GET['add_inventory'])){

        $edit_id = $_GET['add_inventory'];
        $get_bus = "SELECT * FROM tbl_inventory_place WHERE inventory_place_id = '$edit_id' AND removed = 'No'";
        $run_get = mysqli_query($con,$get_bus);
        $row_get = mysqli_fetch_array($run_get);
        $e_id = $row_get['inventory_place_id'];
        $e_name = $row_get['place_name'];
      }

      $jScript = md5(rand(1,9));
       $newScript = md5(rand(1,9));
       $Script = md5(rand(1,9));
       $getUpdate = md5(rand(1,9));
         $getDelete = md5(rand(1,9));
         $getAdd = md5(rand(1,9));

?>
			<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li>
                <i class="fa fa-industry"></i>
                Inventory / Add Inventory
            </li>
        </ol><!-- breadcrumb Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><!-- panel-title Starts -->
                    <i class="fa fa-plus fa-fw"></i>
                    Add Inventory
                </h3><!-- panel-title Ends -->
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Supplier
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" name="supply">
                              <?php

                              $select_category = "SELECT * FROM tbl_supplier WHERE removed = 'No'";
                              $run_select = mysqli_query($con,$select_category);
                              while($row_select = mysqli_fetch_array($run_select)){
                                  $category_id = $row_select['supplier_id'];
                                  $category_name = $row_select['supplier_name'];
                              ?>
                              <option name="supply" value="<?php echo $category_id ?>">
                                <?php echo $category_name ?>
                              </option>
                              <?php
                            }
                              ?>
                            </select>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Product Name
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="product_name" class="form-control" required maxlength="224" minlength="2">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Product Description
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="product_description" class="form-control" maxlength="224" minlength="2">
                        </div>
                    </div><!-- form-group Ends -->
                   <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Product Code
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="product_code" class="form-control" required maxlength="14" minlength="2">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Critical Level
                        </label>
                        <div class="col-md-6">
                            <input type="number" name="critical_level" class="form-control" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Price
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="price" class="form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert Inventory" class="btn btn-primary form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && inventory=<?php echo $e_id; ?> && getInventory=<?php echo $getAdd; ?>" class="btn btn-danger form-control">
                                Cancel
                            </a>
                        </div>
                    </div><!-- form-group Ends -->
                </form><!-- form-horizontal Ends -->
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">

    function isNumericKey(evt){

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;

        return true;
    }

     function isAlphaKey(evt){

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return true;

        return false;
    }

    </script>
<?php
        if(isset($_POST['submit'])){
            $product_name = mysqli_real_escape_string($con,$_POST['product_name']);
            $supply = mysqli_real_escape_string($con,$_POST['supply']);
            $product_code = mysqli_real_escape_string($con,$_POST['product_code']);
            $product_description = mysqli_real_escape_string($con,$_POST['product_description']);
            $critical = mysqli_real_escape_string($con,$_POST['critical_level']);
            $price = mysqli_real_escape_string($con,$_POST['price']);
            $insert_inventory = "INSERT INTO tbl_inventory (inventory_name,supplier_id,inventory_place_id,inventory_code,inventory_description,quantity,critical_level,price,created_by,date_created,removed,removed_by,date_removed) VALUES ('$product_name','$supply','$e_id','$product_code','$product_description','0','$critical','$price','$creator',now(),'No','','0000-00-00')";
            $run_insert_inventory = mysqli_query($con,$insert_inventory);

                if($run_insert_inventory){

                    echo "
                        <script>
                            alert('New Inventory Has Been Inserted')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?jScript=$jScript && newScript=$newScript && inventory=$e_id && getInventory=$getAdd','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Inserting Inventory')
                        </script>
                    ";

                }

        }
    ?>
			<?php
				}
			?>