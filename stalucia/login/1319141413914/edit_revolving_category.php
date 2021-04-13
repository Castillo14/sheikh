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

	if(isset($_GET['edit_revolving_category'])){

		$edit_id = $_GET['edit_revolving_category'];
		$edit_bus = "SELECT * FROM tbl_revolving_category WHERE revolving_category_id = '$edit_id' AND removed = 'No'";
		$run_edit = mysqli_query($con,$edit_bus);
		$row_edit = mysqli_fetch_array($run_edit);
		$e_id = $row_edit['revolving_category_id'];
		$e_category_name = $row_edit['category_name'];
	}

?>
<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li>
                <i class="fa fa-industry"></i>
                Category List / Edit Category
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
                    Edit Revolving Category
                </h3><!-- panel-title Ends -->
            </div><!-- panel-heading Ends -->
            <div class="panel-body"><!-- panel-body Starts -->
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Category Name
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="category_name" class="form-control" required value="<?php echo $e_category_name; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Update Category" class="btn btn-primary form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <a href="index.php?add_edit_revolving_category" class="btn btn-danger form-control">
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

    		$category_name = mysqli_real_escape_string($con,$_POST['category_name']);
                $update_bus = "UPDATE tbl_revolving_category SET category_name = '$category_name' WHERE revolving_category_id = '$e_id'";
            $run_update_bus = mysqli_query($con,$update_bus);

                if($run_update_bus){

                    echo "
                        <script>
                            alert('Revolving Category Has Been Updated')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?add_edit_revolving_category','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Updating Revolving Category')
                        </script>
                    ";

                }

            }
        
    	
    ?>
<?php
	}
?>