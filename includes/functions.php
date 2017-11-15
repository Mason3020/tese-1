<?php
	//Checking if the user is logged in

	function session_check() {
		if (isset($_SESSION['user_id']) && $_SESSION['logged_in'] == 1 && $_SESSION['user_id'] != "" && is_numeric($_SESSION['user_id'])) {
			return true;
		}
	}

	//Data validations

	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//Admin login

	function admin_login($username,$psw) {
		global $connection;
		$query = $connection->query("SELECT admin_id, username, psw FROM admins WHERE username = '$username'");
		$row = $query->fetch_array(); 

		$count = $query->num_rows; // If username/psw are correct a single row must be returned
		if ($count == 1 && $psw == $row['psw']) {
			return $row['admin_id'];
		} else {
			return false;
		}

	}

	//Admin login

	function users_login($username,$psw) {
		global $connection;
		$query = $connection->query("SELECT user_id, username, psw FROM users WHERE username = '$username'");
		$row = $query->fetch_array(); 

		$count = $query->num_rows; // If username/psw are correct a single row must be returned
		if ($count == 1 && $psw == $row['psw']) {
			return $row['user_id'];
		} else {
			return false;
		}

	}

	//Add place

	function add_place($street,$location,$uni,$city,$cost,$amenities,$description) {
		global $connection;
		$query = "INSERT INTO places(street,location,uni,city,cost,amenities,description) VALUES ('$street','$location','$uni','$city','$cost','$amenities','$description')";

		if ($connection->query($query)) {
			$last_id = $connection->insert_id;
			return $last_id;
		} else {
			echo("Error description: " . mysqli_error($connection)); die();
		}
	}

		function add_user($username,$firstname,$surname,$uni,$psw,$phone,$email) {
		global $connection;
		$query = "INSERT INTO users(username,firstname,surname,uni,psw,phone,email) VALUES ('$username','$firstname','$surname','$uni','$psw','$phone','$email')";

		if ($connection->query($query)) {
			$last_id = $connection->insert_id;
			return $last_id;
		} else {
			echo("Error description: " . mysqli_error($connection)); die();
		}
	}


?>