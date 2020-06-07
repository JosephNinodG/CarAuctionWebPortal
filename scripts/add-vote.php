<?php

    session_start();

    include("connection.php");
        
    $lotnum = $conn->real_escape_string($_GET['lotnum']);

    if($_POST && "all required variables are present") {

        if($_POST['captcha'] != $_SESSION['digit']){
            header("Location: ../views/AddVotePage.php?badpass=1&lotnum=".$lotnum."");
        }
        else{
            $username = $_SESSION['username'];
        
            $query = "UPDATE potwCars SET votenum = votenum + 1 WHERE lotnum = '$lotnum'";
            $result = mysqli_query($conn, $query);
            if ($result){
                $query = "UPDATE users SET votes = votes + 1 WHERE username = '$username'";
                $result = mysqli_query($conn, $query);
                if ($result){
                    header("Location: ../views/WebPortal.php");
                }
                else{
                    echo "Error when increasing user vote: ".mysqli_error($conn);
                }
            }
            else{
                echo "Error when casting vote: ".mysqli_error($conn);
            }
        }
    

    }
    
?>