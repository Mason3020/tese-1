<?php
	require_once 'includes/session_start.php';
	require_once 'includes/dbconnect.php';
	require_once 'includes/functions.php';

	if (isset($_POST['place_id'])) {
		$place_id = $_POST['place_id'];
		$user_id = $_POST['user_id'];

		$query = $connection->query("INSERT INTO saved(house_id,user_id) VALUES ('$place_id','$user_id')");
	}
?>