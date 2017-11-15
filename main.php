<?php
  require_once 'includes/session_start.php';
  require_once 'includes/dbconnect.php';
  require_once 'includes/functions.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Explore</title>
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
        <li><a href="#">Login</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h2>Tese</h2>
    <h1>Find Places In Your University<br/> Location.</h1>

    <!-- Unis Data Loop -->
    <?php
      $res = $connection->query("SELECT uni_name FROM unilist ORDER BY RAND() Limit 5");
      while($row=$res->fetch_array())
      {
        //echo $row['uni_name'] . "<br>";
        $uni_name  = $row['uni_name'];
        $uni_image = "";
        $uni_location = "";

    ?>    

    <!-- University Title -->
    <div class="row">
      <div class="col-md-10">
        <h3><?php echo $row['uni_name'] ?></h3>
      </div>

    </div>
    <!-- /.University Title -->
        <!-- Universities -->
    <div class="row">
    <!-- Uni Image And Location -->
    <?php 
        $uni_places_list = $connection->query("SELECT * FROM places WHERE uni = '$uni_name' ORDER BY RAND() LIMIT 3");

        while($places=$uni_places_list->fetch_array()) {
          $uni_image = $places['uni_image'];
          $uni_location = $places['location'].", ".$places['city'];
          $uni_id = $places['place_id'];
        
    ?>
      <div class="col-md-4">
        <div class="thumbnail">
          <a href="place_view.php">
            <img src="https://www.w3schools.com//w3images/lights.jpg" alt="Lights" style="width:100%">
            <div class="caption">
              <p><?php echo $uni_location ?></p>
            </div>
          </a>
        </div>
      </div>
    <?php
      }
    ?>
    <!-- /.Uni Image And Location -->
    </div>

    <?php 
        }
    ?>
    <!-- /.Universities -->
  </div>

</body>
</html>