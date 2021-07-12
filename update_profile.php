<?php

include('includes/session.php');

	if (isset($_POST['submit'])){

	$complainant_id = $_POST['complainant_id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$telnum=$_POST['telnum'];
	$meternum = $_POST['meternum'];
	$address = $_POST['address'];
	$lga = $_POST['lga'];
	$date_modified = date("y:m:d h:i:s");

	$username = $_POST['username'];

	
		
	$update = ("UPDATE complainant SET first_name='$fname', last_name='$lname', meter_num='$meternum', tel_number='$telnum', local_govt='$lga', address='$address', date_modified ='$date_modified' WHERE complainant_id = '$complainant_id'");

	$log = "INSERT INTO `log` VALUES ('', '$username', 'Update Profile', '$date_modified', 'commplainant')";

	
		if($query = mysqli_query($conn, $update)){

			 echo "<script>
			window.alert('Account Record Updated Successfully!');
			window.history.back();
		</script>";
		}

		if($query = mysqli_query($conn, $log)){
		}

}
	
	?>
		
