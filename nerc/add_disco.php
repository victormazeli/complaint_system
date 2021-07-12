<?php
	include ('includes/session.php');


$user = $_SESSION['login'];

	if (isset($_POST['submit'])){

	$name=$_POST['name'];
	$abbreviation=$_POST['abbreviation'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$tel=$_POST['tel'];
	$address = $_POST['address'];
	$date = date("y:m:d h:i:s");

	
	$insert = "INSERT INTO `disco` VALUES ('', '$name', '$abbreviation', '$username', '$password', '$address', '$email', '$tel', '$date', '')";

		if ($query = mysqli_query($conn, $insert)){

		 echo "<script>
			window.alert('DISCO Added Successfully!');
			window.history.back();
		</script>";
		}
$log = "INSERT INTO `log` VALUES ('', '$user', 'Add Service Center', '$date', 'disco')";
if($query = mysqli_query($conn, $log)){
        } 
	}
?>
	
 
