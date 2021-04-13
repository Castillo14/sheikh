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

	if(isset($_GET['edit_conductor'])){

		$edit_id = $_GET['edit_conductor'];
		$edit_driver = "SELECT * FROM tbl_conductor WHERE conductor_id = '$edit_id' AND removed = 'No'";
		$run_edit = mysqli_query($con,$edit_driver);
		$row_edit = mysqli_fetch_array($run_edit);
		$e_id = $row_edit['conductor_id'];
        $e_first_name = $row_edit['first_name'];
        $e_middle_name = $row_edit['middle_name'];
		$e_last_name = $row_edit['last_name'];
        $e_contact_number = $row_edit['contact_number'];
        $e_email_address = $row_edit['email_address'];
        $e_address = $row_edit['address'];
        $e_image = $row_edit['image'];
		$e_bus_company = $row_edit['bus_company_id'];

        $select_bus_company = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$e_bus_company'";
                                                $run_select_bus_company = mysqli_query($con,$select_bus_company);
                                                $row_bus_company = mysqli_fetch_array($run_select_bus_company);
                                                $bc_id = $row_bus_company['bus_company_id'];
                                                $bc_company_name = $row_bus_company['bus_company_name'];
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
                <i class="fa fa-user"></i>
                Conductors / Edit Conductor
            </li>
        </ol><!-- breadcrumb Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->
<div class="row"><!-- 2 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <div class="panel panel-default"><!-- panel panel-default Starts -->
            <div class="panel-heading"><!-- panel-heading Starts -->
                <h3 class="panel-title"><!-- panel-title Starts -->
                    <i class="fa fa-pencil fa-fw"></i>
                    Edit Conductor
                </h3><!-- panel-title Ends -->
            </div><!-- panel-heading Ends -->
            <div class="panel-body"><!-- panel-body Starts -->
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Bus Company
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" name="bus_company">
                                <option hidden name="bus_company" value="<?php echo $bc_id; ?>">
                                        <?php echo $bc_company_name; ?>
                                    </option>
                                <?php

                                    $get_company = "SELECT * FROM tbl_bus_company WHERE removed = 'No'";

                                    $run_company = mysqli_query($con,$get_company);

                                    while($row_company = mysqli_fetch_array($run_company)){

                                        $bus_company_id = $row_company['bus_company_id'];
                                        $bus_company_name = $row_company['bus_company_name'];
                                        
                                    ?>
                                    <option name="bus_company" value="<?php echo $bus_company_id; ?>">
                                        <?php echo $bus_company_name; ?>
                                    </option>
                                    <?php

                                        }

                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            First Name
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="first_name" class="form-control" required maxlength="74" minlength="2" onkeypress='return isAlphaKey(event)' value="<?php echo $e_first_name; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Middle Name
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="middle_name" class="form-control" maxlength="74" minlength="2" onkeypress='return isAlphaKey(event)' value="<?php echo $e_middle_name; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Last Name
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="last_name" class="form-control" required maxlength="74" minlength="2" onkeypress='return isAlphaKey(event)' value="<?php echo $e_last_name; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Email Address
                        </label>
                        <div class="col-md-6">
                            <input type="email" name="email_address" class="form-control" maxlength="224" minlength="5" value="<?php echo $e_email_address; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Contact Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="contact_number" class="form-control" required onkeypress='return isNumericKey(event)' maxlength="15" minlength="5" value="<?php echo $e_contact_number; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->

                        <label class="col-md-3 control-label">

                            Address

                        </label>

                        <div class="col-md-6">

                            <textarea class="form-control" rows="4" required name="address" maxlength="224" minlength="5"><?php echo $e_address; ?></textarea>

                        </div>

                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Image
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control" >
                            <img src="../driver_conductor_images/<?php echo $e_image; ?>" width="70" height="70">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="update" value="Update Driver" class="btn btn-primary form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && conductors=<?php echo $e_bus_company; ?> && getConductor=<?php echo $getAdd; ?>" class="btn btn-danger form-control">
                                Cancel
                            </a>
                        </div>
                    </div><!-- form-group Ends -->
                </form><!-- form-horizontal Ends -->
            </div><!-- panel-body Ends -->
        </div><!-- panel panel-default Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 2 row Ends -->
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
    	if(isset($_POST['update'])){

                $first_name = mysqli_real_escape_string($con,$_POST['first_name']);
                $middle_name = mysqli_real_escape_string($con,$_POST['middle_name']);
    			$last_name = mysqli_real_escape_string($con,$_POST['last_name']);
            $email_address = mysqli_real_escape_string($con,$_POST['email_address']);
            $contact_number = mysqli_real_escape_string($con,$_POST['contact_number']);
            $address = mysqli_real_escape_string($con,$_POST['address']);
            $bus_company = mysqli_real_escape_string($con,$_POST['bus_company']);
            $image = $_FILES['image']['name'];
            $temp_image = $_FILES['image']['tmp_name'];
            move_uploaded_file($temp_image, "../driver_conductor_images/$image");

                $update_driver = "UPDATE tbl_conductor SET bus_company_id = '$bus_company', first_name = '$first_name', middle_name = '$middle_name', last_name = '$last_name', email_address = '$email_address', contact_number = '$contact_number', address = '$address', image = '$image' WHERE conductor_id = '$e_id'";
            $run_update_driver = mysqli_query($con,$update_driver);

                if($run_update_driver){

                    echo "
                        <script>
                            alert('Conductor Has Been Updated')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?jScript=$jScript && newScript=$newScript && conductors=$bus_company && getConductor=$getAdd','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Updating Conductor')
                        </script>
                    ";

                }

            }
        
    	
    ?>
<?php
	}
?>