<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add car</title>
  </head>
  <body>
    <h2>Add car to database</h2>

    <?php
      include("connection.php");
  
      $query = "SELECT COUNT(1) FROM potwCars";

      $result = mysqli_query($conn, $query);

      if($result){
        $rows = mysqli_fetch_array($result);
        if($rows[0] >= 12) {
          echo "Error: Database full.";
        }
        else {
          ?>

          Please fill out ALL car details below:

          <form method="POST" action="add-car.php" enctype="multipart/form-data">
            <p>Lot Number:<br>
            <input type="text" name="lotnum" maxlength="10"/></p>
            <p>Car Make:<br>
            <input type="text" name="make" maxlength="20"/></p>
            <p>Car Model:<br>
            <input type="text" name="model" maxlength="20"/></p>
            <p>Price:<br>
            <input type="text" name="price" maxlength="10"/></p>
            <p>Engine Size:<br>
            <input type="text" name="engsize" maxlength="20"/></p>
            <p>Auction Status:<br>
            <select name="aucstatus">
              <option value="S">Sold</option>
              <option value="NS">Not Sold</option>
            </select></p>
            <p>Transmission:<br>
            <select name="transmission">
              <option value="Automatic">Automatic</option>
              <option value="Manual">Manual</option>
            </select></p>
            <p>Vehicle:<br>
            <select name="vehtype">
              <option value="Micro">Micro</option>
              <option value="Sedan">Sedan</option>
              <option value="CUV">CUV</option>
              <option value="SUV">SUV</option>
              <option value="Hatchback">Hatchback</option>
              <option value="Pickup">Pickup</option>
              <option value="Van">Van</option>
              <option value="Coupe">Coupe</option>
              <option value="Truck">Truck</option>
            </select></p>
            <p>Fuel type:<br>
            <select name="fueltype">
              <option value="Diesel">Diesel</option>
              <option value="Petrol">Petrol</option>
            </select></p>
            <p>Number of doors:<br>
            <select name="doornum">
              <option value="3 Door">3 Door</option>
              <option value="5 Door">5 Door</option>
            </select></p>
            <p>Number of seats:<br>
            <select name="seatnum">
              <option value="2 Seats">2 Seats</option>
              <option value="4 Seats">4 Seats</option>
              <option value="5 Seats">5 Seats</option>
              <option value="7 Seats">7 Seats</option>
            </select></p>


            <p>Upload image:<br>
            <input type="file" name="fileUpload" id="fileUpload"/></p>

            <p><input type="submit" name="submit" value="Add car" /></p>
          </form>
  
  
            <?php

        }
      }
      else{
        echo "Unable to connect to make query: ".mysqli_error($conn);
      }
    ?>

  </body>
</html>
