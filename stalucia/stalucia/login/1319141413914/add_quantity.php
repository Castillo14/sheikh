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

                if(isset($_GET['add_quantity'])){

                    $edit_id = $_GET['add_quantity'];
                    $edit_bus = "SELECT * FROM tbl_main_inventory WHERE main_inventory_id = '$edit_id'";
                    $run_edit = mysqli_query($con,$edit_bus);
                    $row_edit = mysqli_fetch_array($run_edit);
                    $e_id = $row_edit['main_inventory_id'];
                    $e_part_number = $row_edit['main_inventory_part_number'];
                    $e_description = $row_edit['main_inventory_description'];
                    $e_category = $row_edit['main_inventory_category'];
                    $e_price = $row_edit['main_inventory_price'];
                    $e_supplier = $row_edit['main_inventory_supplier'];
                    $e_critical_level = $row_edit['main_inventory_critical_level'];
                    $e_quantity = $row_edit['main_inventory_quantity'];
                }

            ?>
			<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li>
                <i class="fa fa-industry"></i>
                Inventory / Add Quantity
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
                    Add Quantity
                </h3><!-- panel-title Ends -->
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Supplier
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="" disabled class="form-control"  value="<?php echo $e_supplier ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Part Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="" class="form-control" disabled  value="<?php echo $e_part_number ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Description
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="" class="form-control" disabled value="<?php echo $e_description ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Category
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="" disabled class="form-control"  value="<?php echo $e_category ?>">
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
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Add Quantity" class="btn btn-primary form-control">
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
           
            $quantity = mysqli_real_escape_string($con,$_POST['quantity']);

            $quantity_total = $e_quantity + $quantity;
            

            $insert_inventory = "UPDATE tbl_main_inventory SET main_inventory_quantity = '$quantity_total' WHERE main_inventory_id = '$edit_id'";
            $run_insert_inventory = mysqli_query($con,$insert_inventory);

             $insert_inventoryy = "INSERT INTO tbl_supplier_transaction (supplier_transaction_part_number,supplier_transaction_description,supplier_transaction_quantity,supplier_transaction_price,supplier_transaction_supplier) VALUES ('$e_part_number','$e_description','$quantity','$e_price','$e_supplier')";
            $run_insert_inventoryy = mysqli_query($con,$insert_inventoryy);

                if($run_insert_inventory && $run_insert_inventoryy){

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