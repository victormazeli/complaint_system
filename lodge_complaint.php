<?php 
include ('includes/session.php');

            $user = $_SESSION['login'];
            $query = "SELECT * FROM complainant WHERE `username`='$user'";
            $run_query = mysqli_query($conn, $query);
            $data=mysqli_fetch_array($run_query);

            $complainant_id = $data['complainant_id'];
            $location = $data['local_govt'];
            $status = 0;
            $date_reg = date("y:m:d h:i:s");

$log = "INSERT INTO `log` VALUES ('', '$user', 'Lodge Complaint', '$date_reg', 'commplainant')";
if($query = mysqli_query($conn, $log)){
        } 

if(isset($_POST['submit']))
{

$complaint_title=$_POST['complaint_title'];
$complaint_details=$_POST['complaint_details'];
$complaint_file=$_FILES["complaint_file"]["name"];


move_uploaded_file($_FILES["complaint_file"]["tmp_name"],"complaintfiles/".$_FILES["complaint_file"]["name"]);

$insert="INSERT INTO `complaint` VALUES ('','$complainant_id','$complaint_title','$complaint_details','$location','$complaint_file','$status','$date_reg', '')";

if ($query = mysqli_query($conn, $insert)){

         echo '<script>
            window.alert("Your Complaint Has Been Submitted Successfully!");
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
    <title>PCMMIS</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="assets/vendor/inputmask/css/inputmask.css" />
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <?php include('includes/header.php'); ?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
          <?php include('includes/sidebar.php'); ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content">
<div class="row">
<div class="col-xl-10">
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header" id="top">
                <h2 class="pageheader-title">Register Complaint </h2>
            </div>
        </div>
    </div>                  
</div>

 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Fill the form below to register your complaints</h5>
            <div class="card-body">
                <form id="" method="POST" name="complaint" action="" name="complaint" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Complaint Title</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="text"  maxlength="40" placeholder="Type a Short Description of your complaint (e.g: Fallen Electricity Pole)" class="form-control" name="complaint_title" required="" >
                        </div>
                    </div>
                  <div class="form-group row">
                            <label class="col-12 col-sm-3 col-form-label text-sm-right" for="exampleFormControlTextarea1">Complaint Details (Max. of 1000words)</label> 
                            <textarea class="col-12 col-sm-8 col-lg-6" placeholder="Type Your Complaint in Details"  name="complaint_details" rows="8" maxlength="1000" required=""></textarea>
                        </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Complaint File (If Any)</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input type="file" class="form-control" name="complaint_file" maxlength="">
                        </div>
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
<!-- sidenavbar -->
<!-- ============================================================== -->
                   
                    <!-- ============================================================== -->
                    <!-- end sidenavbar -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           <?php include('includes/footer.php') ?>
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
    <script src="assets/libs/js/main-js.js"></script>
    <script src="assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    <script>
</body>
 
</html>