<?php

				if(!isset($_SESSION['account_username'])){

					echo "
						<script>
							window.open('../index.php','_self')
						</script>
					";

				}else{

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

                              $select_category = "SELECT * FROM tbl_supplier";
                              $run_select = mysqli_query($con,$select_category);
                              while($row_select = mysqli_fetch_array($run_select)){
                                  $supplier_id = $row_select['supplier_id'];
                                  $supplier_name = $row_select['supplier_name'];
                              ?>
                              <option name="supply" value="<?php echo $supplier_name ?>">
                                <?php echo $supplier_name ?>
                              </option>
                              <?php
                            }
                              ?>
                            </select>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Part Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="part_number" class="form-control" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Description
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="description" class="form-control" required>
                        </div>
                    </div><!-- form-group Ends -->
                  <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Quantity
                        </label>
                        <div class="col-md-6">
                            <input type="number" name="quantity" class="form-control" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Category
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" name="category">
                              <option name="category" value="Aircon System">
                                Aircon System
                              </option>
                              <option name="category" value="Suspension / Underchasis">
                                Suspension / Underchasis
                              </option>
                              <option name="category" value="Engine System">
                                Engine System
                              </option>
                              <option name="category" value="Electrical System">
                                Electrical System
                              </option>
                              <option name="category" value="Brake System">
                                Brake System
                              </option>
                              <option name="category" value="Lubricants">
                                Lubricants
                              </option>
                              <option name="category" value="Multi-Purpose">
                                Multi-Purpose
                              </option>
                              <option name="category" value="Bus Body Components">
                                Bus Body Components
                              </option>
                              <option name="category" value="Clutch System">
                                Clutch System
                              </option>
                              <option name="category" value="Transmission and Shifting">
                                Transmission and Shifting
                              </option>
                              <option name="category" value="Wheel">
                                Wheel
                              </option>
                              <option name="category" value="Suspension System">
                                Steering System
                              </option>
                              <option name="category" value="Differential">
                                Differential
                              </option>
                              <option name="category" value="Fuel System">
                                Fuel System
                              </option>
                              <option name="category" value="Others">
                                Others
                              </option>
                            </select>
                        </div>
                    </div><!-- form-group Ends -->
                     <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Price
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="price" class="form-control" required>
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
                            Maximum Level
                        </label>
                        <div class="col-md-6">
                            <input type="number" name="maximum_level" class="form-control">
                        </div>
                    </div><!-- form-group Ends -->
                     <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Remarks
                        </label>
                        <div class="col-md-6">
                          <textarea class="form-control" name="remarks"></textarea>
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
                            <a href="index.php?main_inventory" class="btn btn-danger form-control">
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
            $supplier = mysqli_real_escape_string($con,$_POST['supply']);
            $part_number = mysqli_real_escape_string($con,$_POST['part_number']);
            $description = mysqli_real_escape_string($con,$_POST['description']);
            $quantity = mysqli_real_escape_string($con,$_POST['quantity']);
            $category = mysqli_real_escape_string($con,$_POST['category']);
            $price = mysqli_real_escape_string($con,$_POST['price']);
            $critical_level = mysqli_real_escape_string($con,$_POST['critical_level']);
            $maximum_level = mysqli_real_escape_string($con,$_POST['maximum_level']);
            $remarks = mysqli_real_escape_string($con,$_POST['remarks']);
            $insert_inventory = "INSERT INTO tbl_main_inventory (main_inventory_part_number,main_inventory_description,main_inventory_quantity,main_inventory_category,main_inventory_price,main_inventory_supplier,main_inventory_critical_level,main_inventory_maxlevel,main_inventory_remarks) VALUES ('$part_number','$description','$quantity','$category','$price','$supplier','$critical_level','$maximum_level','$remarks')";
            $run_insert_inventory = mysqli_query($con,$insert_inventory);
            $insert_inventoryy = "INSERT INTO tbl_supplier_transaction (supplier_transaction_part_number,supplier_transaction_description,supplier_transaction_quantity,supplier_transaction_price,supplier_transaction_supplier) VALUES ('$part_number','$description','$quantity','$price','$supplier')";
            $run_insert_inventoryy = mysqli_query($con,$insert_inventoryy);

                if($run_insert_inventory && $run_insert_inventoryy){

                    echo "
                        <script>
                            alert('New Inventory Has Been Inserted')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?add_inventory','_self')
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