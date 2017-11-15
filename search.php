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

?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />	  
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
  <div class="container">
	   <br />
	   <h2 align="center">Search For Places</h2><br />
	   <div class="form-group">
	    <div class="input-group">
	     <span class="input-group-addon">Search</span>
	     <input type="text" name="search_text" id="search_text" placeholder="Enter University Name" class="form-control" />
	    </div>
	   </div>
	   <br />
	   <div id="result"></div>
  </div>

  <script>
	$(document).ready(function(){

	 load_data();

	 function load_data(query) {
		  $.ajax({
		   url:"place_search.php",
		   method:"POST",
		   data:{query:query},
		   success:function(data)
		   {
		    $('#result').html(data);
		   }
		  });
	 }

	 $('#search_text').keyup(function(){
	  var search = $(this).val();
	  if(search != '') {
	  	load_data(search);
	  } else {
	   load_data();
	  }
	 });

	});

  </script>

</body>
</html>