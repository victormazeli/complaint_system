<?php
session_start();
$_SESSION['login']=="";
session_unset();
//session_destroy();
$_SESSION['succmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="index.php";
</script>
