<?php

	session_start();

	if (!isset($_SESSION['valid']) && !isset($_SESSION['adminname'])) {
		header("Location: ../index.php");
		exit();
    }
    elseif (isset($_SESSION['valid']) && isset($_SESSION['username'])) {
        
        header("Location: ../views/WebPortal.php");
		exit();
    }
    
    $username = $_SESSION['adminname'];

?>

<!DOCTYPE html> <!--Webportal a1.3-->
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage profiles</title>
    <link rel="stylesheet" type="text/css" href="../css/GlobalSS.css">
    <link rel="stylesheet" type="text/css" href="../css/AdminManagerSS.css">
</head>
<body>
<header>
    <div class="backbttncontainer">
        <a href="AdminDashboardPage.php">
            <button type='submit' class="btn btn-primary" id="backbttn">Back to dashboard</button>
        </a>
    </div>
</header>
    <div class="banner"></div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                    <div class="navbar">
                        <div class="additem">
                            <h4>Add an Admin to the database</h4>
                            <a href="../scripts/form-newuser.php">
                                <button type='submit' class="newuserbttn">New admin</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                    <div class="itemslist">
                    <?php
                        include("../scripts/connection.php");
                        
                        $query = "SELECT * FROM adminuser";

                        $result = mysqli_query($conn, $query);
                        
                        if($result){

                            ?>

                            <table border="1" id=listtable>
                                <tr><th>Fullname</th><th>Adminname</th><th>Password</th><th>Options</th></tr>
                                <?php

                                while($row = mysqli_fetch_assoc($result)) {
                                    $fullname = $row['fullname'];
                                    $adminname = $row['adminname'];
                                    $adminpass = $row['adminpass'];                                    
                                    echo("<tr><td>$fullname</td><td>$adminname</td><td>$adminpass</td><td><a class='delete' href='../scripts/delete.php?adminname=".$adminname."'>Delete </td></tr>");
                                
                                    //<td><a href='edit-form.php?usercode=".$usercode."'>Edit</a> | <a class='deletestaff' href='delete.php?usercode=".$usercode."'>Delete </td>
                                }
                                    
                                mysqli_close($conn);

                                ?>
                            </table>
                        <?php
                        }else{
                            echo "Unable to connect to make query: ".mysqli_error($conn);
                        }
                        ?>
                    </div>
                    <div style="height:20px;"></div>
                    <div class="itemslist">
                    <?php
                        include("../scripts/connection.php");
                        
                        $query = "SELECT * FROM users";

                        $result = mysqli_query($conn, $query);
                        
                        if($result){

                            ?>

                            <table border="1" id=listtable>
                                <tr><th>Fullname</th><th>Username</th><th>Number of votes</th><th>Number of comments</th><th>Options</th></tr>
                                <?php

                                while($row = mysqli_fetch_assoc($result)) {
                                    $fullname = $row['fullname'];
                                    $username = $row['username'];
                                    $userpass = $row['userpass'];
                                    $votes = $row['votes'];
                                    $comments = $row['comments'];                                    
                                    echo("<tr><td>$fullname</td><td>$username</td><td>$votes</td><td>$comments</td><td><a href='../scripts/form-edituser.php?username=".$username."'>Edit</a> | <a class='delete' href='../scripts/delete.php?username=".$username."'>Delete </td></tr>");
                                
                                    //<td><a href='edit-form.php?usercode=".$usercode."'>Edit</a> | <a class='deletestaff' href='delete.php?usercode=".$usercode."'>Delete </td>
                                }
                                    
                                mysqli_close($conn);

                                ?>
                            </table>
                        <?php
		                }else{
			                echo "Unable to connect to make query: ".mysqli_error($conn);
		                }
		                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>