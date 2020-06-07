<!-- No direct access -->
<?php

	session_start();
//if the user isnt logged in, then send them to the login page
	if (!isset($_SESSION['valid']) && !isset($_SESSION['username'])) {
        
        header("Location: ../index.php");
		exit();
    }//if an admin is logged in, then send them to the Admin dashboard
    elseif (isset($_SESSION['valid']) && isset($_SESSION['adminname'])) {
        header("Location: AdminDashboardPage.php");
        exit();
    }
    
    $username = $_SESSION['username'];

?>

<!DOCTYPE html> <!--Webportal a1.3-->
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Web portal</title>
    <link rel="stylesheet" type="text/css" href="../css/GlobalSS.css">
    <link rel="stylesheet" type="text/css" href="../css/WebPortalSS.css">
</head>
<body onload="getSeconds()">
    <header>
        <div class="textarea">
            <h3 class="titletop">Welcome,</h3> 
        </div>
        <div class="usernamecontainer">
            <h3 class="titletop"><?php echo $username; ?></h3>
        </div>        
        <div class="bttncontainer">
            <a href="../scripts/logout.php">
                <button type='submit' class="btn btn-primary">Logout</button>
            </a>
        </div>
    </header>
    <div class="banner">
        <div class="banleft"><p>Time until next auction: </p></div>
        <div class="banright">
            <p id="timer"></p>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">

        <?php

        include("../scripts/connection.php");
                                
        $query = "SELECT * FROM potwCars";

        $result = mysqli_query($conn, $query);

        if($result){

            for ($x = 0; $x <= 5; $x++) {

                echo  '<div class="row">';

                for ($i = 0; $i <= 1; $i++) {

                    $row = mysqli_fetch_assoc($result);

                    $lotnum = $row['lotnum'];
                    $make = $row['make'];
                    $model = $row['model'];
                    $price = $row['price'];
                    $aucstatus = $row['aucstatus'];
                    $votenum = $row['votenum'];
                    $imagefilename = $row['imagefilename'];
                    $engsize = $row['engsize'];
                    $transmission = $row['transmission'];
                    $vehtype = $row['vehtype'];
                    $fueltype = $row['fueltype'];
                    $doornum = $row['doornum'];
                    $seatnum = $row['seatnum'];  
                    
                    if ($aucstatus == "NS"){
                        $aucstatus = "Not Sold";
                    }
                    elseif ($aucstatus == "S"){
                        $aucstatus = "Sold";
                    }

                    ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <div class="carinfocontainer">
                                <div class="lotnumcontainer">
                                    <?php echo "LOT NUMBER: " . $lotnum; ?>
                                </div>
                                <div class="makemodelcontainer">
                                    <?php 
                                        echo $make;
                                        echo " | ";
                                        echo $model;
                                    ?>
                                </div>
                                <div class="carprice">
                                    <?php echo "PRICE: £" . $price; ?>
                                </div>
                            </div>
                            <div class="carcontainer">
                                <div class="leftblock">
                                    <div class="carimagecontainer">
                                        <img src="<?php echo $imagefilename; ?>" alt="Image" class="carimage">
                                    </div>
                                </div>
                                <div class="centerblock">
                                    <div class="cardetails">
                                        <table class="detailstable">
                                            <tr>
                                                <td style="border: 1px solid black;"><?php echo $engsize; ?></td>
                                                <td style="border: 1px solid black;"><?php echo $transmission; ?></td>
                                                <td style="border: 1px solid black;"><?php echo $vehtype; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid black;"><?php echo $fueltype; ?></td>
                                                <td style="border: 1px solid black;"><?php echo $doornum; ?></td>
                                                <td style="border: 1px solid black;"><?php echo $seatnum; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="detailsbttncontainer">
                                    <?php echo "<a class='cardetails' href='CarDetailsPage.php?lotnum=".$lotnum."'>" ?>
                                            <button type='submit' id='formbutton' class="btn btn-primary">Details</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="rightblock">
                                    <div class="carauctionstatus">
                                        <?php 
                                            echo "AUCTION STATUS:" . "</br>";
                                            echo $aucstatus; 
                                        ?>
                                    </div>
                                    <div class="carvote">
                                        <?php 
                                            echo "CURRENTS VOTES: ";
                                            echo $votenum; 
                                        ?>
                                    </div>
                                    <div class="votebttncontainer">
                                    <?php echo "<a class='carvote' href='AddVotePage.php?lotnum=".$lotnum."&portalpage=1'>" ?>
                                        <button type='submit' id='votebttn' class="btn btn-primary">Vote</button>
                                        </a>
                                    </div>
                                </div>
                            </div>    
                        </div>

                    <?php

                }

                echo '</div>';
            }
        }else{
            echo "Unable to connect to make query: ".mysqli_error($conn);
        } 

        ?>

        </div>
    </div>
    <footer>
    </footer>
    <script src="../scripts/countdowntimer.js"></script> 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>