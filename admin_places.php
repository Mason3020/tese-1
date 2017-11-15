<?php
	require_once 'includes/session_start.php';
	require_once 'includes/dbconnect.php';
	require_once 'includes/functions.php';

	//$session_check = session_check();

	// if ($session_check) {
	// 	header("Location: admin_login.php");
	// }

	//$users = row_count("users");
	//$places = row_count("places");
	//$booked = row_count("booked");
	//$requests = row_count("requests");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Places</title>

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
	<nav class="navbar navbar-default">

	  <div class="container-fluid">

	    <div class="navbar-header">
	      <a class="navbar-brand" href="#"></a>
	    </div>

	    <ul class="nav navbar-nav">
	      <li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	      <li><a href="admin_add.php"><span class="glyphicon glyphicon-plus"></span> Add</a></li>
	      <li class="active"><a href="admin_places.php"><span class="glyphicon glyphicon-map-marker"></span> Places</a></li>
	      <li><a href="admin_booked.php"><span class="glyphicon glyphicon-book"></span> Booked</a></li>
	      <li><a href="admin_requests.php"><span class="glyphicon glyphicon-download"></span> Requests</a></li>
	    </ul>

	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="logoff.php"><span class="glyphicon glyphicon-off"></span> Login Off</a></li>
    	</ul>

	  </div>

	</nav>

	<div>
		
	</div>
</body>
</html>