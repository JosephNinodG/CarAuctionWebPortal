<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="GlobalSS.css">
    <link rel="stylesheet" type="text/css" href="CarDetailsPageSS.css">
</head>
<body>
    <header>
        <div class="bttncontainer">
            <a href="LoginPage.php">
                <button type='submit' class="btn btn-primary" id='loginbttn'>Login</button>
            </a>
            <a href="SignUpPage.php">
                <button type='submit' class="btn btn-primary" id='signupbttn'>Sign up</button>
            </a>
        </div>
    </header>
    <div class="banner">
        <div class="textcontent"> <!--TO HELP VIEW WHERE CONTAINERS WILL GO-->
            Countdown timer goes here
        </div>
    </div>
    <div class="auctioninfobanner">
        <div class="container-fluid" id="auctioninfofluidcontainer">
            <div class="row">
                <div class="col">
                    <div class="auctioninfocontainer">
                        <div class="auctionlotnum">Lot Num</div>
                        <div class="carmakemodel">Car Make | Car Model</div>
                    </div>
                </div>
                <div class="col">
                    <div class="auctionstatuscontainer">Auction Status: #####</div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid" id="maincontentfluidcontainer">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="carimagecontainer">
                        image
                    </div>
                    <div class="cardetailscontainer">
                        <div class="carpricecontainer">
                            <div class="textarea">Car price:</div>
                            <div class="carprice">£ Price</div>
                        </div>
                        <table class="cardetails">
                            <tr>
                                <td>icon1</td>
                                <td>icon2</td>
                                <td>icon3</td>
                                <td>icon4</td>
                            </tr>
                            <tr>
                                <td>icon1</td>
                                <td>icon2</td>
                                <td>icon3</td>
                                <td>icon4</td>
                            </tr>
                            <tr>
                                <td>icon1</td>
                                <td>icon2</td>
                                <td>icon3</td>
                                <td>icon4</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="carvotescontainer">
                        <div class="carvotenumcontainer">
                            <div class="textarea">Number of votes:</div>
                            <div class="votnum">##</div>
                        </div>
                        <div class="carvotebttncontainer">
                            <button type='submit' class='votebttn'>Vote</button>
                        </div>
                    </div>
                    <div class="commentsectioncontainer">
                        <div class="allcommentscontainer">Comment section</div>
                        <div class="usercommentcontainer">
                            <textarea type="text" class="commentinput" name="commentinput" placeholder="write a comment..."></textarea>
                            <button type='submit' class='postbttn'>Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>    
</body>
</html>