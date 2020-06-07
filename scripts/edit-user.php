<!DOCTYPE html>
<?php
	include("connection.php");
	
  $fullname  = $_POST['fullname'];
  $username = $_POST['username'];
	$userpass = $_POST['userpass'];


	$query = "UPDATE users SET fullname = ' $fullname', userpass = '$userpass' WHERE username = '$username'";
	
	$result = mysqli_query($conn, $query);

	mysqli_close($conn);

?>
<html lang="en">
  <head>
    <title>Edit user</title>
  </head>
  <body>
    <h2>User update</h2>

    <p>The user details were successfully updated.</p>
    <p><a href="../views/AdminProfilesPage.php">Return to list of profiles</a></p>

  </body>
</html>
