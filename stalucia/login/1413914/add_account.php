
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
                <i class="fa fa-users"></i>
                Accounts / Add Account
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
                    Add Account
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
                            Job
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" name="job">
                                <option name="job" value="Staff">
                                    Staff
                                </option>
                                <option name="job" value="Administrator">
                                    Administrator
                                </option>
                            </select>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Username
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="username" class="form-control" required maxlength="15" minlength="5">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Password
                        </label>
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control" required maxlength="15" minlength="5">
                        </div>
                    </div><!-- form-group Ends -->
                    
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert Account" class="btn btn-primary form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <a href="index.php?accounts" class="btn btn-danger form-control">
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
                $username = mysqli_real_escape_string($con,$_POST['username']);
                $password = mysqli_real_escape_string($con,$_POST['password']);
                $job = mysqli_real_escape_string($con,$_POST['job']);
                $image = $_FILES['image']['name'];
                $temp_image = $_FILES['image']['tmp_name'];
                move_uploaded_file($temp_image, "../account_images/$image");
            $insert_bus = "INSERT INTO tbl_accounts (first_name,middle_name,last_name,email_address,contact_number,account_username,account_password,address,job,image,created_by,date_created,removed,removed_by,date_removed) VALUES ('$first_name','$middle_name','$last_name','$email_address','$contact_number','$username','$password','$address','$job','$image','$creator',now(),'No','','0000-00-00')";
            $run_insert_bus = mysqli_query($con,$insert_bus);


                if($run_insert_bus){

                    echo "
                        <script>
                            alert('New Account Has Been Inserted')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?accounts','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Inserting Account')
                        </script>
                    ";

                }

        }
    ?>
			<?php
				}
			?>