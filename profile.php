<?php 
	require_once 'includes/session_start.php';
	require_once 'includes/dbconnect.php';
	require_once 'includes/functions.php';

  $session_check = session_check();

  if ($session_check) {
    $user_online = 1;
    $user_id = $_SESSION['user_id'];
  } else {
    $user_online = 0;
  }

  if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $user_details = $connection->query("SELECT * FROM users WHERE user_id = '$user_id' ");

        while($user=$user_details->fetch_array()) {
          $firstname = $user['firstname'];
          $surname = $user['surname'];
          $uni = $user['uni'];
          $phone= $user['phone'];
          $email = $user['email'];
          $firstname = $user['username'];
          $name = $firstname.' '.$surname;
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>

  	<link rel="stylesheet" type="text/css" href="css/style.css">

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
        <li>
          <?php
            if ($user_online == 0) {
              echo "<a href='register.php'>Sign Up</a>";
            } else {
              echo "<a href='profile.php?user_id=$user_id'>Profile</a>";
            }
          ?>
        </li>
        <li>
          <?php
            if ($user_online == 0) {
              echo "<a href='login.php'>Login</a>";
            } else {
              echo "<a href='logoff.php'>Logout</a>";
            }
          ?>
        </li>
      </ul>
    </div>
  </nav>

  <h2 align="center">Your Profile</h2><br />
  
  <div class="container">
  <div class="row">
	  <div class="col-md-4 col-md-offset-4">
	  	<div class="thumbnail">
	    	<a href="#">
	           <img src="https://www.w3schools.com//w3images/lights.jpg" alt="Lights" style="width:100%">
	         </a>
	    </div>
	  </div>

  <div class="row">
  	<div class="col-md-4">
  		
  	</div>
  </div>

  <div class="row">
  	<div class="col-md-4 col-md-offset-4">
  		<p> Name: <?php echo $name; ?></p>
      <p> University: <?php echo $uni; ?></p>
      <p> Phone: <?php echo $phone; ?></p>
      <p> Email:<?php echo $email; ?></p>
  	</div>
  </div>

  <div class="row">
  	<div class="col-md-4">
  		<button class="btn btn-primary" id="editProfile">Edit Profile</button>
    </div>
  	
   <div class="col-md-4">
      <button class="btn btn-primary" id="saved">Saved</button> 
    </div>
   
  	<div class="col-md-4">
  		<button class="btn btn-primary" id="booked">Booked</button> 
  	</div>
  </div>

  <script>
    var btn = document.getElementById('editProfile');
    btn.addEventListener('click', function() {
      document.location.href = '<?php echo "edit_profile.php?user_id=$user_id"; ?>';
    });
  </script>

  <script>
    var btn = document.getElementById('booked');
    btn.addEventListener('click', function() {
      document.location.href = '<?php echo "booked.php?user_id=$user_id"; ?>';
    });
  </script>

  <script>
    var btn = document.getElementById('saved');
    btn.addEventListener('click', function() {
      document.location.href = '<?php echo "saved.php?user_id=$user_id"; ?>';
    });
  </script>

  </div>
</body>
</html>