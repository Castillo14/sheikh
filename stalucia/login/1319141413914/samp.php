<?php 

include("../include/db.php");



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
		<thead>
			<tr>
		<?php 

			$select = "SELECT * FROM tbl_expenses";
	$run_get = mysqli_query($con,$select);
	$count_total = mysqli_num_rows($run_get);
		while($run_gett=mysqli_fetch_array($run_get)){
		
		$e_name = $run_gett['expense_name'];

		?>

		<th><?php echo $e_name; ?>    </th>
		
<?php
	}

		 ?>
		 
		</tr>
		 </thead>
		 <tbody>

		 		<?php 

			$selectt = "SELECT * FROM tbl_expenses";
	$run_gett = mysqli_query($con,$selectt);
	$count_totalt = mysqli_num_rows($run_gett);
		while($run_gettt=mysqli_fetch_array($run_gett)){
		$e_id = $run_gettt['expenses_id'];
	

		?>

		<td><?php echo $e_id; ?>    </td>
		
<?php
	}

		 ?>
		 	
		 </tbody>
	</table>
</body>
</html>