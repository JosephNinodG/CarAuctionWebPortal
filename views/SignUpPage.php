<?php

	session_start();
    //if the user is logged in, then send them to the Webportal
	if (isset($_SESSION['valid']) && isset($_SESSION['username'])) {
        
        header("Location: WebPortal.php");
		exit();
    }//if an admin is logged in, then send them to the Admin dashboard
    elseif (isset($_SESSION['valid']) && isset($_SESSION['adminname'])) {
        header("Location: AdminDashboardPage.php");
        exit();
    }

?>

<!DOCTYPE html> <!--Webportal a1.3-->
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="../css/GlobalSS.css">
    <link rel="stylesheet" type="text/css" href="../css/SignPageSS.css">
</head>
<body style="background-color:#262626">
    <header></header>
    <div class="container">
        <div class="signuptext">
            <h3>Thank you for choosing to sign up to the car auction web portal.</h3>
            <p style="color:lightgray">
                With an account you can see your total number of votes as well as comment on your favourite cars on the list.
                Just fill out the form below and you can start enjoying the car auction web portal to its full potential!
            </p>
        </div>
        <?php if(isset($_GET['badpass'])){  //badpass value provided through url 
            $badpass = $_GET['badpass'];
            if($badpass==1){
                echo "<div class='alert alert-danger' role='alert'>CAPTCHA completed incorrectly</div>";
            }
            elseif($badpass==2){
                echo "<div class='alert alert-danger' role='alert'>Sign up details completed incorrectly</div>";
            }            
        }?>
        <form action='../scripts/signup.php' method='post' class="signupform">
            <div class="form-group">
                <label for="fullname" class="labelstyle">Full name</label>
                <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Full name"> 
            </div>
            <div class="form-group">
                <label for="username" class="labelstyle">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username"> 
                <!-- change to type="email" -->
            </div>
            <div class="form-group">
                <label for="password" class="labelstyle">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class=captchacontainer>
                <table border="0" cellpadding="10" cellspacing="1" width="100%" class="formtable">
                    <tr class="tablerow">
                        <p id="captchacon">
                            <img id="captcha" src="../scripts/captcha.php" border="1" alt="CAPTCHA">
                        </p>
                        <p>
                            <small> 
                                <a href="#" onclick="
                                    document.getElementById('captcha').src = '../scripts/captcha.php?' + Math.random();
                                    document.getElementById('captcha_code_input').value = '';
                                    return false;
                                ">Refresh CAPTCHA</a>
                            </small>
                        </p>
                    </tr>
                    <tr>
                        <p>
                            <input id="captcha_code_input" type="text" name="captcha" maxlength="5" placeholder="Enter digits from image" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');">
                            <!-- <button type='submit' class="btn btn-primary" id='votebttn'>Cast vote</button> -->
                        </p>
                    </tr>
                </table>
            </div>
            <button type='submit' class="btn btn-primary" id='formbutton'>Sign up</button>
        </form>
    </div>
    <footer></footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>