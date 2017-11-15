<?php 
    require_once 'includes/session_start.php';
    require_once 'includes/dbconnect.php';
    require_once 'includes/functions.php';	
	//place search
	$output = "";

	if (isset($_POST["query"])) {
		$search = $_POST["query"];	
	} else {
		die();
	}
	$result = $connection->query("SELECT * FROM places WHERE uni LIKE '%".$search."%'");
	if (mysqli_num_rows($result) > 0) {

	 $output .= '
		 <div class="table-responsive">
		   <table class="table table bordered">
		    <tr>
		    	<th>Street</th>
		     	<th>Location</th>
		     	<th>City</th>
		   		<th>Cost</th>
		   		<th>University</th>
		   		<th>Action<th>
		    </tr>
		 ';
 	while($row = mysqli_fetch_array($result)) {
  		$output .= '
	   	<tr>
		    <td>'.$row["street"].'</td>
		    <td>'.$row["location"].'</td>
		    <td>'.$row["city"].'</td>
		    <td>'."$".$row["cost"].'</td>
		    <td>'.$row['uni'].'</td>
		    <td><a href="place_view.php?place_id='.$row["place_id"].'">View</a></td>
	   </tr>
	  ';
	 }
 
 echo $output;
	} else {
		 echo 'Data Not Found';
	}

?>