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


	if (isset($_POST['login'])) {
		$username = $_POST['uname'];
		$password = $_POST['psw'];		
	}

	if (isset($_GET['places_id'])) {
		$selected_place = $_GET['places_id'];

		$place_details = $connection->query("SELECT * FROM places WHERE place_id = '$selected_place' ");

        while($place=$place_details->fetch_array()) {
          $amenities = $place['amenities'];
          $location = $place['location'].", ".$place['city'];
          $description = $place['description'];
          $place_id = $place['place_id'];
		    }
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

  <h2 align="center"><?php echo $location; ?></h2><br />
  
  <div class="container">
  <div class="row">
	  <div class="col-md-4">
	  	<div class="thumbnail">
	    	<a href="#">
	           <img src="images/default.jpg" alt="Home" style="width:100%">
	         </a>
	    </div>
	  </div>

	  <div class="col-md-4">
	  	<div class="thumbnail">
	    	<a href="#">
	           <img src="images/default.jpg" alt="Home" style="width:100%">
	         </a>
	    </div>
	  </div>

	  <div class="col-md-4">
	  	<div class="thumbnail">
	    	<a href="#">
	           <img src="images/default.jpg" alt="Home" style="width:100%">
	         </a>
	    </div>
	  </div>
  </div>

  <div class="row">
  	<div class="col-md-4">
  		
  	</div>
  </div>

  <div class="row">
  	<h2 style="text-align: center;">Description</h2>
  	<div class="col-md-8 col-md-offset-2">
  		<p><?php echo $description; ?></p>
  	</div>
  </div>

  <div class="row">
  	<h2 style="text-align: center;">Amenities</h2>
  	<div class="col-md-8 col-md-offset-2">
  		<p><?php echo $amenities; ?></p>
  	</div>
  </div>

   <div class="row">
  	<div class="col-md-2 col-md-offset-2">

    <?php
        $booked_status = $connection->query("SELECT * FROM booked WHERE house_id = '$place_id' ");
        $row = $booked_status->fetch_array(); 

        $count = $booked_status->num_rows; // If username/psw are correct a single row must be returned

        if ($count == 1) {
            echo "
                <button class='btn btn-primary' id='booked'>Booked</button>
            ";
        } else {
            echo "
                <button class='btn btn-primary' id='book'>Book</button>
            ";           
        }

    ?>

  	</div>

    <div class="col-md-2 col-md-offset-4">

    <?php
        $saved_status = $connection->query("SELECT * FROM saved WHERE house_id = '$place_id' ");
        $row = $saved_status->fetch_array(); 

        $count = $saved_status->num_rows; // If username/psw are correct a single row must be returned

        if ($count == 1) {
            echo "
                <button class='btn btn-primary' id='booked'>Saved</button>
            ";
        } else {
            echo "
                <button class='btn btn-primary' id='save'>Save</button>
            ";           
        }
    ?>

    </div>

  </div>

  </div>
</body>

<script>

  $(document).ready(function(){

   function book() {
      $.ajax({
       url:"book_ajax.php",
       method:"POST",
       data:{place_id: <?php echo $place_id; ?> , user_id: <?php echo $user_id; ?>},
       success:function(data)
       {
        //$('#result').html(data);
       }
      });
   }

    function save() {
      $.ajax({
       url:"save_ajax.php",
       method:"POST",
       data:{place_id: <?php echo $place_id; ?> , user_id: <?php echo $user_id; ?>},
       success:function(data)
       {
        //$('#result').html(data);
       }
      });
    }

    $('#book').click(function() {
        book();
        $(this).html('Booked'); 
        $(this).attr('disabled', true); 
    });

    $('#save').click(function() {
        save();
        $(this).html('Saved'); 
        $(this).attr('disabled', true); 
    });
  });
</script>
</html>