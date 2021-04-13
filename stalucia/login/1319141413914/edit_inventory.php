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

  if(isset($_GET['edit_inventory'])){

    $edit_id = $_GET['edit_inventory'];
    $edit_accnt = "SELECT * FROM tbl_main_inventory WHERE main_inventory_id = '$edit_id'";
    $run_edit = mysqli_query($con,$edit_accnt);
    $row_edit = mysqli_fetch_array($run_edit);

   $e_id = $row_edit['main_inventory_id'];
  $part_no = $row_edit['main_inventory_part_number'];
  $description = $row_edit['main_inventory_description'];
  $quantity = $row_edit['main_inventory_quantity'];
  $category = $row_edit['main_inventory_category'];
  $price = $row_edit['main_inventory_price'];
  $supplier = $row_edit['main_inventory_supplier'];
  $critical_level = $row_edit['main_inventory_critical_level'];
  $maximum_level = $row_edit['main_inventory_maxlevel'];
  $remarks = $row_edit['main_inventory_remarks'];
  }

?>
            
			<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li>
                <i class="fa fa-industry"></i>
                Inventory / Edit Inventory
            </li>
        </ol><!-- breadcrumb Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><!-- panel-title Starts -->
                    <i class="fa fa-pencil fa-fw"></i>
                    Edit Inventory
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
                              <option name="supply" hidden value="<?php echo $supplier; ?>">
                                    <?php echo $supplier; ?>
                                </option>
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
                            <input type="text" name="part_number" class="form-control" required value="<?php echo $part_no; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Description
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="description" class="form-control" required value="<?php echo $description; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                  <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Quantity
                        </label>
                        <div class="col-md-6">
                            <input type="number" name="quantity" class="form-control" required value="<?php echo $quantity; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Category
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" name="category">
                              <option name="category" hidden value="<?php echo $category; ?>">
                                    <?php echo $category; ?>
                                </option>
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
                            <input type="text" name="price" class="form-control" required value="<?php echo $price; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Critical Level
                        </label>
                        <div class="col-md-6">
                            <input type="number" name="critical_level" class="form-control" required value="<?php echo $critical_level; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                     <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Maximum Level
                        </label>
                        <div class="col-md-6">
                            <input type="number" name="maximum_level" class="form-control" value="<?php echo $maximum_level; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                     <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Remarks
                        </label>
                        <div class="col-md-6">
                          <textarea class="form-control" name="remarks"><?php echo $remarks; ?></textarea>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Update Inventory" class="btn btn-primary form-control">
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
            $insert_inventory = "UPDATE tbl_main_inventory SET main_inventory_part_number = '$part_number',main_inventory_description = '$description',main_inventory_quantity = '$quantity',main_inventory_category = '$category',main_inventory_price = '$price',main_inventory_supplier = '$supplier',main_inventory_critical_level = '$critical_level',main_inventory_maxlevel = '$maximum_level',main_inventory_remarks = '$remarks' WHERE main_inventory_id = '$e_id'";
            $run_insert_inventory = mysqli_query($con,$insert_inventory);

                if($run_insert_inventory){

                    echo "
                        <script>
                            alert('Inventory Has Been Updated')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?main_inventory','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Updating Inventory')
                        </script>
                    ";

                }

        }
    ?>
			<?php
				}
			?>