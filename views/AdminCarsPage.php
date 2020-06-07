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
    <title>Manage Cars</title>
    <link rel="stylesheet" type="text/css" href="../css/GlobalSS.css">
    <link rel="stylesheet" type="text/css" href="../css/AdminManagerSS.css">
</head>
<body onload="sortTable('asc', false);">
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
                            <h4>Add a car to the database</h4>
                            <p>Database cannot exceed 12 cars</p>
                            <a href="../scripts/form-newcar.php">
                                <button type='submit' class="newcarbttn">New car</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
                    <div class="itemslist">
                    <?php
                        include("../scripts/connection.php");
                        
                        $query = "SELECT * FROM potwCars";

                        $result = mysqli_query($conn, $query);
                        
                        if($result){

                            ?>

                            <table border="1" id=listtable>
                                <tr><th>Lot Number</th><th>Car make</th><th>Car model</th><th>Price(£)</th><th>Auction Status</th><th>Number of votes</th><th>Options</th></tr>
                                <?php

                                while($row = mysqli_fetch_assoc($result)) {
                                    $lotnum = $row['lotnum'];
                                    $make = $row['make'];
                                    $model = $row['model'];
                                    $price = $row['price'];
                                    $aucstatus = $row['aucstatus'];
                                    $votenum = $row['votenum'];
                                    $imagefilename = $row['imagefilename'];                                    
                                    echo("<tr><td>$lotnum</td><td>$make</td><td>$model</td><td>$price</td><td>$aucstatus</td><td>$votenum</td><td><a class='deletecar' href='../scripts/delete.php?lotnum=".$lotnum."&imagefilename=".$imagefilename."'>Delete </td></tr>");
                                
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
    <script src="../scripts/sortTable.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>