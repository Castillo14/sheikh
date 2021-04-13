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
	 $jScript = md5(rand(1,9));
	 $newScript = md5(rand(1,9));
	 $Script = md5(rand(1,9));
     $getProfile = md5(rand(1,9));
	 $getBus = md5(rand(1,9));
?>
<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="../account_images/<?php echo $image; ?>" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo $account_name; ?></p>
			</div>
		</div>
		<ul class="sidebar-menu" data-widget="tree">
			
            <li class="<?php if(isset($_GET['dashboard'])){ echo "active"; } ?>">
                <a href="index.php?dashboard">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li class="<?php if(isset($_GET['bus_company'])){ echo "active"; } ?><?php if(isset($_GET['add_bus_company'])){ echo "active"; } ?><?php if(isset($_GET['edit_bus_company'])){ echo "active"; } ?><?php if(isset($_GET['remove_bus_company'])){ echo "active"; } ?>">
                <a href="index.php?bus_company">
                    <i class="fa fa-bus"></i><span>Bus Company</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li class="treeview <?php if(isset($_GET['busses'])){ echo "active"; } ?><?php if(isset($_GET['add_bus'])){ echo "active"; } ?><?php if(isset($_GET['edit_bus'])){ echo "active"; } ?><?php if(isset($_GET['remove_bus'])){ echo "active"; } ?>">
                <a href="#!">
                    <i class="fa fa-bus"></i><span>Busses</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                                    <?php

                                    $get_bus_company = "SELECT * FROM tbl_bus_company WHERE removed = 'No'";

                                    $run_bus_company = mysqli_query($con,$get_bus_company);

                                    while($row_bus_company = mysqli_fetch_array($run_bus_company)){

                                        $bus_company_id = $row_bus_company['bus_company_id'];
                                        $bus_company_name = $row_bus_company['bus_company_name'];
                                    ?>
                                    <li>
                                        <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && busses=<?php echo $bus_company_id; ?> && getBusses=<?php echo $getBus; ?>"><i class="fa fa-bus"></i>
                                            <?php echo $bus_company_name; ?>
                                    </a>
                                    </li>
                                    <?php

                                }

                                ?>
                                </ul>
            </li>
            <li class="treeview <?php if(isset($_GET['drivers'])){ echo "active"; } ?><?php if(isset($_GET['add_driver'])){ echo "active"; } ?><?php if(isset($_GET['edit_driver'])){ echo "active"; } ?><?php if(isset($_GET['remove_driver'])){ echo "active"; } ?>">
                <a href="#!">
                    <i class="fa fa-user"></i><span>Drivers</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                                    <?php

                                    $get_bus_company = "SELECT * FROM tbl_bus_company WHERE removed = 'No'";

                                    $run_bus_company = mysqli_query($con,$get_bus_company);

                                    while($row_bus_company = mysqli_fetch_array($run_bus_company)){

                                        $bus_company_id = $row_bus_company['bus_company_id'];
                                        $bus_company_name = $row_bus_company['bus_company_name'];
                                    ?>
                                    <li>
                                        <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && drivers=<?php echo $bus_company_id; ?> && getDriver=<?php echo $getBus; ?>"><i class="fa fa-user"></i>
                                            <?php echo $bus_company_name; ?>
                                    </a>
                                    </li>
                                    <?php

                                }

                                ?>
                                </ul>
            </li>
            <li class="treeview <?php if(isset($_GET['conductors'])){ echo "active"; } ?><?php if(isset($_GET['add_conductor'])){ echo "active"; } ?><?php if(isset($_GET['edit_conductor'])){ echo "active"; } ?><?php if(isset($_GET['remove_conductor'])){ echo "active"; } ?>">
                <a href="#!">
                    <i class="fa fa-user"></i><span>Conductors</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                                    <?php

                                    $get_bus_company = "SELECT * FROM tbl_bus_company WHERE removed = 'No'";

                                    $run_bus_company = mysqli_query($con,$get_bus_company);

                                    while($row_bus_company = mysqli_fetch_array($run_bus_company)){

                                        $bus_company_id = $row_bus_company['bus_company_id'];
                                        $bus_company_name = $row_bus_company['bus_company_name'];
                                    ?>
                                    <li>
                                        <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && conductors=<?php echo $bus_company_id; ?> && getConductor=<?php echo $getBus; ?>"><i class="fa fa-user"></i>
                                            <?php echo $bus_company_name; ?>
                                    </a>
                                    </li>
                                    <?php

                                }

                                ?>
                                </ul>
            </li>
            <li class="treeview <?php if(isset($_GET['drivers_attendance'])){ echo "active"; } ?>">
                <a href="#!">
                    <i class="fa fa-user"></i><span>Attendance Drivers</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                                    <?php

                                    $get_bus_company = "SELECT * FROM tbl_bus_company WHERE removed = 'No'";

                                    $run_bus_company = mysqli_query($con,$get_bus_company);

                                    while($row_bus_company = mysqli_fetch_array($run_bus_company)){

                                        $bus_company_id = $row_bus_company['bus_company_id'];
                                        $bus_company_name = $row_bus_company['bus_company_name'];
                                    ?>
                                    <li>
                                        <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && drivers_attendance=<?php echo $bus_company_id; ?> && getConductor=<?php echo $getBus; ?>"><i class="fa fa-user"></i>
                                            <?php echo $bus_company_name; ?>
                                    </a>
                                    </li>
                                    <?php

                                }

                                ?>
                                </ul>
            </li>
            <li class="treeview <?php if(isset($_GET['conductors_attendance'])){ echo "active"; } ?>">
                <a href="#!">
                    <i class="fa fa-user"></i><span>Attendance Conductors</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                                    <?php

                                    $get_bus_company = "SELECT * FROM tbl_bus_company WHERE removed = 'No'";

                                    $run_bus_company = mysqli_query($con,$get_bus_company);

                                    while($row_bus_company = mysqli_fetch_array($run_bus_company)){

                                        $bus_company_id = $row_bus_company['bus_company_id'];
                                        $bus_company_name = $row_bus_company['bus_company_name'];
                                    ?>
                                    <li>
                                        <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && conductors_attendance=<?php echo $bus_company_id; ?> && getConductor=<?php echo $getBus; ?>"><i class="fa fa-user"></i>
                                            <?php echo $bus_company_name; ?>
                                    </a>
                                    </li>
                                    <?php

                                }

                                ?>
                                </ul>
            </li>
            <li class="treeview <?php if(isset($_GET['revolving_category'])){ echo "active"; } ?><?php if(isset($_GET['add_revolving_category'])){ echo "active"; } ?><?php if(isset($_GET['edit_revolving_category'])){ echo "active"; } ?><?php if(isset($_GET['remove_revolving_category'])){ echo "active"; } ?><?php if(isset($_GET['add_edit_revolving_category'])){ echo "active"; } ?><?php if(isset($_GET['revolving_list'])){ echo "active"; } ?><?php if(isset($_GET['view_revolving_list'])){ echo "active"; } ?><?php if(isset($_GET['view_all_revolving_list'])){ echo "active"; } ?><?php if(isset($_GET['view_all_revolving_list_search'])){ echo "active"; } ?><?php if(isset($_GET['view_revolving_list_search'])){ echo "active"; } ?>">
                <a href="#!">
                    <i class="fa fa-industry"></i><span>Revolving Category</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="index.php?add_edit_revolving_category"><i class="fa fa-industry"></i>
                            Add / Edit Category
                        </a>
                    </li>
                                    <?php

                                    $get_bus_company = "SELECT * FROM tbl_bus_company WHERE removed = 'No'";

                                    $run_bus_company = mysqli_query($con,$get_bus_company);

                                    while($row_bus_company = mysqli_fetch_array($run_bus_company)){

                                        $bus_company_id = $row_bus_company['bus_company_id'];
                                        $bus_company_name = $row_bus_company['bus_company_name'];
                                    ?>
                                    <li>
                                        <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && revolving_list=<?php echo $bus_company_id; ?> && getRevolving=<?php echo $getBus; ?>"><i class="fa fa-industry"></i>
                                            <?php echo $bus_company_name; ?>
                                    </a>
                                    </li>
                                    <?php

                                }

                                ?>
                                </ul>
            </li>
            <li class="treeview <?php if(isset($_GET['revolving_fund'])){ echo "active"; } ?><?php if(isset($_GET['revolving_fund_search'])){ echo "active"; } ?><?php if(isset($_GET['add_revolving_fund'])){ echo "active"; } ?><?php if(isset($_GET['all_revolving_fund'])){ echo "active"; } ?><?php if(isset($_GET['all_revolving_fund_search'])){ echo "active"; } ?>">
                <a href="#!">
                    <i class="fa fa-industry"></i><span>Revolving Fund</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                                    <li>
                                        <a href="index.php?all_revolving_fund"><i class="fa fa-industry"></i>
                                            All Company
                                    </a>
                                    </li>
                                    <?php

                                    $get_bus_company = "SELECT * FROM tbl_bus_company WHERE removed = 'No'";

                                    $run_bus_company = mysqli_query($con,$get_bus_company);

                                    while($row_bus_company = mysqli_fetch_array($run_bus_company)){

                                        $bus_company_id = $row_bus_company['bus_company_id'];
                                        $bus_company_name = $row_bus_company['bus_company_name'];
                                    ?>
                                    <li>
                                        <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && revolving_fund=<?php echo $bus_company_id; ?> && getRevolving=<?php echo $getBus; ?>"><i class="fa fa-industry"></i>
                                            <?php echo $bus_company_name; ?>
                                    </a>
                                    </li>
                                    <?php

                                }

                                ?>
                                </ul>
            </li>
            <li class="treeview <?php if(isset($_GET['add_edit_expense_list'])){ echo "active"; } ?><?php if(isset($_GET['add_expense_list'])){ echo "active"; } ?><?php if(isset($_GET['edit_expense_list'])){ echo "active"; } ?><?php if(isset($_GET['remove_expense_list'])){ echo "active"; } ?><?php if(isset($_GET['expense_list'])){ echo "active"; } ?><?php if(isset($_GET['bus_company_expense'])){ echo "active"; } ?><?php if(isset($_GET['view_all_expense_list'])){ echo "active"; } ?><?php if(isset($_GET['view_all_expense_list_search'])){ echo "active"; } ?><?php if(isset($_GET['view_expense_list_search'])){ echo "active"; } ?>">
                <a href="#!">
                    <i class="fa fa-industry"></i><span>Expense Category</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="index.php?add_edit_expense_list"><i class="fa fa-industry"></i>
                            Add / Edit List
                        </a>
                    </li>
                                    <?php

                                    $get_bus_company = "SELECT * FROM tbl_bus_company WHERE removed = 'No'";

                                    $run_bus_company = mysqli_query($con,$get_bus_company);

                                    while($row_bus_company = mysqli_fetch_array($run_bus_company)){

                                        $bus_company_id = $row_bus_company['bus_company_id'];
                                        $bus_company_name = $row_bus_company['bus_company_name'];
                                    ?>
                                    <li>
                                        <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && bus_company_expense=<?php echo $bus_company_id; ?> && getExpense=<?php echo $getBus; ?>"><i class="fa fa-industry"></i>
                                            <?php echo $bus_company_name; ?>
                                    </a>
                                    </li>
                                    <?php

                                }

                                ?>
                                </ul>
            </li>
            <li class="treeview <?php if(isset($_GET['trip_reports'])){ echo "active"; } ?><?php if(isset($_GET['add_trip_report'])){ echo "active"; } ?><?php if(isset($_GET['edit_trip_report'])){ echo "active"; } ?>">
                <a href="#!">
                    <i class="fa fa-tasks"></i><span>Trip Reports</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                                    <?php

                                    $get_bus_company = "SELECT * FROM tbl_bus_company WHERE removed = 'No'";

                                    $run_bus_company = mysqli_query($con,$get_bus_company);

                                    while($row_bus_company = mysqli_fetch_array($run_bus_company)){

                                        $bus_company_id = $row_bus_company['bus_company_id'];
                                        $bus_company_name = $row_bus_company['bus_company_name'];
                                    ?>
                                    <li>
                                        <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && trip_reports=<?php echo $bus_company_id; ?> && getTrip=<?php echo $getBus; ?>"><i class="fa fa-tasks"></i>
                                            <?php echo $bus_company_name; ?>
                                    </a>
                                    </li>
                                    <?php

                                }

                                ?>
                                </ul>
            </li>
            <li class="treeview <?php if(isset($_GET['net_info'])){ echo "active"; } ?><?php if(isset($_GET['net_info_search'])){ echo "active"; } ?>">
                <a href="#!">
                    <i class="fa fa-money"></i><span>Net Info</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                                    <?php

                                    $get_bus_company = "SELECT * FROM tbl_bus_company WHERE removed = 'No'";

                                    $run_bus_company = mysqli_query($con,$get_bus_company);

                                    while($row_bus_company = mysqli_fetch_array($run_bus_company)){

                                        $bus_company_id = $row_bus_company['bus_company_id'];
                                        $bus_company_name = $row_bus_company['bus_company_name'];
                                    ?>
                                    <li>
                                        <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && net_info=<?php echo $bus_company_id; ?> && getInfo=<?php echo $getBus; ?>"><i class="fa fa-money"></i>
                                            <?php echo $bus_company_name; ?>
                                    </a>
                                    </li>
                                    <?php

                                }

                                ?>
                                </ul>
            </li>
            <li class="<?php if(isset($_GET['supplier'])){ echo "active"; } ?><?php if(isset($_GET['add_supplier'])){ echo "active"; } ?><?php if(isset($_GET['edit_supplier'])){ echo "active"; } ?><?php if(isset($_GET['remove_supplier'])){ echo "active"; } ?>">
                <a href="index.php?supplier">
                    <i class="fa fa-list"></i><span>Suppliers</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <li class="treeview <?php if(isset($_GET['add_edit_inventory_place'])){ echo "active"; } ?><?php if(isset($_GET['add_inventory_place'])){ echo "active"; } ?><?php if(isset($_GET['edit_inventory_place'])){ echo "active"; } ?><?php if(isset($_GET['remove_inventory_place'])){ echo "active"; } ?><?php if(isset($_GET['inventory'])){ echo "active"; } ?><?php if(isset($_GET['add_inventory'])){ echo "active"; } ?><?php if(isset($_GET['edit_inventory'])){ echo "active"; } ?><?php if(isset($_GET['remove_inventory'])){ echo "active"; } ?>">
                <a href="#!">
                    <i class="fa fa-list"></i><span>Inventory</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="index.php?add_edit_inventory_place"><i class="fa fa-list"></i>
                            Inventory Place
                        </a>
                    </li>
                                    <?php

                                    $get_inventory = "SELECT * FROM tbl_inventory_place WHERE removed = 'No'";

                                    $run_inventory = mysqli_query($con,$get_inventory);

                                    while($row_inventory = mysqli_fetch_array($run_inventory)){

                                        $inventory_place_id = $row_inventory['inventory_place_id'];
                                        $place_name = $row_inventory['place_name'];
                                    ?>
                                    <li>
                                        <a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && inventory=<?php echo $inventory_place_id; ?> && getInventory=<?php echo $getBus; ?>"><i class="fa fa-list"></i>
                                            <?php echo $place_name; ?>
                                    </a>
                                    </li>
                                    <?php

                                }

                                ?>
                                </ul>
            </li>
            <li class="<?php if(isset($_GET['accounts'])){ echo "active"; } ?><?php if(isset($_GET['add_account'])){ echo "active"; } ?><?php if(isset($_GET['edit_account'])){ echo "active"; } ?><?php if(isset($_GET['remove_account'])){ echo "active"; } ?>">
                <a href="index.php?accounts">
                    <i class="fa fa-users"></i><span>Accounts</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
    		<li class="<?php if(isset($_GET['profile'])){ echo "active"; } ?>">
        		<a href="index.php?jScript=<?php echo $jScript; ?> && newScript=<?php echo $newScript; ?> && profile=<?php echo $account_id; ?> && editProfile=<?php echo $getProfile; ?>">
            		<i class="fa fa-gear"></i><span>Edit Profile</span>
            		<span class="pull-right-container"></span>
        		</a>
			</li>
    		<li>
       			<a href="../logout.php">
           			<i class="fa fa-sign-out"></i><span>Logout</span>
           			<span class="pull-right-container"></span>
       			</a> 
    		</li> 
		</ul>
	</section>
</aside>
<?php
	}
?>