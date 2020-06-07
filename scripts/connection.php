<?php
  $servername = "localhost";
  $username = "<yourusername>";
  $password = "<yourpassword>";
  $dbname = "<database name>";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
  	die("Connection failed: " . mysqli_connect_error());
  }
?>
