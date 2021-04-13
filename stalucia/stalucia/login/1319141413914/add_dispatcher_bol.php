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

      if(isset($_GET['add_dispatcher_bol'])){

        $edit_id = $_GET['add_dispatcher_bol'];
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
                <i class="fa fa-money"></i>
                Dispatcher BOL / Add <?php echo $e_name; ?> Dispatcher BOL
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
                    Add <?php echo $e_name; ?> Dispatcher BOL
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
                            BOL Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="bol_number" class="form-control" >
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Amount
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="amount" class="form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert Dispatcher BOL" class="btn btn-primary form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && dispatcher_bol=<?php echo $edit_id; ?> && getBusses=<?php echo $getAdd; ?>" class="btn btn-danger form-control">
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

            $comp = 0;
            $ipon = 0;
            $crew = 0;
            $dispatcher = 0;
            $amount = 0;

            $date = mysqli_real_escape_string($con,$_POST['date_created']);
            $bol_number = mysqli_real_escape_string($con,$_POST['bol_number']);
            $amount = mysqli_real_escape_string($con,$_POST['amount']);

            $comp = $amount * .60;
            $ipon = $amount * .10;
            $crew = $amount * .25;
            $dispatcher = $amount * .05;

            $insert_bus = "INSERT INTO tbl_bol (bol_number,bus_company_id,bol_amount,comp,ipon,crew,dispatcher,date_created,created_by,removed,removed_by,date_removed) VALUES ('$bol_number','$e_id','$amount','$comp','$ipon','$crew','$dispatcher','$date','$creator','No','','0000-00-00')";
            $run_insert_bus = mysqli_query($con,$insert_bus);


                if($run_insert_bus){

                    echo "
                        <script>
                            alert('New Dispatcher BOL Has Been Inserted')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?jScript=$jScript && newScript=$newScript && dispatcher_bol=$edit_id && getBusses=$getAdd','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Inserting Dispatcher BOL')
                        </script>
                    ";

                }

        }
    ?>
			<?php
				}
			?>