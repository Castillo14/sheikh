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

      if(isset($_GET['add_bus'])){

        $edit_id = $_GET['add_bus'];
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
                Busses / Add <?php echo $e_name; ?> Bus
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
                    Add <?php echo $e_name; ?> Bus
                </h3><!-- panel-title Ends -->
            </div>
            <div class="panel-body">
                <form class="form-horizontal" autocomplete="off" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Bus Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="bus_number" class="form-control" required maxlength="10" minlength="2">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Plate Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="plate_number" class="form-control" required maxlength="10" minlength="2">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Engine Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="engine_number" class="form-control" required>
                        </div>
                    </div><!-- form-group Ends --><div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Chasis Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="chasis_number" class="form-control" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Make
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="make" class="form-control" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Franchise Number
                        </label>
                        <div class="col-md-6">
                            <input type="text" name="franchise_number" class="form-control" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Route From
                        </label>
                        <div class="col-md-6">
                            <input id="from" type="text" name="route_from" class="form-control" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            Route To
                        </label>
                        <div class="col-md-6">
                            <input id="to" type="text" name="route_to" class="form-control" required>
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert Bus" class="btn btn-primary form-control">
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label">
                            
                        </label>
                        <div class="col-md-6">
                            <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && busses=<?php echo $edit_id; ?> && getBusses=<?php echo $getAdd; ?>" class="btn btn-danger form-control">
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
            $engine_number = mysqli_real_escape_string($con,$_POST['engine_number']);
            $chasis_number = mysqli_real_escape_string($con,$_POST['chasis_number']);
            $make = mysqli_real_escape_string($con,$_POST['make']);
            $franchise_number = mysqli_real_escape_string($con,$_POST['franchise_number']);
            $route_from = mysqli_real_escape_string($con,$_POST['route_from']);
            $route_to = mysqli_real_escape_string($con,$_POST['route_to']);
            $insert_bus = "INSERT INTO tbl_bus (bus_number,plate_number,bus_company_id,engine_number,chasis_number,make,franchise_number,route_from,route_to,created_by,date_created,removed,removed_by,date_removed) VALUES ('$bus_number','$plate_number','$e_id','$engine_number','$chasis_number','$make','$franchise_number','$route_from','$route_to','$creator',now(),'No','','0000-00-00')";
            $run_insert_bus = mysqli_query($con,$insert_bus);


                if($run_insert_bus){

                    echo "
                        <script>
                            alert('New Bus Has Been Inserted')
                        </script>
                    ";

                    echo "
                        <script>
                            window.open('index.php?jScript=$jScript && newScript=$newScript && busses=$edit_id && getBusses=$getAdd','_self')
                        </script>
                    ";

                }else{

                    echo "
                        <script>
                            alert('Error Inserting Bus')
                        </script>
                    ";

                }

        }
    ?>
			<?php
				}
			?>