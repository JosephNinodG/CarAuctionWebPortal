<?php

  $servername = "katara.scam.keele.ac.uk";
  $username = "w4c83";
  $password = "w4c83w4c83";
  $dbname = "w4c83";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
  	die("Connection failed: " . mysqli_connect_error());
  }
?>
