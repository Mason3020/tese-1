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
  <title>Place View</title>

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

<div class="container">
  <h2 align="center">Your Saved Places</h2> </br>                                                 
  <table class="table">
    <thead>
      <tr>
        <th>Street</th>
        <th>Location</th>
        <th>City</th>
        <th>Cost</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Anna</td>
        <td>1</td>
        <td>Anna</td>
        <td>1</td>
        <td><a href="">Remove </a> <a href=""> Remove</a></td>
      </tr>
    </tbody>
  </table>
</div>

  
</body>

</html>