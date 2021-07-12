<?php
	include ('includes/session.php');

    $user = $_SESSION['login'];

	if (isset($_POST['submit'])){

	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$lga=$_POST['lga'];
	$address=$_POST['address'];
	$date = date("y:m:d h:i:s");

	
	$insert = "INSERT INTO `service_center` VALUES ('', '$name', '$username', '$password','$email', '$tel', '$address', '$lga', '$date', '')";

	//$log = "INSERT INTO `log` VALUES ('', '$user', 'Logged In', '$date', 'disco')";

		if ($query = mysqli_query($conn, $insert)){

		 echo "<script>
			window.alert('Service Center Added Successfully!');
			window.history.back();
		</script>";
		}
	}
?>
	

