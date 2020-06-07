<!DOCTYPE html>
<?php

	function checkImageType($uploadOk, $target_file, $lotnum, $make, $model, $price, $aucstatus, $engsize, $transmission, $vehtype, $fueltype, $doornum, $seatnum, $conn) {

		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
					checkIfUploaded($uploadOk, $target_file, $lotnum, $make, $model, $price, $aucstatus, $engsize, $transmission, $vehtype, $fueltype, $doornum, $seatnum, $conn);
				}
				else{
					$uploadOk = 1;
				}
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
				checkIfUploaded($uploadOk, $target_file, $lotnum, $make, $model, $price, $aucstatus, $engsize, $transmission, $vehtype, $fueltype, $doornum, $seatnum, $conn);
			}
		}
	}

	function checkIfUploaded($uploadOk, $target_file, $lotnum, $make, $model, $price, $aucstatus, $engsize, $transmission, $vehtype, $fueltype, $doornum, $seatnum, $conn){
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileUpload"]["name"]). " has been uploaded.";

			$votenum = 0;
			$query = "INSERT INTO potwCars(lotnum,make,model,price,aucstatus,votenum,imagefilename,seatnum,doornum,fueltype,vehtype,engsize,transmission) VALUES ('$lotnum', '$make', '$model', '$price', '$aucstatus', '$votenum','$target_file','$seatnum','$doornum','$fueltype','$vehtype','$engsize','$transmission')";
			$result = mysqli_query($conn, $query);

				if (!$result) {
					printf("Error when adding car: %s\n", mysqli_error($conn));
				}else{
					echo "<p>The new car was successfully added.</p>";
				}
				
			} else {
			echo "Sorry, there was an error uploading your file.";
			}
		}
	}

	include("connection.php");

	$lotnum = $_POST['lotnum'];
	$make = $_POST['make'];
	$model = $_POST['model'];
	$price = $_POST['price'];
	$aucstatus = $_POST['aucstatus'];
	$engsize = $_POST['engsize'];
	$transmission = $_POST['transmission'];
	$vehtype = $_POST['vehtype'];
	$fueltype = $_POST['fueltype'];
	$doornum = $_POST['doornum'];
	$seatnum = $_POST['seatnum'];


	if (!empty($lotnum && $make && $model && $price && $engsize)){

		$check = "SELECT * FROM potwCars WHERE lotnum = '$lotnum'";
		$result = mysqli_query($conn, $check);
		$data = mysqli_num_rows($result);

		if($data == 0) {
			
			$target_dir = "../CarUploadFiles/";
			$target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
			$uploadOk = 1;		
			if (isset($target_file)){
				if ($target_file == "../CarUploadFiles/"){
					echo 'No file selected';
				}
				else{

					checkImageType($uploadOk, $target_file, $lotnum, $make, $model, $price, $aucstatus, $engsize, $transmission, $vehtype, $fueltype, $doornum, $seatnum, $conn);

					// Check if file already exists
					if (file_exists($target_file)) {
						echo "Sorry, file already exists.";
						$uploadOk = 0;
						checkIfUploaded($uploadOk, $target_file, $lotnum, $make, $model, $price, $aucstatus, $engsize, $transmission, $vehtype, $fueltype, $doornum, $seatnum, $conn);
					}
					// Check file size
					elseif ($_FILES["fileUpload"]["size"] > 500000) {
						echo "Sorry, your file is too large.";
						$uploadOk = 0;
						checkIfUploaded($uploadOk, $target_file, $lotnum, $make, $model, $price, $aucstatus, $engsize, $transmission, $vehtype, $fueltype, $doornum, $seatnum, $conn);
					}
					else {
						checkIfUploaded($uploadOk, $target_file, $lotnum, $make, $model, $price, $aucstatus, $engsize, $transmission, $vehtype, $fueltype, $doornum, $seatnum, $conn);
					}
				}
			}
			else {
				echo "Error setting file directory";
			}
			
		}
		else{
			echo "Car Lot Number already exists";
		}
	}
	else{
		header("Location: form-newcar.php");
	}

?>

<html lang="en">
	<head>
		<title>Car add</title>
	</head>
	<body>
		<h2>Car upload</h2>

		<p><a href="../views/AdminCarsPage.php">Return to list</a></p>

	</body>
</html>
<?php
	mysqli_close($conn);
?>
