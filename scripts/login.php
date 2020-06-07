<?php   //Webportal a1.3
session_start();

include("connection.php");                             

$username = $_POST['username'];
$password = $_POST['password'];

$queryUser = "SELECT * FROM users WHERE username = '$username' AND userpass = '$password'";
$queryAdmin = "SELECT * FROM adminuser WHERE adminname = '$username' AND adminpass = '$password'";
$resultUser = mysqli_query($conn, $queryUser);
$resultAdmin = mysqli_query($conn, $queryAdmin);

if($resultUser && $resultAdmin){
	if (!empty($username) && !empty($password)) {
		
		$dataU = mysqli_fetch_array($resultUser);
		$dataA = mysqli_fetch_array($resultAdmin);

		// echo $dataA;
		// echo $dataU;
		
		if (count($dataU) == 0 && count($dataA) > 0){
			//admin found
			$_SESSION['valid'] = true;
			$_SESSION['timeout'] = time();
			$_SESSION['adminname'] = $username;
			header("Location: ../views/AdminDashboardPage.php");

		}
		elseif (count($dataA) == 0 && count($dataU) > 0){
			//user found
			$_SESSION['valid'] = true;
			$_SESSION['timeout'] = time();
			$_SESSION['username'] = $username;
			header("Location: ../views/WebPortal.php");
		}
		else{
			header("Location: ../index.php?badpass=1");
		}
	}
	else{
		header("Location: ../index.php?badpass=1");
	}
}
else{
	echo "Unable to connect to make query: ".mysqli_error($conn);
}

// $data = array(
// 	'username' => $_POST['username'],
// 	'password' => $_POST['password'],
// 	'action' => "login"
// 	);


// $params = http_build_query($data);
// $getUrl = $apiurl."?".$params;

// $ch = curl_init();

// curl_setopt($ch, CURLOPT_URL, $getUrl);

// //return the transfer as a string
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// // $output contains the output string
// $output = curl_exec($ch);

// // close curl resource to free up system resources
// curl_close($ch);  

// $results = json_decode($output);

// if($results->success){
// 	if($results->data->loggedin){
// 		$_SESSION['apikey'] = $results->data->apikey;
// 		header("Location: WebPortal.php");
// 		exit;
// 	}else{
// 		header("Location: LoginPage.php?badpass=1");
// 	}
// }else{
// 	echo "Unable to login.  Error: ".$results->error;
// }

?>