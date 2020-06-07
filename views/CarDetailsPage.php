<?php

	session_start();
    //if the user is logged in, then send them to the Webportal
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
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="../css/GlobalSS.css">
    <link rel="stylesheet" type="text/css" href="../css/CarDetailsPageSS.css">
</head>
<body onload="getSeconds()">
    <header>
        <div class="backbttncontainer">
            <a href="WebPortal.php">
                <button type='submit' class="btn btn-primary" id="backbttn">Back to dashboard</button>
            </a>
        </div>
        <div class="bttncontainer">
            <a href="../scripts/logout.php">
                <button type='submit' class="btn btn-primary">Logout</button>
            </a>
        </div>
    </header>
    <div class="banner">
        <div class="banleft"><p>Time until next auction: </p></div>
        <div class="banright"><p id="timer"></p></div>
    </div>

    <?php

        include("../scripts/connection.php"); //connection to database

        $lotnum = $conn->real_escape_string($_GET['lotnum']); //get lotnum from url

        $query = "SELECT * FROM potwCars WHERE lotnum='".$lotnum."'"; //get all cars that match the lotnum
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($result)) { //get all attributes from table

            $carID = $row['carID'];
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
        }

        mysqli_close($conn);

    ?>


    <div class="auctioninfobanner">
        <div class="container-fluid" id="auctioninfofluidcontainer">
            <div class="row">
                <div class="col" id="bannercol">
                    <div class="auctioninfocontainer">
                        <div class="auctionlotnum">
                            <?php echo "Lot Number: " . $lotnum; ?>
                        </div>
                        <div class="carmakemodel">                                    
                            <?php 
                                echo $make;
                                echo " | ";
                                echo $model;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col" id="bannercol">
                    <div class="auctionstatuscontainer">Auction Status: <?php echo $aucstatus; ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid" id="maincontentfluidcontainer">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                    <div class="carimagecontainer">
                        <img src="<?php echo $imagefilename; ?>" alt="Image" class="carimage">
                    </div>
                    <div class="cardetailscontainer">
                        <div class="carpricecontainer">
                            <div class="textarea">Car price: </div>
                            <div class="carprice"><?php echo " £" . $price; ?></div>
                        </div>
                        <table class="cardetails">
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
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                    <div class="carvotescontainer">
                        <div class="carvotenumcontainer">
                            <div class="votnum"> CURRENT VOTES: <?php echo $votenum; ?></div>
                        </div>
                        <div class="carvotebttncontainer">
                            <?php echo "<a class='carvote' href='AddVotePage.php?lotnum=".$lotnum."&carpage=1'>" ?>
                                <button type='submit' id='votebttn' class="btn btn-primary">Vote</button>
                            </a>
                        </div>
                    </div>
                    <div class="commentsectioncontainer">
                        <h1>Comment section</h1>
                        <div class="itemslist">
                        <?php
                        include("../scripts/connection.php");
                        
                        $query = "SELECT carcomments.comment, carcomments.userID, carcomments.carID, users.username, users.userID FROM carcomments, users WHERE carcomments.carID = '$carID' AND carcomments.userID = users.userID";

                        $result = mysqli_query($conn, $query);
                        
                        if($result){
                            $data = mysqli_num_rows($result);

                            if($data > 0) {

                            ?>
                                <table border="1" id=listtable>
                                    <!-- <tr><th>Username</th><th>Comment</th></tr> -->
                                    <?php

                                    while($row = mysqli_fetch_assoc($result)) {
                                        $username = $row['username'];
                                        $comment = $row['comment'];                                
                                        echo("<tr><td style='background-color: #ffdbab; font-size: large; font-weight: bold;'>$username</td><td style='background-color: white; font-size: large; font-weight: bold; text-align: left !important;'>$comment</td></tr>");
                                    
                                        //<td><a href='edit-form.php?usercode=".$usercode."'>Edit</a> | <a class='deletestaff' href='delete.php?usercode=".$usercode."'>Delete </td>
                                    }
                                        
                                    mysqli_close($conn);

                                    ?>
                                </table>
                            
                        <?php
                            }else{
                                echo "<h3>No comments for this car</h3>";
                            }
                        }
                        else{
			                echo "Unable to connect to make query: ".mysqli_error($conn);
		                }
		                ?>
                        </div>
                        <?php if(isset($_GET['badpass'])){ 
                            $badpass = $_GET['badpass'];
                            if($badpass==1){
                                echo "<div class='alert alert-danger' role='alert'>CAPTCHA completed incorrectly</div>";
                            }
                            elseif($badpass==2){
                                echo "<div class='alert alert-danger' role='alert'>No comment added</div>";
                            }
                            elseif($badpass==3){
                                echo "<div class='alert alert-danger' role='alert'>Error with user</div>";
                            }
                            elseif($badpass==4){
                                echo "<div class='alert alert-danger' role='alert'>Error with car</div>";
                            }
                            elseif($badpass==5){
                                echo "<div class='alert alert-danger' role='alert'>Error with database</div>";
                            }                      
                        }?>
                        <div class="usercommentcontainer">
                            <form class="commentform" method="POST" action="<?php echo "../scripts/add-comment.php?lotnum=".$lotnum."" ?>">
                                <textarea type="text" class="commentinput" name="commentinput" placeholder="write a comment... (MAX 200 Characters)" maxlength="200"></textarea>
                                <div class="captchacon">
                                    <div class="captchaimagecon">
                                        <img id="captcha" src="../scripts/captcha.php" border="1" alt="CAPTCHA">
                                    </div>
                                    <div class="captchainputcon">
                                        <div class="refreshoption"> 
                                            <a href="#" onclick="
                                                document.getElementById('captcha').src = '../scripts/captcha.php?' + Math.random();
                                                document.getElementById('captcha_code_input').value = '';
                                                return false;
                                            ">Refresh CAPTCHA</a>
                                        </div>
                                        <div class=captchainput>
                                            <input id="captcha_code_input" type="text" name="captcha" maxlength="5" placeholder="Enter digits from image" onkeyup="this.value = this.value.replace(/[^\d]+/g, '');">
                                            <!-- <button type='submit' class="btn btn-primary" id='votebttn'>Cast vote</button> -->
                                        </div>
                                    </div>
                                </div>
                                <button type='submit' class="btn btn-primary" id="postbttn">Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="../scripts/countdowntimer.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>