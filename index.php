<?php 

	session_start();

    //if the user is logged in, then send them to the Webportal
	if (isset($_SESSION['valid']) && isset($_SESSION['username'])) {
        
        header("Location: views/WebPortal.php");
		exit();
    }//if an admin is logged in, then send them to the Admin dashboard
    elseif (isset($_SESSION['valid']) && isset($_SESSION['adminname'])) {
        header("Location: views/AdminDashboardPage.php");
        exit();
    }

?>

<!DOCTYPE html> <!--Webportal a1.3-->
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/GlobalSS.css">
    <link rel="stylesheet" type="text/css" href="css/SignPageSS.css">
</head>
<body style="background-color: #262626;">
    <header></header>
    <div class="container">
    <?php if(isset($_GET['badpass'])){echo "<div class='alert alert-danger' role='alert'>Incorrect login information provided</div>";}?>
        <form action='scripts/login.php' method='POST' class="loginform">
            <div class="form-group">
                <label for="username" class="labelstyle">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username"> 
                <!-- change to type="email" -->
            </div>
            <div class="form-group">
                <label for="password" class="labelstyle">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type='submit' name="login" class="btn btn-primary" id='formbutton'>Login</button>
        </form>
        <div class="bttncontainer">
            <a href="views/SignUpPage.php">
                <button type='submit' class="btn btn-primary" id='formbutton'>Sign up</button>
            </a>
        </div>
    </div>
    <footer></footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>