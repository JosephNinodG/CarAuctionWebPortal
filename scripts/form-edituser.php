<!DOCTYPE html>
<?php

	include("connection.php");

	$username = $conn->real_escape_string($_GET['username']);

	$query = "SELECT * FROM users WHERE username='".$username."'";
	$result = mysqli_query($conn, $query);

	while($row = mysqli_fetch_assoc($result)) {
    $fullname = $row['fullname'];
    $username = $row['username'];
    $userpass = $row['userpass'];
	}

	mysqli_close($conn);

?>

<html lang="en">
  <head>
    <title>Edit user</title>
  </head>
  <body>
    <h2>Edit user details</h2>

    Enter new user details below...
    <form method="POST" action="edit-user.php">
      <p>Fullname:<br>
      <input type="text" name="fullname" value="<?php echo($fullname);?>" /></p>
      <p>Username:<br>
      <input type="text" name="username" value="<?php echo($username);?>" readonly /></p>
      <p>Password:<br>
      <input type="text" name="userpass" value="<?php echo($userpass);?>" /></p>
      <p><input type="submit" value="Edit User" /></p>
    </form>

  </body>
</html>
