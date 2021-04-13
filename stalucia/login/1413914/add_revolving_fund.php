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

      if(isset($_GET['add_revolving_fund'])){

        $edit_id = $_GET['add_revolving_fund'];
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
                <i class="fa fa-bus"></i>
                Revolving Fund / Add <?php echo $e_name; ?> Revolving Fund
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
                    Add <?php echo $e_name; ?> Revolving Fund
                </h3><!-- panel-title Ends -->
            </div>
            <div class="panel-body">
                <form class="form-horizontal" autocomplete="off" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Date
                        </label>
                        <div class="col-md-6">
                            <input type="date" name="date_created" class="form-control" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Category
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" name="category">
                              <?php

                              $select_category = "SELECT * FROM tbl_revolving_category WHERE removed = 'No'";
                              $run_select = mysqli_query($con,$select_category);
                              while($row_select = mysqli_fetch_array($run_select)){
                                  $category_id = $row_select['revolving_category_id'];
                                  $category_name = $row_select['category_name'];
                              ?>
                              <option name="category" value="<?php echo $category_id ?>">
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
                            Payee To
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="payee_to" class="form-control" >
                        </div>
                    </div><!-- form-group Ends --><div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Purchases
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="purchases" class="form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Amount
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="amount" class="form-control" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Scanned File
                        </label>
                        <div class="col-md-6">
                            <input type="file" name="scan" class="form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert Revolving Fund" class="btn btn-primary form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && revolving_fund=<?php echo $edit_id; ?> && getBusses=<?php echo $getAdd; ?>" class="btn btn-danger form-control">
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

          $slect = "SELECT * FROM tbl_revolving_fund";
          $runslsct = mysqli_query($con,$slect);
          $count_total = mysqli_num_rows($runslsct);
          $count_total = $count_total + 1;

          $pcv_no = "PCV-" . $count_total;


            $date = mysqli_real_escape_string($con,$_POST['date_created']);
            $category = mysqli_real_escape_string($con,$_POST['category']);
            $payee_to = mysqli_real_escape_string($con,$_POST['payee_to']);
            $purchases = mysqli_real_escape_string($con,$_POST['purchases']);
            $amount = mysqli_real_escape_string($con,$_POST['amount']);
            $scan = $_FILES['scan']['name'];

                $temp_name = $_FILES['scan']['tmp_name'];
                move_uploaded_file($temp_name, "../revolving_files/$scan");

            $insert_bus = "INSERT INTO tbl_revolving_fund (bus_company_id,revolving_category_id,pcv_no,payee_to,purchases,amount,scanned_file,date_created,created_by) VALUES ('$e_id','$category','$pcv_no','$payee_to','$purchases','$amount','$scan','$date','$creator')";
            $run_insert_bus = mysqli_query($con,$insert_bus);


                if($run_insert_bus){

                    echo "
                        <script>
                            alert('New Revolving Fund Has Been Inserted')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?jScript=$jScript && newScript=$newScript && revolving_fund=$edit_id && getBusses=$getAdd','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Inserting Revolving Fund')
                        </script>
                    ";

                }

        }
    ?>
			<?php
				}
			?>