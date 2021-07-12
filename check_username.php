<?php 
require_once("includes/dbconfig.php");
if(!empty($_POST["username"])) {
	$username= $_POST["username"];
	
		$result =mysqli_query($conn,"SELECT username FROM complainant WHERE username='$username'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'>Sorry, Username already exists.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Username available for Registration.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
