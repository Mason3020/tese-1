<?php
	require_once 'includes/session_start.php';
	require_once 'includes/dbconnect.php';
	require_once 'includes/functions.php';

	//$session_check = session_check();

	// if ($session_check) {
	// 	header("Location: admin_login.php");
	// }

	if (isset($_POST['register'])) {
		$username          = check_input($_POST['username']);
		$firstname         = check_input($_POST['firstname']);
		$surname           = check_input($_POST['surname']);	
		$uni               = check_input($_POST['uni']);
		$psw               = check_input($_POST['psw']);	
		$phone 		       = check_input($_POST['phone']);
		$email             = check_input($_POST['email']);	

		//print_r($_POST); die();

		$add_user = add_user($username,$firstname,$surname,$uni,$psw,$phone,$email);	

		if ($add_user == 0) {
			echo "<script>alert('Failed Registering')</script>";
		} else {
			echo "<script>alert('User Registered')</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- <link rel="stylesheet" type="text/css" href="css/style.css">-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

  	<!-- Latest compiled JavaScript -->
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <!-- <a class="navbar-brand" href="#">Home</a> -->
      </div>
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Help</a></li>
        <li><a href="search.php">Search</a></li>
        <li><a href="#">Sign Up</a></li>
        <li><a data-toggle="modal" href="#myModal">Login</a></li>
      </ul>
    </div>
  </nav>


	<form class="form-horizontal" action="" method="post" >
	<h2 style="text-align: center;">Register</h2>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="username">Username</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required="">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="firstname">Firstname:</label>
	    <div class="col-sm-8"> 
	      <input type="cost" class="form-control" id="firstname" name="firstname" placeholder="Enter Firstname" required="">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="surname">Surname:</label>
	    <div class="col-sm-8"> 
	      <input type="cost" class="form-control" id="surname" name="surname" placeholder="Enter Surname" required="">
	    </div>
	  </div>

	  <div class="form-group">
		<label class="control-label col-sm-2" for="uni">University:</label>
		<div class="col-sm-8">
		  <select class="form-control" id="uni" name="uni">
			  <option value="Africa University">Africa University</option>
			  <option value="Bindura University of Science Education">Bindura University of Science Education</option>
			  <option value="Catholic University in Zimbabwe">Catholic University in Zimbabwe</option>
			  <option value="Chinhoyi University of Technology">Chinhoyi University of Technology</option>
			  <option value="Great Zimbabwe University">Great Zimbabwe University</option>
			  <option value="Zimbabwe Open University">Zimbabwe Open University</option>
			  <option value="Zimbabwe Ezekiel Guti University">Zimbabwe Ezekiel Guti University</option>
			  <option value="Women's University in Africa">Womens University in Africa</option>
			  <option value="University of Zimbabwe">University of Zimbabwe</option>
			  <option value="Southern Africa Methodist University">Southern Africa Methodist University</option>
			  <option value="Manicaland University of Science and Technology">Manicaland University of Science and Technology</option>
			  <option value="Gwanda State University">Gwanda State University</option>
			  <option value="Harare Institute of Technology">Harare Institute of Technology</option>
			  <option value="Lupane State University">Lupane State University</option>
			  <option value="Marondera University of Applied Sciences">Marondera University of Applied Sciences</option>
			  <option value="National University of Science and Technology">National University of Science and Technology</option>
			  <option value="Midlands State University">Midlands State University</option>
			  <option value="National University of Technology">National University of Technology</option>
			  <option value="Reformed Church University">Reformed Church University</option>
			  <option value="Solusi University">Solusi University</option>
			 
		  </select>
		</div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="psw">Password:</label>
	    <div class="col-sm-8"> 
	      <input type="password" class="form-control" id="psw" name="psw" placeholder="Enter Password" required="">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="phone">Phone:</label>
	    <div class="col-sm-8"> 
	      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required="">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="email">Email:</label>
	    <div class="col-sm-8"> 
	      <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required="">
	    </div>
	  </div>

	  <div class="form-group"> 
	    <div class="col-sm-offset-5 col-sm-12">
	      <button type="submit" class="btn btn-default" name="register">Register</button>
	    </div>
	  </div>

	</form>
</body>
</html>