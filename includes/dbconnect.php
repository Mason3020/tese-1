<?php
	define('DB_USERNAME', 'root');
	define('DB_PSW', '');
	define('DB_HOST', 'localhost');
	define('DB_NAME', 'tese');

	$connection = new mysqli(DB_HOST, DB_USERNAME, DB_PSW, DB_NAME);

	//check for database connection error 

	if (mysqli_connect_errno()) {
		echo "Failed ". mysqli_connect_error();
	}
?>