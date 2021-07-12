<?php 

include('includes/dbconfig.php');

$complainant_id=$_GET['cid'];
	
	
	
	$delete = ("DELETE FROM complainant WHERE complainant_id = '$complainant_id'");
	
	if ($query = mysqli_query($conn, $delete)){

		 echo "<script>
			window.alert('User Record Deleted Successfully!');
			window.history.back();
		</script>";


	}
 ?>
