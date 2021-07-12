<?php session_start();
include('includes/dbconfig.php');
if(!isset($_SESSION['login']))
    {   
header('location:index.php');
}
?>