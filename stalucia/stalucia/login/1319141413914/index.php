<?php
	session_start();
	include("../include/db.php");
	if(!isset($_SESSION['account_username'])){
		echo "
			<script>
				window.open('../index.php','_self')
			</script>
		";
	}else{
?>
<?php
	$staff_session = $_SESSION['account_username'];
	$get_staff = "SELECT * FROM tbl_accounts WHERE account_username = '$staff_session'";
	$run_staff = mysqli_query($con,$get_staff);
	$row_staff = mysqli_fetch_array($run_staff);
	$account_id = $row_staff['account_id'];
	$first_name = $row_staff['first_name'];
	$middle_name = $row_staff['middle_name'];
	$last_name = $row_staff['last_name'];
	$account_name = ucfirst($first_name) . " " . ucfirst($last_name);
	$creator = ucfirst($first_name) . " " . ucfirst($middle_name) . " " . ucfirst($last_name);
	$image = $row_staff['image'];
	$job = $row_staff['job'];

	

?>
<?php

	$total_bus_company = "SELECT * FROM tbl_bus_company WHERE removed = 'No'";

	$run_total_bus_company = mysqli_query($con,$total_bus_company);

	$count_total_bus_company = mysqli_num_rows($run_total_bus_company);

	$total_bus = "SELECT * FROM tbl_bus WHERE removed = 'No'";

	$run_total_bus = mysqli_query($con,$total_bus);

	$count_total_bus = mysqli_num_rows($run_total_bus);

	$total_driver = "SELECT * FROM tbl_driver WHERE removed = 'No'";

	$run_total_driver = mysqli_query($con,$total_driver);

	$count_total_driver = mysqli_num_rows($run_total_driver);

	$total_conductor = "SELECT * FROM tbl_conductor WHERE removed = 'No'";

	$run_total_conductor = mysqli_query($con,$total_conductor);

	$count_total_conductor = mysqli_num_rows($run_total_conductor);

	$total_inventory = "SELECT * FROM tbl_inventory";

	$run_total_inventory = mysqli_query($con,$total_inventory);

	$count_total_inventory = mysqli_num_rows($run_total_inventory);

	$total_revolving_category = "SELECT * FROM tbl_revolving_category WHERE removed = 'No'";

	$run_total_revolving_category = mysqli_query($con,$total_revolving_category);

	$count_total_revolving_category = mysqli_num_rows($run_total_revolving_category);

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" type="image/x-icon" href="../img/stalucia_logo.ico">
		<title>Sta Lucia Express Bus Co.</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
	    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
	    <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
	    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
	    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
	    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
	    <link rel="stylesheet" href="https://ionicframework.com/docs/v3/ionicons/">
	  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	  	<script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>	  	
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
	  		<header class="main-header">
	    		<a href="index.php?dashboard" class="logo">
	      			<span class="logo-mini">SL</span>
	      			<span class="logo-lg"><b>STA LUCIA BUS</b></span>
	    		</a>
	    		<nav class="navbar navbar-static-top">
	      			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
	        			<span class="sr-only">Toggle navigation</span>
	      			</a>
	      			<div class="navbar-custom-menu">
	        			<ul class="nav navbar-nav">
	          				<li class="dropdown user user-menu">
	            				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	              					<img src="../account_images/<?php echo $image; ?>" class="user-image" alt="User Image">
	              					<span class="hidden-xs"><?php echo $account_name; ?></span>
	           					</a> 
	            				<ul class="dropdown-menu">
	              					<li class="user-header">
	                					<img src="../account_images/<?php echo $image; ?>" class="img-circle" alt="User Image">
	                					<p>
	                 						<?php echo $account_name; ?>
	                  						<small><?php echo $job; ?></small>
	                					</p>
	              					</li>
	              					<li class="user-footer">
	                					<div class="pull-right">
	                  						<a href="../logout.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Logout</a>
	               	 					</div>
	              					</li>
	            				</ul>
	          				</li> 
	        			</ul>
	      			</div>
	    		</nav>
	  		</header>
	  		<?php
	  			include("sidebar.php");
	  		?>
	  		<div class="content-wrapper">
	  			<?php
		    		if(isset($_GET['dashboard'])){
	                    include("dashboard.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['profile'])){
	                    include("profile.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['bus_company'])){
	                    include("bus_company.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_bus_company'])){
	                    include("add_bus_company.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['edit_bus_company'])){
	                    include("edit_bus_company.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['remove_bus_company'])){
	                    include("remove_bus_company.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['busses'])){
	                    include("busses.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_bus'])){
	                    include("add_bus.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['edit_bus'])){
	                    include("edit_bus.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['remove_bus'])){
	                    include("remove_bus.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['drivers'])){
	                    include("drivers.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_driver'])){
	                    include("add_driver.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['edit_driver'])){
	                    include("edit_driver.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['remove_driver'])){
	                    include("remove_driver.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['conductors'])){
	                    include("conductors.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_conductor'])){
	                    include("add_conductor.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['edit_conductor'])){
	                    include("edit_conductor.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['remove_conductor'])){
	                    include("remove_conductor.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_edit_revolving_category'])){
	                    include("add_edit_revolving_category.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['revolving_category'])){
	                    include("revolving_category.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_revolving_category'])){
	                    include("add_revolving_category.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['edit_revolving_category'])){
	                    include("edit_revolving_category.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['remove_revolving_category'])){
	                    include("remove_revolving_category.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['revolving_list'])){
	                    include("revolving_list.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['view_revolving_list'])){
	                    include("view_revolving_list.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['revolving_fund'])){
	                    include("revolving_fund.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['revolving_fund_search'])){
	                    include("revolving_fund_search.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_revolving_fund'])){
	                    include("add_revolving_fund.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['trip_reports'])){
	                    include("trip_reports.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_trip_report'])){
	                    include("add_trip_report.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_edit_expense_list'])){
	                    include("add_edit_expense_list.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_expense_list'])){
	                    include("add_expense_list.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['edit_expense_list'])){
	                    include("edit_expense_list.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['remove_expense_list'])){
	                    include("remove_expense_list.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['expense_list'])){
	                    include("expense_list.php");
	                }
	    		?>
				<?php
		    		if(isset($_GET['bus_company_expense'])){
	                    include("bus_company_expense.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['view_all_revolving_list'])){
	                    include("view_all_revolving_list.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['view_all_revolving_list_search'])){
	                    include("view_all_revolving_list_search.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['view_revolving_list_search'])){
	                    include("view_revolving_list_search.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['all_revolving_fund'])){
	                    include("all_revolving_fund.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['all_revolving_fund_search'])){
	                    include("all_revolving_fund_search.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['accounts'])){
	                    include("accounts.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_account'])){
	                    include("add_account.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['edit_account'])){
	                    include("edit_account.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['remove_account'])){
	                    include("remove_account.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['view_all_expense_list'])){
	                    include("view_all_expense_list.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['view_all_expense_list_search'])){
	                    include("view_all_expense_list_search.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['view_expense_list_search'])){
	                    include("view_expense_list_search.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['supplier'])){
	                    include("supplier.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_supplier'])){
	                    include("add_supplier.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['edit_supplier'])){
	                    include("edit_supplier.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['remove_supplier'])){
	                    include("remove_supplier.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_edit_inventory_place'])){
	                    include("add_edit_inventory_place.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_inventory_place'])){
	                    include("add_inventory_place.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['edit_inventory_place'])){
	                    include("edit_inventory_place.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['remove_inventory_place'])){
	                    include("remove_inventory_place.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['inventory'])){
	                    include("inventory.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_inventory'])){
	                    include("add_inventory.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['edit_inventory'])){
	                    include("edit_inventory.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['drivers_attendance'])){
	                    include("drivers_attendance.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['conductors_attendance'])){
	                    include("conductors_attendance.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['edit_trip_report'])){
	                    include("edit_trip_report.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['net_info'])){
	                    include("net_info.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['net_info_search'])){
	                    include("net_info_search.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['dispatcher_bol'])){
	                    include("dispatcher_bol.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['dispatcher_bol_search'])){
	                    include("dispatcher_bol_search.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_dispatcher_bol'])){
	                    include("add_dispatcher_bol.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['remove_bol'])){
	                    include("remove_bol.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['main_inventory'])){
	                    include("main_inventory.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['edit_main_inventory'])){
	                    include("edit_main_inventory.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['add_quantity'])){
	                    include("add_quantity.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['malabon_inventory'])){
	                    include("malabon_inventory.php");
	                }
	    		?>
	    		<?php
		    		if(isset($_GET['remove_inventory'])){
	                    include("remove_inventory.php");
	                }
	    		?>
	  		</div>
	  		<footer class="main-footer">	
	    		<strong>Copyright &copy;
	    			<?php
	    				date_default_timezone_set("Asia/Manila");
                        $year_now = date("Y");
                        echo "$year_now";
                    ?>
                <a href="#">Sta. Lucia Express Bus Co.</a>.</strong> All Rights Reserved
	  		</footer>
	  		<div class="control-sidebar-bg"></div>
		</div>

		<script src="../bower_components/fastclick/lib/fastclick.js"></script>
		<script src="../dist/js/adminlte.min.js"></script>
		<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="../bower_components/Chart.js/Chart.js"></script>
		<script src="../dist/js/pages/dashboard2.js"></script>
		<script src="../dist/js/demo.js"></script>
		<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	</body>
</html>
<?php
	}
?>