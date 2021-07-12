<?php
 include ('includes/session.php'); 
error_reporting(0);
 
$date = date("y:m:d h:i:s");
$username = $_SESSION['login'];

if(isset($_POST['submit']))
{
$sql=mysqli_query($conn,"SELECT password FROM  service_center where password='".$_POST['password']."' && username='".$_SESSION['login']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{ 
 $con=mysqli_query($conn,"update service_center set password='".$_POST['newpassword']."', date_modified='$date' where username='".$_SESSION['login']."'");
$successmsg="Password Changed Successfully!";
}
else
{
$errormsg="Password do not match!";
}

//Log Code...
$log = "INSERT INTO `log` VALUES ('', '$username', 'Change Password', '$date', 'sc')";
if($query = mysqli_query($conn, $log)){
        } 
         }
?> 



?>
<!DOCTYPE html>
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
<script type="text/javascript">
    
function valid()
{
if(document.changepass.password.value=="")
{

alert("Current Password Field is Empty!!");
document.changepass.password.focus();
return false;
}
else if(document.changepass.newpassword.value=="")
{
alert("New Password Field is Empty!!");
document.changepass.newpassword.focus();
return false;
}
else if(document.changepass.confirmpassword.value=="")
{
alert("Confirm Password Field is Empty!!");
document.changepass.confirmpassword.focus();
return false;
}
else if(document.changepass.newpassword.value != document.changepass.confirmpassword.value)
{
alert("New Password and Confirm Password Fields do not match!!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->

    <?php include "includes/header.php"; ?>

     
 <?php include "includes/sidebar.php"; ?>
     
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
               
                    
                    <div class="row">
                 
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Change Password</h5>
                                <div class="card-body">

                                     <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Kudos</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oops! </b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
                                    <form id="" method="POST" name="changepass" onSubmit="return valid();">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Old Password</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="password"  placeholder="" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">New Password</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="password" placeholder="" class="form-control" name="newpassword">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Confirm New Password</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="password"  placeholder="" class="form-control" name="confirmpassword">
                                            </div>
                                        </div>
                                     
  
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" class="btn btn-space btn-primary" name="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->
                    </div>
           
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           <?php include "includes/footer.php";  ?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/parsley/parsley.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script>
    $('#form').parsley();
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
</body>
 
</html>
