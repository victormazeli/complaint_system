<?php 

include('includes/session.php');


$disco_id=$_GET['disco_id'];
	
	
	
	$delete = ("DELETE FROM disco WHERE disco_id = '$disco_id'");
	
	if ($query = mysqli_query($conn, $delete)){

		 echo "<script>
			window.alert('DISCO Record Deleted Successfully!');
			window.history.back();
		</script>";


	}
 ?>
