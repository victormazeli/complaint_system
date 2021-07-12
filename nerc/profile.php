<?php include ('includes/session.php');

            $user = $_SESSION['login'];
            $query = "SELECT * FROM nerc WHERE `username`='$user'";
            $run_query = mysqli_query($conn, $query);
            $data=mysqli_fetch_array($run_query);

            $name =$data['name'];
            $email = $data['email'];
            $telnum = $data['tel_number'];
            $password = $data['password'];
            $username = $data['username'];
            $date = $data['date_modified'];
            
        
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
                                <h3 class="card-header"><?php echo $name; ?>'s  Profile Details </h3>
                                     <h5 class="card-header" style="align-self: right;" > Last Account Update: <?php echo $date; ?> </h5>
                                <div class="card-body">
                                    <form id="" method="POST" name="changepass" onSubmit="return valid();">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder="" value="<?php  echo $name;  ?>" class="form-control" name="confirmpassword" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder="" value="<?php  echo $username;  ?>" class="form-control" name="confirmpassword" disabled>
                                            </div>  
                                           </div>
                                           <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="password"  placeholder="" value="<?php  echo $password;  ?>" class="form-control" name="confirmpassword" disabled>
                                            </div>  
                                           </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder=""  value="<?php  echo $email;  ?>" class="form-control" name="confirmpassword" disabled>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Telephone Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="number"  placeholder=""  value="<?php  echo $telnum;  ?>" class="form-control" name="confirmpassword" disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" class="btn btn-space btn-primary" name="submit">Update</button>
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
