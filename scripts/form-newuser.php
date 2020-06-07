<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add admin</title>
  </head>
  <body>
    <h2>Add admin to database</h2>

          Please fill out ALL details below:

          <form method="POST" action="add-admin.php">
            <p>Fullname:<br>
            <input type="text" name="fullname" maxlength="40"/></p>
            <p>Adminname:<br>
            <input type="text" name="adminname" maxlength="20"/></p>
            <p>Password:<br>
            <input type="text" name="adminpass" maxlength="40"/></p>
            <p><input type="submit" name="submit" value="Add admin" /></p>
          </form>


  </body>
</html>
