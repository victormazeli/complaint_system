<?php
include ('includes/session.php');

$user = $_SESSION['login'];

if (isset($_POST['submit'])){

    $name=$_POST['name'];
    $rate=$_POST['rate'];
    $vat=$_POST['vat'];


    $insert = "INSERT INTO `tariff` VALUES ('$name', '$rate', '$vat')";

    if ($query = mysqli_query($conn, $insert)){

        echo "<script>
			window.alert('Tariff Plan Added Successfully!');
			window.history.back();
		</script>";
    }
}
?>


