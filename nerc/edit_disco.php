<?php
include('includes/session.php');

	if (isset($_POST['submit'])){

	$disco_id = $_POST['disco_id'];
	
	$abbreviation=$_POST['abbreviation'];
	$tel=$_POST['tel'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$address =$_POST['address'];
	$name=$_POST['name'];
	$date = date("y:m:d h:i:s");
	
	
		
	$update = ("UPDATE disco SET name='$name', abbreviation='$abbreviation', username='$username', password='$password', address='$address', email='$email', tel_number='$tel', date_modified='$date' WHERE disco_id = '$disco_id'");

		if($query = mysqli_query($conn, $update)){

			// echo "$successmsg"; 
			

			// "DISCO Record Updated Successfully!";




	   echo "<script>
		window.alert('DISCO Record Updated Successfully!');
		window.history.back();
		</script>";
		}

}
	
	?>
		
