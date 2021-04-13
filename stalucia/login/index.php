<?php

	session_start();
	include("include/db.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="img/stalucia_logo.ico">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body style="background-image: url(../images/buscover_2.png); width: 100%; height: 100%; background-repeat: no-repeat;">
	<div class="container">
		<form class="form-login" action="" method="post">
			<h2 class="form-login-heading">
				Login
			</h2>
			<input type="text" name="account_username" class="form-control" placeholder="Username" required>
			<input type="password" name="account_password" class="form-control" placeholder="Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">
				Log In
			</button>
		</form>
	</div>
</body>
</html>
<?php

	if(isset($_POST['login'])){

		$account_username = mysqli_real_escape_string($con,$_POST['account_username']);

		$account_password = mysqli_real_escape_string($con,$_POST['account_password']);

		$get_admin = "SELECT * FROM tbl_accounts WHERE account_username='$account_username' AND account_password='$account_password' AND removed = 'No'";

		$run_admin = mysqli_query($con,$get_admin);

		$count = mysqli_num_rows($run_admin);

		$row_account = mysqli_fetch_array($run_admin);

		$job = $row_account['job'];

		if($count==1){


			if($job == "Main Administrator"){

				$_SESSION['account_username']=$account_username;

				echo "
					<script>
						alert('You are Logged In')
					</script>
				";

				echo "
					<script>
						window.open('1319141413914/index.php?dashboard','_self')
					</script>
				";

			}elseif($job == "Administrator"){

				$_SESSION['account_username']=$account_username;

				echo "
					<script>
						alert('You are Logged In')
					</script>
				";

				echo "
					<script>
						window.open('1413914/index.php?dashboard','_self')
					</script>
				";

			}elseif($job == "Staff"){

				$_SESSION['account_username']=$account_username;

				echo "
					<script>
						alert('You are Logged In')
					</script>
				";

				echo "
					<script>
						window.open('1920166/index.php?dashboard','_self')
					</script>
				";

			}else{

			echo "
				<script>
					alert('Username or Password is Wrong')
				</script>
			";

		}

			

		}else{

			echo "
				<script>
					alert('Username or Password is Wrong')
				</script>
			";

		}

	}

?>