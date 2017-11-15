<?php

  $response = array();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  	  require_once '../includes/session_start.php';
  	  require_once '../includes/dbconnect.php';
      require_once '../includes/functions.php';

      $res = $connection->query("SELECT * FROM places");

      $i = 1;
      while($row=$res->fetch_array())
      {
      	$response[$i] = $row['street'];
      	$i++;
      }

      print_r($response); die();

      echo json_encode($reponse);
  }

?>