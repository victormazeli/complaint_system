<?php
include('includes/session.php');




if (isset($_POST['submit'])){

    $id = $_POST['sc_id'];

    $name=$_POST['name'];
    $rate=$_POST['rate'];
    $vat=$_POST['vat'];



    $update = ("UPDATE tariff SET name='$name', rate='$rate', vat='$vat' WHERE id = '$id'");

    if($query = mysqli_query($conn, $update)){

        echo "<script>
			window.alert('Tariff Plan Record Updated Successfully!');
			window.history.back();
		</script>";
    }

}

?>

