<?php
include('includes/session.php');
$username = $_SESSION['login'];

$date = date("y:m:d h:i:s");

$log = "INSERT INTO `log` VALUES ('', '$username', 'Logged Out', '$date', 'commplainant')";

if($query = mysqli_query($conn, $log)){
		}
$_SESSION['login']=="";
session_unset();
//session_destroy();
$_SESSION['succmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="index.php";
</script>
