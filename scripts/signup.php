<?php

session_start();

include("connection.php");

if($_POST && "all required variables are present") {

    if($_POST['captcha'] != $_SESSION['digit']){
        header("Location: ../views/SignUpPage.php?badpass=1");
    }
    else{

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $userpass = $_POST['password'];

        if (!empty($fullname && $username && $userpass)){

            $check = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $check);

            if ($result) {

                $data = mysqli_num_rows($result);

                if($data == 0) {
                    
                    $votes = 0;
                    $comments = 0;
                    $query = "INSERT INTO users(fullname,username,userpass,votes,comments) VALUES ('$fullname','$username','$userpass','$votes','$comments')";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        
                        session_start();
                        $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['username'] = $username;
                        header("Location: ../views/WebPortal.php");
                        
                    }else{
                        echo "Error when adding user: ".mysqli_error($conn);
                    }

                }
                else{
                    echo "Username already exists";
                }

            }else{

                echo "Unable to connect to make query: ".mysqli_error($conn);

            }
        }
        else{
            header("Location: ../views/SignUpPage.php?badpass=2");
        }

    }

}

?>

<html lang="en">
	<head>
		<title>User add</title>
	</head>
	<body>
		<h2>Adding User</h2>

		<p><a href="../views/SignUpPage.php">Return to Sign up page</a></p>

	</body>
</html>
<?php
	mysqli_close($conn);
?>