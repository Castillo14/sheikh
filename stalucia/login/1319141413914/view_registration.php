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

	if(isset($_GET['view_registration'])){

		$edit_id = $_GET['view_registration'];
		$edit_bus = "SELECT * FROM tbl_registration WHERE registration_id = '$edit_id'";
		$run_edit = mysqli_query($con,$edit_bus);
		$row_edit = mysqli_fetch_array($run_edit);
		$e_id = $row_edit['registration_id'];
         $f_name = $row_edit['first_name'];
        $m_name = $row_edit['middle_name'];
        $l_name = $row_edit['last_name'];
        $name_title = $row_edit['name_title'];
        $date_send = $row_edit['date_send'];
        $confirmed = $row_edit['confirmed'];
        $gender = $row_edit['gender'];
        $scfhs = $row_edit['scfhs'];
        $profession = $row_edit['profession'];
        $institution = $row_edit['institution'];
        $telephone = $row_edit['telephone'];
        $mailing = $row_edit['mailing'];
        $postal = $row_edit['postal'];
        $email_add = $row_edit['email_add'];
        $mobile = $row_edit['mobile'];
        $transfer = $row_edit['transfer'];
        $full = $name_title . " " . ucfirst($f_name) . " " . ucfirst($m_name) . " " . ucfirst($l_name);
	}

?>
<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li>
                <i class="fa fa-users"></i>
                Registration Details
            </li>
        </ol><!-- breadcrumb Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->
<div class="row"><!-- 2 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <div class="panel panel-default"><!-- panel panel-default Starts -->
            <div class="panel-heading"><!-- panel-heading Starts -->
                <h3 class="panel-title"><!-- panel-title Starts -->
                    <i class="fa fa-users fa-fw"></i>
                    Registration Details
                </h3><!-- panel-title Ends -->
            </div><!-- panel-heading Ends -->
            <div class="panel-body"><!-- panel-body Starts -->
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Name
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="fullname" class="form-control" disabled value="<?php echo $full; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Gender
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="gender" class="form-control" disabled value="<?php echo $gender; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Saudi Commission for Health Specialties (SCFHS) License No.
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="scfhs" class="form-control" disabled value="<?php echo $scfhs; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                     <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Profession
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="profession" class="form-control" disabled value="<?php echo $profession; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                      <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Institution
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="institution" class="form-control" disabled value="<?php echo $institution; ?>">
                        </div>
                    </div><!-- form-group Ends -->

                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Telephone
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="telephone" class="form-control" disabled value="<?php echo $telephone; ?>">
                        </div>
                    </div><!-- form-group Ends -->

                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Mailing Address
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="mailing" class="form-control" disabled value="<?php echo $mailing; ?>">
                        </div>
                    </div><!-- form-group Ends -->

                       <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            City/Postal Code
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="postal" class="form-control" disabled value="<?php echo $postal; ?>">
                        </div>
                    </div><!-- form-group Ends -->


                       <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Email Address
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="email_add" class="form-control" disabled value="<?php echo $email_add; ?>">
                        </div>
                    </div><!-- form-group Ends -->


                       <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                                Mobile
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="mobile" class="form-control" disabled value="<?php echo $mobile; ?>">
                        </div>
                    </div><!-- form-group Ends -->


                       <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                                Confirmation Status
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="confirm" class="form-control" disabled value="<?php echo $confirmed; ?>">
                        </div>
                    </div><!-- form-group Ends -->

                       <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Copy of Transfer or Bank Receipt
                        </label>
                        <div class="col-md-6">
                           <a download="<?php echo $transfer; ?>" href="../../registration/<?php echo $transfer; ?>"><?php echo $transfer; ?></a>
                        </div>
                    </div><!-- form-group Ends -->

                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Confirm Registration" class="btn btn-primary form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <a href="index.php?registered" class="btn btn-danger form-control">
                                Close
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
    	if(isset($_POST['submit'])){

                $update_ = "UPDATE tbl_registration SET confirmed = 'Confirmed' WHERE registration_id = '$e_id'";
            $run_update_ = mysqli_query($con,$update_);

                if($run_update_){

                    echo "
                        <script>
                            alert('Registration Has Been Confirmed')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?registered','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Confirming Registration')
                        </script>
                    ";

                }

            }
        
    	
    ?>
<?php
	}
?>