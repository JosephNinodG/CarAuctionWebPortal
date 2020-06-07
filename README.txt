This is a README for the Car Auction Web portal.

Place in htdocs of xampp under the folder CarAuctionWebPortal

Access web portal via the following:
http://localhost/CarAuctionWebPortal/index.php

- DO NOT REMOVE OR EDIT THE FOLLOWING FILES  -

CarUploadFiles - All images for the cars are stored here
css - All stylesheets for the different page views are stored here
scripts - All php and javascript files are stored here (Many access database)
views - All the page views are stored here
index - login page
potwCars.sql and webportal-sql.sql both contain the code for the database

Use phpMyAdmin to create MySQL database
-Copy queries from potwCars.sql and webportal-sql.sql to create the tables in database

Database details:

  $servername = "localhost";
  $username = "<yourusername>";
  $password = "<yourpassword>";
  $dbname = "<database name>";

Edit these in connection.php

Bootstrap used for styling: https://getbootstrap.com/docs/4.5/getting-started/introduction/
Javascript timer: https://vincoding.com/weekly-repeating-countdown-timer-javascript/
CAPTCHA system built upon: https://www.the-art-of-web.com/php/captcha/
