<?php 
include ("includes/dbconfig.php");


if(isset($_POST['submit']))
{

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$meter_num=$_POST['meter_num'];
$tel=$_POST['tel'];
$address=$_POST['address'];
$lga=$_POST['lga'];
$username=$_POST['username'];
$password=$_POST['password'];
$date= date("y:m:d h:i:s");



$insert="INSERT INTO `complainant` VALUES ('','$fname','$lname','$email','$meter_num', '$username', '$password', '$tel','$address','$lga', '$date', '')";

if ($query = mysqli_query($conn, $insert)){

         echo '<script>
            window.alert("Account Created Successfully!, Login In!");
             window.history.back();
        </script>';
         }
    }
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
    }
    </style>


        <script>
function emailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_email.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_username.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#user-availability-status2").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<script type="text/javascript">
function validate(){

    var num2 = document.getElementById("num");

    if (num2,value !="11"){
        alert("Invalid Telephone Number Format!");
        return false;

    }else{
        return true;

    }
}

</script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <i class="fa fa-user-secret"></i>
                <span class="splash-description">Fill the form below to register an account</span></div>
            <div class="card-body">
                <form action="register.php" method="POST" onsubmit="validate()">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="" type="text" name="fname" placeholder="Enter First Name" required="">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="" type="text" name="lname" placeholder="Enter Last Name" required="">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="email" onBlur="emailAvailability()" type="email" name="email" placeholder="Enter Email" required="">
                        <span id="user-availability-status1" style="font-size:16px;"></span>
                    </div>
                     <div class="form-group">
                        <input class="form-control form-control-lg" id="" type="text" name="meter_num" placeholder="Enter Meter Number (optional)">
                    </div>
                     <div class="form-group">
                        <input class="form-control form-control-lg" id="num" type="number" name="tel" placeholder="Enter Telephone Number" required="">
                    </div>
                     <div class="form-group">
                        <input class="form-control form-control-lg" id="" type="text" name="address" placeholder="Enter Address (Street)" required="">
                    </div>
                    <div class="form-group">
                           <!-- <span style="width:120px;  text-align: left;" class="input-group-addon">LGA:<span style="color: red;">*</span></span> -->
                            <select type="text" class="form-control form-control-lg" name="lga" required>
                                <option value="">Select LGA</option>
                                <?php $query=mysqli_query($conn, "select lga_name from local_govt");
                                while ($row=mysqli_fetch_array($query)) {
                                 ?>

                                 <option value="<?php echo htmlentities($row['lga_name']); ?>"><?php echo htmlentities($row['lga_name']); ?></option>
                                 <?php
                             }
                             ?>

                            </select>
                        </div>
                     <div class="form-group">
                        <input class="form-control form-control-lg" id="username" onBlur="userAvailability()" type="text" name="username" placeholder="Enter Username" required="">
                         <span id="user-availability-status2" style="font-size:16px;"></span>
                    </div>
                     <div class="form-group">
                        <input class="form-control form-control-lg" id="" type="password" name="password" placeholder="Enter Passsword" required="">
                    </div>
                    <button type="submit" onclick="validate()" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="index.php" class="footer-link" data-toggle="" data-target="" >Already Registered?</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link"></a>
                    <?php include ("includes/modal.php"); ?>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/jquery/jquery.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>

