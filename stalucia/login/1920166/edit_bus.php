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

	if(isset($_GET['edit_bus'])){

		$edit_id = $_GET['edit_bus'];
		$edit_bus = "SELECT * FROM tbl_bus WHERE bus_id = '$edit_id' AND removed = 'No'";
		$run_edit = mysqli_query($con,$edit_bus);
		$row_edit = mysqli_fetch_array($run_edit);
		$e_id = $row_edit['bus_id'];
		$e_bus_number = $row_edit['bus_number'];
		$e_plate_number = $row_edit['plate_number'];
        $e_bus_company = $row_edit['bus_company_id'];
                    $e_engine_number = $row_edit['engine_number'];
                    $e_chasis_number = $row_edit['chasis_number'];
                    $e_make = $row_edit['make'];
                    $e_franchise_number = $row_edit['franchise_number'];
                    $e_route_from = $row_edit['route_from'];
                    $e_route_to = $row_edit['route_to'];

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
                <i class="fa fa-bus"></i>
                Busses / Edit Bus
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
                    Edit Bus
                </h3><!-- panel-title Ends -->
            </div><!-- panel-heading Ends -->
            <div class="panel-body"><!-- panel-body Starts -->
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Bus Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="bus_number" class="form-control" required maxlength="10" minlength="2" value="<?php echo $e_bus_number; ?>">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Plate Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="plate_number" class="form-control" required maxlength="10" minlength="2" value="<?php echo $e_plate_number; ?>">
                        </div>
                    </div><!-- form-group Ends -->
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
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Engine Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="engine_number" class="form-control" value="<?php echo $e_engine_number; ?>" required>
                        </div>
                    </div><!-- form-group Ends --><div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Chasis Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="chasis_number" class="form-control" value="<?php echo $e_chasis_number; ?>" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Make
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="make" class="form-control" value="<?php echo $e_make; ?>" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Franchise Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="franchise_number" class="form-control" value="<?php echo $e_franchise_number; ?>" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Route From
                        </label>
                        <div class="col-md-6">
                            <input id="from" type="text" name="route_from" class="form-control" value="<?php echo $e_route_from; ?>" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Route To
                        </label>
                        <div class="col-md-6">
                            <input id="to" type="text" name="route_to" class="form-control" value="<?php echo $e_route_to; ?>" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Update Bus" class="btn btn-primary form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && busses=<?php echo $e_bus_company; ?> && getBusses=<?php echo $getAdd; ?>" class="btn btn-danger form-control">
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
            $plate_number = mysqli_real_escape_string($con,$_POST['plate_number']);
            $bus_company = mysqli_real_escape_string($con,$_POST['bus_company']);
            $engine_number = mysqli_real_escape_string($con,$_POST['engine_number']);
            $chasis_number = mysqli_real_escape_string($con,$_POST['chasis_number']);
            $make = mysqli_real_escape_string($con,$_POST['make']);
            $franchise_number = mysqli_real_escape_string($con,$_POST['franchise_number']);
            $route_from = mysqli_real_escape_string($con,$_POST['route_from']);
            $route_to = mysqli_real_escape_string($con,$_POST['route_to']);


                $update_bus = "UPDATE tbl_bus SET bus_number = '$bus_number', plate_number = '$plate_number', bus_company_id = '$bus_company', engine_number = '$engine_number', chasis_number = '$chasis_number', make = '$make', franchise_number = '$franchise_number', route_from = '$route_from', route_to = '$route_to' WHERE bus_id = '$e_id'";
            $run_update_bus = mysqli_query($con,$update_bus);

                if($run_update_bus){

                    echo "
                        <script>
                            alert('Bus Has Been Updated')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?jScript=$jScript && newScript=$newScript && busses=$bus_company && getBusses=$getAdd','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Updating Bus')
                        </script>
                    ";

                }

            }
        
    	
    ?>
<?php
	}
?>