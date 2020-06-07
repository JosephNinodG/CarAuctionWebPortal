<?php

include("connection.php");

$fullname = $_POST['fullname'];
$adminname = $_POST['adminname'];
$adminpass = $_POST['adminpass'];

if (!empty($fullname && $adminname && $adminpass)){

    $check = "SELECT * FROM adminuser WHERE adminname = '$adminname'";
    $result = mysqli_query($conn, $check);

    if ($result) {

        $data = mysqli_num_rows($result);

        if($data == 0) {
            
            $votes = 0;
            $comments = 0;
            $query = "INSERT INTO adminuser(fullname,adminname,adminpass) VALUES ('$fullname','$adminname','$adminpass')";
            $result = mysqli_query($conn, $query);
            if ($result) {

                header("Location: ../views/AdminProfilesPage.php");
                
            }else{
                echo "Error when adding new admin: ".mysqli_error($conn);
            }

        }
        else{
            echo "Adminname already exists";
        }

    }else{

        echo "Unable to connect to make query: ".mysqli_error($conn);

    }
}
else{
    header("Location: form-newuser.php");
}

?>

<html lang="en">
	<head>
		<title>Admin add</title>
	</head>
	<body>
		<h2>Adding admin</h2>

		<p><a href="../views/AdminProfilesPage.php">Return to profile list</a></p>

	</body>
</html>
<?php
	mysqli_close($conn);
?>