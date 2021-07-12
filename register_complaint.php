<?php
date_default_timezone_set("Africa/Lagos");
	include ('includes/session.php');
include ('index.php');

	if (isset($_POST['submit'])){

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$meternum=$_POST['meternum'];
	$email=$_POST['email'];
	$telnum=$_POST['telnum'];
	$lga=$_POST['lga'];
	$address=$_POST['address'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$date = date("y:m:d h:i:s");
	//$salt = $email;
	//$hashed = md5($password . $salt);
	

	$insert = "INSERT INTO `complainant` VALUES ('', '$fname', '$lname', '$email','$meternum', '$username', '$password', '$telnum', '$address','$lga', '$date', '')";


	$log = "INSERT INTO `log` VALUES ('', '$username', 'Created Account', '$date', 'commplainant')";

		if ($query = mysqli_query($conn, $insert)){

		 echo "$_SESSION['info']";
		}

		if ($query = mysqli_query($conn, $log)){
		}

	}
?>
	
