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

	if(isset($_GET['edit_bus_company'])){

		$edit_id = $_GET['edit_bus_company'];
		$edit_bus = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$edit_id' AND removed = 'No'";
		$run_edit = mysqli_query($con,$edit_bus);
		$row_edit = mysqli_fetch_array($run_edit);
		$e_id = $row_edit['bus_company_id'];
		$e_bus_name = $row_edit['bus_company_name'];
	}

?>
<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li>
                <i class="fa fa-bus"></i>
                Bus Company / Edit Bus Company
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
                    Edit Bus Company
                </h3><!-- panel-title Ends -->
            </div><!-- panel-heading Ends -->
            <div class="panel-body"><!-- panel-body Starts -->
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Bus Company Name
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="bus_company_name" class="form-control" required value="<?php echo $e_bus_name; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Update Bus Company" class="btn btn-primary form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <a href="index.php?bus_company" class="btn btn-danger form-control">
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
    	if(isset($_POST['submit'])){

    		$bus_company_name = mysqli_real_escape_string($con,$_POST['bus_company_name']);
                $update_bus = "UPDATE tbl_bus_company SET bus_company_name = '$bus_company_name' WHERE bus_company_id = '$e_id'";
            $run_update_bus = mysqli_query($con,$update_bus);

                if($run_update_bus){

                    echo "
                        <script>
                            alert('Bus Company Has Been Updated')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?bus_company','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Updating Bus Company')
                        </script>
                    ";

                }

            }
        
    	
    ?>
<?php
	}
?>