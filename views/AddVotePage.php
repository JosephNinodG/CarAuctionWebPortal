<!-- No direct access -->
<?php

	session_start();

	if (!isset($_SESSION['valid']) && !isset($_SESSION['username']) && !isset($_GET['lotnum'])) {
        
        header("Location: ../index.php");
		exit();
    }
    elseif (isset($_SESSION['valid']) && isset($_SESSION['adminname'])) {
        header("Location: AdminDashboardPage.php");
        exit();
    }
    
    $username = $_SESSION['username'];

    include("../scripts/connection.php");
    $lotnum = $conn->real_escape_string($_GET['lotnum']);

?>

<!DOCTYPE html> <!--Webportal a1.3-->
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Vote</title>
        <link rel="stylesheet" type="text/css" href="../css/GlobalSS.css">
        <link rel="stylesheet" type="text/css" href="../css/VotePageSS.css">
    </head>
    <body style="background-color: #262626;">
        <header></header>
        <div class="container">
        <?php if(isset($_GET['badpass'])){ echo "<div class='alert alert-danger' role='alert'>CAPTCHA completed incorrectly</div>";}?>
            <form class="loginform" method="POST" action="<?php echo "../scripts/add-vote.php?lotnum=".$lotnum."" ?>" onsubmit="return checkForm(this);>
                <table border="0" cellpadding="10" cellspacing="1" width="100%" class="formtable">
                    <tr class="tablerow">
                        <td colspan="2" class="tableheader">
                            <h2>Thank you for your vote!</h2>
                            </br>
                        </td>
                    </tr>
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
                            <button type='submit' class="btn btn-primary" id='votebttn'>Cast vote</button>
                        </p>
                    </tr>
                </table>
            </form>
        </div>
        <footer></footer>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>