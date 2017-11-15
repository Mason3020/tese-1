<?php
	require_once 'includes/session_start.php';
	require_once 'includes/dbconnect.php';
	require_once 'includes/functions.php';

	//$session_check = session_check();

	// if ($session_check) {
	// 	header("Location: admin_login.php");
	// }

	if (isset($_POST['add_place'])) {
		$street           = check_input($_POST['street']);
		$location         = check_input($_POST['location']);
		$uni              = check_input($_POST['uni']);	
		$city             = check_input($_POST['city']);
		$cost             = check_input($_POST['cost']);	
		$amenities 		  = check_input($_POST['amenities']);
		$description      = check_input($_POST['description']);	

		//print_r($_POST); die();

		$add_place = add_place($street,$location,$uni,$city,$cost,$amenities,$description);	

		if ($add_place == 0) {
			echo "<script>alert('Failed adding place')</script>";
		} else {
			echo "<script>alert('Place Added $add_place')</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>

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
	<nav class="navbar navbar-default">

	  <div class="container-fluid">

	    <div class="navbar-header">
	      <a class="navbar-brand" href="#"></a>
	    </div>

	    <ul class="nav navbar-nav">
	      <li><a href="admin_panel.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	      <li class="active"><a href="admin_add.php"><span class="glyphicon glyphicon-plus"></span> Add</a></li>
	      <li><a href="admin_places.php"><span class="glyphicon glyphicon-map-marker"></span> Places</a></li>
	      <li><a href="admin_booked.php"><span class="glyphicon glyphicon-book"></span> Booked</a></li>
	      <li><a href="admin_requests.php"><span class="glyphicon glyphicon-download"></span> Requests</a></li>
	    </ul>

	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="logoff.php"><span class="glyphicon glyphicon-off"></span> Login Off</a></li>
    	</ul>

	  </div>

	</nav>	

	<form class="form-horizontal" action="" method="post" >

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="street">Street:</label>
	    <div class="col-sm-8">
	      <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street" required="">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="location">Location:</label>
	    <div class="col-sm-8"> 
	      <input type="cost" class="form-control" id="location" name="location" placeholder="Enter Location" required="">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="city">City:</label>
	    <div class="col-sm-8"> 
	      <input type="cost" class="form-control" id="city" name="city" placeholder="Enter City" required="">
	    </div>
	  </div>

	  <div class="form-group">
		<label class="control-label col-sm-2" for="decription">University:</label>
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
	    <label class="control-label col-sm-2" for="cost">Cost:</label>
	    <div class="col-sm-8"> 
	      <input type="cost" class="form-control" id="cost" name="cost" placeholder="Enter Cost $" required="">
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="amenities">Amenities:</label>
	    <div class="col-sm-8"> 
	      <input type="cost" class="form-control" id="amenities" name="amenities" placeholder="Enter Amenities(Separate Them With Commas!)" required="">
	    </div>
	  </div>

	  <div class="form-group">
		<label class="control-label col-sm-2" for="decription">Description:</label>
		<div class="col-sm-8">
		  <textarea class="form-control" rows="5" id="description" name="description" placeholder="Enter Place Description"></textarea required="">
		</div>
	  </div>

	  <div class="form-group"> 
	    <div class="col-sm-offset-5 col-sm-12">
	      <button type="submit" class="btn btn-default" name="add_place">Add Place</button>
	    </div>
	  </div>

	</form>
</body>
</html>