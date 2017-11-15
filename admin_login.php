<?php 
	require_once 'includes/session_start.php';
	require_once 'includes/dbconnect.php';
	require_once 'includes/functions.php';

	$session_check = session_check();

	if ($session_check) {
		header("Location: admin_panel.php");
	}

	if (isset($_POST['sign_in'])) {
		$username = check_input($_POST['username']);
		$psw      = check_input($_POST['psw']);

		$admin_login = admin_login($username,$psw);

		if (!$admin_login) {
			echo "<script>alert('Failed! Check login details.')</script>";
		} else {
			$_SESSION['user_id'] = $admin_login;
			$_SESSION['logged_in'] = 1;

			header("Location: admin_panel.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

  	<!-- Latest compiled JavaScript -->
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<form action="" method="post">

	  <div class="imgcontainer">
	  	<h2>Tese Admin Panel</h2>
	  </div>

	  <div class="container">
	    <label><b>Username</b></label>
	    <input type="text" placeholder="Enter Username" name="username" required>

	    <label><b>Password</b></label>
	    <input type="password" placeholder="Enter Password" name="psw" required>

	    <button type="submit" name="sign_in">Login</button>
	    <input type="checkbox" checked="checked"> Remember me
	  </div>

	  <div class="container">
	    <button type="button" class="cancelbtn">Cancel</button>
	    <span class="psw">Forgot <a href="#">password?</a></span>
	  </div>

	</form>
</body>
</html>