<?php 

session_start();

include("connection.php");

$lotnum = $conn->real_escape_string($_GET['lotnum']);

if($_POST && "all required variables are present") {

    if($_POST['captcha'] != $_SESSION['digit']){
        header("Location: ../views/CarDetailsPage.php?badpass=1&lotnum=".$lotnum."");
    }
    else{

        $comment = $_POST['commentinput'];

        if (!empty($comment) && ($comment != "write a comment... (MAX 200 Characters)")){
            $username = $_SESSION['username'];
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $query);

            if ($result){

                while($row = mysqli_fetch_assoc($result)){
                    $userID = $row['userID'];
                    $username = $row['username'];
                }

                if (!empty($userID)){

                    $lotnum = $conn->real_escape_string($_GET['lotnum']);
                    $query = "SELECT * FROM potwCars WHERE lotnum = '$lotnum'";
                    $result = mysqli_query($conn, $query);
                    if ($result){

                        while($row = mysqli_fetch_assoc($result)){
                            $carID = $row['carID'];
                            $lotnum = $row['lotnum'];
                        }

                        if (!empty($carID)){

                            $query = "INSERT INTO carcomments(comment,userID,carID) VALUES ('$comment','$userID','$carID')";
                            $result = mysqli_query($conn, $query);

                            if ($result){

                                header("Location: ../views/CarDetailsPage.php?lotnum=".$lotnum."");

                            }
                            else{
                                echo "Error posting comment: ".mysqli_error($conn);
                                header("Location: ../views/CarDetailsPage.php?badpass=5&lotnum=".$lotnum."");
                            }
                        }
                        else {
                            header("Location: ../views/CarDetailsPage.php?badpass=4&lotnum=".$lotnum."");
                        }
                    }
                    else{
                        echo "Error accessing car: ".mysqli_error($conn);
                    }
                }
                else {
                    header("Location: ../views/CarDetailsPage.php?badpass=3&lotnum=".$lotnum."");
                }
            }
            else{
                echo "Error accessing user: ".mysqli_error($conn);
            }
        }
        else{
            header("Location: ../views/CarDetailsPage.php?badpass=2&lotnum=".$lotnum."");
        }

    }

}

?>