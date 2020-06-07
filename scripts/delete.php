<?php
    include("connection.php");
    
    if(isset($_GET['adminname'])){
        $adminname = $_GET['adminname'];
        $query = "DELETE FROM adminuser WHERE adminname = '$adminname'";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        header("Location: ../views/AdminProfilesPage.php");
    }
    elseif(isset($_GET['username'])){
        $username = $_GET['username'];
        $query = "DELETE FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        header("Location: ../views/AdminProfilesPage.php");
    }
    elseif(isset($_GET['lotnum']) && isset($_GET['imagefilename'])){
        $lotnum = $_GET['lotnum'];
        $imagefilename = $_GET['imagefilename'];
        unlink($imagefilename);
        $query = "DELETE FROM potwCars WHERE lotnum = '$lotnum'";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        header("Location: ../views/AdminCarsPage.php");
    }
    elseif(isset($_GET['commentID'])){
        $commentID = $_GET['commentID'];
        $query = "DELETE FROM carcomments WHERE commentID = '$commentID'";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);
        header("Location: ../views/AdminCommentsPage.php");
    }
  
  exit();

?>