<?php include ('includes/session.php');

            $sc = $_SESSION['login'];
            $query = "SELECT * FROM service_center WHERE `username`='$sc'";
            $run_query = mysqli_query($conn, $query);
            $data=mysqli_fetch_array($run_query);

            $sc_id = $data['sc_id'];
            $name =$data['name'];
            $username = $data['username'];
            $email = $data['email'];
            $tel = $data['tel_number'];
            $address = $data['address'];
            $lga = $data['local_govt'];
            $date = $data['date_modified'];
            $date2 = $data['date_created'];


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
                                    <form id="" method="POST" name="update" onSubmit="return valid();" action="update_profile.php">
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
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Address</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder=""  value="<?php echo $address;  ?>" class="form-control" name="confirmpassword" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">LGA</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder=""  value="<?php echo $lga; ?>" class="form-control" name="lga" disabled>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder=""  value="<?php  echo $email;  ?>" class="form-control" name="email">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Telephone Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="number"  maxlength="6" placeholder=""  value="<?php  echo $tel;  ?>" class="form-control" name="tel_number">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Date Created</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  maxlength="6" placeholder=""  value="<?php  echo $date2;  ?>" class="form-control" name="date2" disabled >
                                            </div>
                                        </div>

                                       <div class="form-group row" hidden="">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right"></label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  maxlength="6" name="sc_id" placeholder=""  value="<?php  echo $sc_id;?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" name="submit" class="btn btn-space btn-primary">Update</button>
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
