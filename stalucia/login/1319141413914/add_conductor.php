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

      if(isset($_GET['add_conductor'])){

        $edit_id = $_GET['add_conductor'];
        $get_bus = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$edit_id' AND removed = 'No'";
        $run_get = mysqli_query($con,$get_bus);
        $run_get = mysqli_fetch_array($run_get);
        $e_id = $run_get['bus_company_id'];
        $e_name = $run_get['bus_company_name'];
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
                Conductors / Add Conductor
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
                    Add Conductor
                </h3><!-- panel-title Ends -->
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            First Name
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="first_name" class="form-control" required maxlength="74" minlength="2" onkeypress='return isAlphaKey(event)'>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Middle Name
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="middle_name" class="form-control" maxlength="74" minlength="2" onkeypress='return isAlphaKey(event)'>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Last Name
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="last_name" class="form-control" required maxlength="74" minlength="2" onkeypress='return isAlphaKey(event)'>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Email Address
                        </label>
                        <div class="col-md-6">
                            <input type="email" name="email_address" class="form-control" maxlength="224" minlength="5">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Contact Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="contact_number" class="form-control" required onkeypress='return isNumericKey(event)' maxlength="15" minlength="5">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->

                        <label class="col-md-3 control-label">

                            Address

                        </label>

                        <div class="col-md-6">

                            <textarea class="form-control" rows="4" required name="address" maxlength="224" minlength="5"></textarea>

                        </div>

                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Image
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control" >
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert Conductor" class="btn btn-primary form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && conductors=<?php echo $edit_id; ?> && getConductor=<?php echo $getAdd; ?>" class="btn btn-danger form-control">
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
            $first_name = mysqli_real_escape_string($con,$_POST['first_name']);
            $middle_name = mysqli_real_escape_string($con,$_POST['middle_name']);
            $last_name = mysqli_real_escape_string($con,$_POST['last_name']);
            $email_address = mysqli_real_escape_string($con,$_POST['email_address']);
            $contact_number = mysqli_real_escape_string($con,$_POST['contact_number']);
            $address = mysqli_real_escape_string($con,$_POST['address']);
            $image = $_FILES['image']['name'];
            $temp_image = $_FILES['image']['tmp_name'];
            move_uploaded_file($temp_image, "../driver_conductor_images/$image");
            $insert_driver = "INSERT INTO tbl_conductor (bus_company_id,first_name,middle_name,last_name,email_address,contact_number,address,image,created_by,date_created,removed,removed_by,date_removed) VALUES ('$e_id','$first_name','$middle_name','$last_name','$email_address','$contact_number','$address','$image','$creator',now(),'No','','0000-00-00')";
            $run_insert_driver = mysqli_query($con,$insert_driver);

                if($run_insert_driver){

                    echo "
                        <script>
                            alert('New Conductor Has Been Inserted')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?jScript=$jScript && newScript=$newScript && conductors=$edit_id && getConductor=$getAdd','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Inserting Conductor')
                        </script>
                    ";

                }

        }
    ?>
<?php
        }
      ?>