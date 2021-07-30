<?php

include('includes/dbconfig.php');

$sc_id=$_GET['sc_id'];



$delete = ("DELETE FROM tariff WHERE id = '$sc_id'");

if ($query = mysqli_query($conn, $delete)){

    echo "<script>
			window.alert('Tariff Plan Record Deleted Successfully!');
			window.history.back();
		</script>";


}
?>
