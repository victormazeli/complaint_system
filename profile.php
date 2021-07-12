<?php include ('includes/session.php');

            $user = $_SESSION['login'];
            $query = "SELECT * FROM complainant WHERE `username`='$user'";
            $run_query = mysqli_query($conn, $query);
            $data=mysqli_fetch_array($run_query);

            $complainant_id = $data['complainant_id'];
            $fname =$data['first_name'];
            $lname = $data['last_name'];
            $email = $data['email'];
            $telnum = $data['tel_number'];
            $password = $data['password'];
            $username = $data['username'];
            $meternum = $data['meter_num'];
            $address = $data['address'];
            $lga = $data['local_govt'];
            $date = $data['date_modified'];
            $date2 = $data['date_reg'];
?>
<!DOCTYPE html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PCMMIS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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

     
 <?php include "includes/sidebar.php";?>
     
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
               
                    
                    <div class="row">
                 
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h3 class="card-header"><?php echo $fname . "  ". $lname; ?>'s  Profile Details </h3>
                                     <h5 class="card-header" style="align-self: right;" > Last Account Update: <?php echo $date; ?> </h5>

                                <div class="card-body">
                                    <form id="" method="POST" action="update_profile.php" name="changepass" onSubmit="return valid();">

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">First Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder="" value="<?php  echo htmlentities($fname);  ?>" class="form-control" name="fname">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Last Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder="" value="<?php  echo htmlentities($lname);  ?>" class="form-control" name="lname">
                                            </div>  
                                           </div>

                                            <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Username</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder="" value="<?php  echo htmlentities($username);  ?>" class="form-control" name="username" disabled >
                                            </div>  
                                           </div>
                                       
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder=""  value="<?php  echo htmlentities($email);  ?>" class="form-control" name="email" disabled>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Telephone Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="number" placeholder=""  value="<?php  echo htmlentities($telnum);  ?>" class="form-control" name="telnum">
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Meter Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder=""  value="<?php  echo htmlentities($meternum);  ?>" class="form-control"  name="meternum">
                                            </div>
                                        </div>
                                         
                                         <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Addres</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder=""  value="<?php  echo htmlentities($address);  ?>" class="form-control" name="address">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Logal Govt.</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                               <select type="text" style="width:400px;" class="form-control" value="" name="lga">
                                              <option value="<?php echo  htmlentities($lga); ?>"><?php echo  htmlentities($lga); ?></option>
                                                     <?php $query=mysqli_query($conn, "select lga_name from local_govt");
                                                 while ($row=mysqli_fetch_array($query)) {
                                                      ?>

                                 <option value="<?php echo htmlentities($row['lga_name']); ?>"><?php echo htmlentities($row['lga_name']); ?></option>
                                 <?php
                             }
                             ?>

                            </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Registration Date</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text"  placeholder=""  value="<?php  echo $date2;  ?>" class="form-control"  name="menum" disabled >
                                            </div>
                                        </div>

                                        <div class="form-group input-group" hidden="">
                                                <span style="width:150px;" class="input-group-addon">:</span>
                                                <input type="text" style="width:330px;" class="form-control" name="complainant_id" value="<?php echo $complainant_id; ?>">
                                            </div>

                                            <div class="form-group input-group" hidden="">
                                                <span style="width:150px;" class="input-group-addon">:</span>
                                                <input type="text" style="width:330px;" class="form-control" name="username" value="<?php echo $username; ?>">
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
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/parsley/parsley.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
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
