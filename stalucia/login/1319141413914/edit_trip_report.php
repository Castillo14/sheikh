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

	if(isset($_GET['edit_trip_report'])){

		$edit_id = $_GET['edit_trip_report'];
		$edit_trip = "SELECT * FROM tbl_trip_report WHERE trip_report_id = '$edit_id'";

                    $run_edit = mysqli_query($con,$edit_trip);

                    $row_edit = mysqli_fetch_assoc($run_edit);

                    $e_id = $row_edit['trip_report_id'];
                    $buss_id = $row_edit['bus_id'];
                    $bus_company_id = $row_edit['bus_company_id'];
                    $driverr_id = $row_edit['driver_id'];
                    $conductorr_id = $row_edit['conductor_id'];
                    $depart_from = $row_edit['depart_from'];
                    $time_depart = $row_edit['time_depart'];
                    $arrive_to = $row_edit['arrive_to'];
                    $time_arrive = $row_edit['time_arrive'];
                    $round_trip = $row_edit['round_trip'];
                    $date_created = $row_edit['date_created'];
                    $tor_number = $row_edit['tor_number'];
                    $dat = $row_edit['date_created'];
                    $nb = $row_edit['nb'];
                    $sb = $row_edit['sb'];
                    $trip_number = $row_edit['trip_number'];
                    $nb_baggage = $row_edit['nb_baggage'];
                    $sb_baggage = $row_edit['sb_baggage'];
                    $diesel_fixrate = $row_edit['diesel_fixrate'];
                    $nof = $row_edit['nof'];


                    $select_bus = "SELECT * FROM tbl_bus WHERE bus_id = '$buss_id'";
                    $run_select_bus = mysqli_query($con,$select_bus);
                    $row_bus = mysqli_fetch_array($run_select_bus);
                    $bb_id = $row_bus['bus_id'];
                    $bb_bus_number = $row_bus['bus_number'];
                    $bb_plate_number = $row_bus['plate_number'];

                    $select_bus_company = "SELECT * FROM tbl_bus_company WHERE bus_company_id = '$bus_company_id'";
                    $run_select_bus_company = mysqli_query($con,$select_bus_company);
                    $row_bus_company = mysqli_fetch_array($run_select_bus_company);
                    $bc_id = $row_bus_company['bus_company_id'];
                    $bc_name = $row_bus_company['bus_company_name'];

                    $select_driver = "SELECT * FROM tbl_driver WHERE driver_id = '$driverr_id'";
                    $run_select_driver = mysqli_query($con,$select_driver);
                    $row_driver = mysqli_fetch_array($run_select_driver);
                    $d_id = $row_driver['driver_id'];
                    $d_first_name = $row_driver['first_name'];
                    $d_middle_name = $row_driver['middle_name'];
                    $d_last_name = $row_driver['last_name'];
                    $d_image = $row_driver['image'];
                    $d_full = ucfirst($d_first_name) . " " . ucfirst($d_middle_name) . " " . ucfirst($d_last_name);

                    $select_conductor = "SELECT * FROM tbl_conductor WHERE conductor_id = '$conductorr_id'";
                    $run_select_conductor = mysqli_query($con,$select_conductor);
                    $row_conductor = mysqli_fetch_array($run_select_conductor);
                    $c_id = $row_conductor['conductor_id'];
                    $c_first_name = $row_conductor['first_name'];
                    $c_middle_name = $row_conductor['middle_name'];
                    $c_last_name = $row_conductor['last_name'];
                    $c_image = $row_conductor['image'];
                    $c_full = ucfirst($c_first_name) . " " . ucfirst($c_middle_name) . " " . ucfirst($c_last_name);
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
                <i class="fa fa-tasks"></i>
                Trip Report / Edit Trip Report
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
                    Edit Trip Report
                </h3><!-- panel-title Ends -->
            </div><!-- panel-heading Ends -->
            <div class="panel-body"><!-- panel-body Starts -->
                <form class="form-horizontal" autocomplete="off" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Date
                        </label>
                        <div class="col-md-6">
                            <input type="date" name="dt" class="form-control" required value="<?php echo $dat; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                  <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            TOR Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="tor" class="form-control" required value="<?php echo $tor_number; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Bus Number
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" name="bus_number">
                                <option name="bus_number" value="<?php echo $bb_id ?>" hidden>
                                <?php echo $bb_bus_number ?>
                              </option>
                              <?php

                              $select_bus = "SELECT * FROM tbl_bus WHERE removed = 'No' AND bus_company_id = '$bus_company_id'";
                              $run_select = mysqli_query($con,$select_bus);
                              while($row_select = mysqli_fetch_array($run_select)){
                                  $bus_id = $row_select['bus_id'];
                                  $bus_number = $row_select['bus_number'];
                              ?>
                              <option name="bus_number" value="<?php echo $bus_id ?>">
                                <?php echo $bus_number ?>
                              </option>
                              <?php
                            }
                              ?>
                            </select>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Driver
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" name="driver">
                                 <option name="driver" value="<?php echo $d_id ?>">
                                <?php echo $d_full ?>
                              </option>
                              <?php

                              $select_driver = "SELECT * FROM tbl_driver WHERE removed = 'No' AND bus_company_id = '$bus_company_id'";
                              $run_select_d = mysqli_query($con,$select_driver);
                              while($row_select_d = mysqli_fetch_array($run_select_d)){
                                  $driver_id = $row_select_d['driver_id'];
                                  $d_fname = $row_select_d['first_name'];
                                  $d_mname = $row_select_d['middle_name'];
                                  $d_lname = $row_select_d['last_name'];
                                  $d_name = ucfirst($d_fname) . " " . ucfirst($d_mname) . " " . ucfirst($d_lname);
                              ?>
                              <option name="driver" value="<?php echo $driver_id ?>">
                                <?php echo $d_name ?>
                              </option>
                              <?php
                            }
                              ?>
                            </select>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Conductor
                        </label>
                        <div class="col-md-6">
                            <select class="form-control" name="conductor">
                                <option name="conductor" value="<?php echo $conductorr_id ?>">
                                <?php echo $c_full ?>
                              </option>
                              <?php

                              $select_conductor = "SELECT * FROM tbl_conductor WHERE removed = 'No' AND bus_company_id = '$bus_company_id'";
                              $run_select_c = mysqli_query($con,$select_conductor);
                              while($row_select_c = mysqli_fetch_array($run_select_c)){
                                  $conductor_id = $row_select_c['conductor_id'];
                                  $c_fname = $row_select_c['first_name'];
                                  $c_mname = $row_select_c['middle_name'];
                                  $c_lname = $row_select_c['last_name'];
                                  $c_name = ucfirst($c_fname) . " " . ucfirst($c_mname) . " " . ucfirst($c_lname);
                              ?>
                              <option name="conductor" value="<?php echo $conductor_id ?>">
                                <?php echo $c_name ?>
                              </option>
                              <?php
                            }
                              ?>
                            </select>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Depart From
                        </label>
                        <div class="col-md-6">
                            <input id="from" type="text" name="depart_from" class="form-control" required value="<?php echo $depart_from; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Time Depart
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="time_depart" class="form-control" required value="<?php echo $time_depart; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Arrive To
                        </label>
                        <div class="col-md-6">
                            <input id="to" type="text" name="arrive_to" class="form-control" required value="<?php echo $arrive_to; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Time Arrive
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="time_arrive" class="form-control" required value="<?php echo $time_arrive; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Total KM (Round Trip)
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="km" class="form-control" required value="<?php echo $round_trip; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Trip Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="tn" class="form-control" required value="<?php echo $trip_number; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                           North Bound (Collection)
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="nb" class="form-control" value="<?php echo $nb; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                     <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                           South Bound (Collection)
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="sb" class="form-control" value="<?php echo $sb; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                           North Bound (Baggage Fare)
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="nb_" class="form-control" value="<?php echo $nb_baggage; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                           South Bound (Baggage Fare)
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="sb_" class="form-control" value="<?php echo $sb_baggage; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                           Diesel Fix Rate
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="fix" class="form-control" value="<?php echo $diesel_fixrate; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                     <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                           NOF
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="nof" class="form-control" value="<?php echo $nof; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Update Trip Report" class="btn btn-primary form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && trip_reports=<?php echo $bus_company_id; ?> && getTrip=<?php echo $getAdd; ?>" class="btn btn-danger form-control">
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

    var place = ["Avenida","Candon","Cubao","Tuguegarao"];

    function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}



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
    <script>
        autocomplete(document.getElementById("from"), place);
        autocomplete(document.getElementById("to"), place);
    </script>
    <?php
    	if(isset($_POST['submit'])){

                $bus_number = mysqli_real_escape_string($con,$_POST['bus_number']);
            $tor = mysqli_real_escape_string($con,$_POST['tor']);
            $driver = mysqli_real_escape_string($con,$_POST['driver']);
            $conductor = mysqli_real_escape_string($con,$_POST['conductor']);
            $depart_from = mysqli_real_escape_string($con,$_POST['depart_from']);
            $time_depart = mysqli_real_escape_string($con,$_POST['time_depart']);
            $arrive_to = mysqli_real_escape_string($con,$_POST['arrive_to']);
            $time_arrive = mysqli_real_escape_string($con,$_POST['time_arrive']);
            $km = mysqli_real_escape_string($con,$_POST['km']);
            $tn = mysqli_real_escape_string($con,$_POST['tn']);
            $dt = mysqli_real_escape_string($con,$_POST['dt']);
            $nbb = mysqli_real_escape_string($con,$_POST['nb']);
            $sbb = mysqli_real_escape_string($con,$_POST['sb']);
            $nbb_ = mysqli_real_escape_string($con,$_POST['nb_']);
            $sbb_ = mysqli_real_escape_string($con,$_POST['sb_']);
            $fix = mysqli_real_escape_string($con,$_POST['fix']);
            $noff = mysqli_real_escape_string($con,$_POST['nof']);

                $update_driver = "UPDATE tbl_trip_report SET bus_id = '$bus_number', tor_number = '$tor', driver_id = '$driver', conductor_id = '$conductor', depart_from = '$depart_from', time_depart = '$time_depart', arrive_to = '$arrive_to', time_arrive = '$time_arrive', round_trip = '$km', date_created = '$dt', trip_number = '$tn', nb = '$nbb', sb = '$sbb', nb_baggage = '$nbb_', sb_baggage = '$sbb_', diesel_fixrate = '$fix', nof = '$noff'  WHERE trip_report_id = '$e_id'";
            $run_update_driver = mysqli_query($con,$update_driver);

                if($run_update_driver){

                    echo "
                        <script>
                            alert('Trip Report Has Been Updated')
                        </script>
                    ";

                    echo "
                       <script>
                            window.open('index.php?jScript=$jScript && newScript=$newScript && trip_reports=$bus_company_id && getTrip=$getAdd','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Updating Driver')
                        </script>
                    ";

                }

            }
        
    	
    ?>
<?php
	}
?>