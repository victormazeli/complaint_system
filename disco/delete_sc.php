<?php 

include('includes/dbconfig.php');

$sc_id=$_GET['sc_id'];
	
	
	
	$delete = ("DELETE FROM service_center WHERE sc_id = '$sc_id'");
	
	if ($query = mysqli_query($conn, $delete)){

		 echo "<script>
			window.alert('Service Center Record Deleted Successfully!');
			window.history.back();
		</script>";


	}
 ?>
