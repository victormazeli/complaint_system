<?php
include('includes/session.php');


	

	if (isset($_POST['submit'])){

	$sc_id = $_POST['sc_id'];
	
	$tel=$_POST['tel'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$name=$_POST['name'];
	$lga = $_POST['lga'];
	$address = $_POST['address'];
	$date = date("y:m:d h:i:s");
	
	
		
	$update = ("UPDATE service_center SET name='$name', username='$username', password='$password', email='$email', tel_number='$tel', local_govt='$lga', address='$address', date_modified='$date'  WHERE sc_id = '$sc_id'");

		if($query = mysqli_query($conn, $update)){

			 echo "<script>
			window.alert('Service Center Record Updated Successfully!');
			window.history.back();
		</script>";
		}

}
	
	?>
		
