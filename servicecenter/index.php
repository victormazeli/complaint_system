<?php
session_start();
error_reporting(0);
include("includes/dbconfig.php");
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
$ret=mysqli_query($conn,"SELECT * FROM service_center WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['nerc_id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$username = $_SESSION['login'];
$date = date("y:m:d h:i:s");

$log = "INSERT INTO `log` VALUES ('', '$username', 'Logged In', '$date', 'sc')";

if($query = mysqli_query($conn, $log)){
        }

exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}

}
?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PCMMIS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 50px;
        padding-bottom: 50px;
         background-image: url("../assets/images/scc.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div><center><h1 style="color: white; font-size: 50px" >PCMMIS</h1></center></div> <br>
          <h2 style="text-align:center; color: white; background-color: #5969ff;">SERVICE CENTER <br> LOGIN PAGE</h2>
        <div class="card ">
            <div class="card-header text-center">
                <i class="fa fa-user-secret"></i>
                <span class="splash-description">Please enter your admin information.</span></div>
            <div class="card-body">
                <form action="" method="POST">
                      <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
                    <span style="color:green;" ><?php echo htmlentities($_SESSION['succmsg']); ?><?php echo htmlentities($_SESSION['succmsg']="");?></span>
                     <span style="color:green;" ><?php echo htmlentities($_SESSION['info']); ?><?php echo htmlentities($_SESSION['info']="");?></span>
                    <br>
                    <br>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <br>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                    </div>
                    <br>
             <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                  <!--<div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>-->
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>