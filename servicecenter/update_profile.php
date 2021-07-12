<?php

include('includes/session.php');

	$username = $_SESSION['login'];

	if (isset($_POST['submit'])){
 
	   $sc_id = $_POST['sc_id']; 
	   $email =$_POST['email'];
       $tel = $_POST['tel_number'];
       $date = date("y:m:d h:i:s");
 
	$update = ("UPDATE `service_center` SET email='$email', tel_number='$tel', date_modified ='$date' WHERE sc_id = '$sc_id'");

	
	
		if($query = mysqli_query($conn, $update)){

			echo "<script>
			window.alert('Account Record Updated Successfully!');
			window.history.back();
		</script>";
		}
		$log = "INSERT INTO `log` VALUES ('', '$username', 'Update Profile', '$date', 'sc')";
		if($query = mysqli_query($conn, $log)){
		}
}	
	?>
