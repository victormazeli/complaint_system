<?php include ('includes/session.php');


            $user = $_SESSION['login'];
            $query = "SELECT * FROM service_center WHERE `username`='$user'";
            $run_query = mysqli_query($conn, $query);
            $data=mysqli_fetch_array($run_query);

            $location =$data['local_govt'];

?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>ECUS</title>
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
        <!-- ============================================================== -->
        <!-- end navbar -->
  

        <!-- left sidebar -->
        <!-- ============================================================== -->
    <?php include "includes/sidebar.php"; ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
      
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Service Center Dashboard</h2>
                              <div class="page-breadcrumb">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                       
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg- col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Complaint Information</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
<div class="row">
                           
                             <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                             <?php                    
                            $rt = mysqli_query($conn,"SELECT * FROM complaint WHERE status = 0 AND location = '$location'");
                            $num1 = mysqli_num_rows($rt);
                            {?>
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Pending Complaint</h5>
                                        <h1 class="mb-0"><?php echo htmlentities($num1);?></h1>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
                                        <i class="fa fa-low-vision fa-fw fa-sm text-secondary"></i>
                                    </div>
                                     <?php }?>
                                </div>
                            </div>
                        </div>
                           
 
                           <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                             <?php                    
                            $rt = mysqli_query($conn,"SELECT * FROM complaint WHERE status = 1 AND location = '$location'");
                            $num1 = mysqli_num_rows($rt);
                            {?>
                                        <div class="d-inline-block">
                                        <h5 class="text-muted">Complaints In Progress</h5>
                                        <h1 class="mb-0"><?php echo htmlentities($num1);?></h1>
                                    </div>
                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
                                        <i class="fa fa-wrench fa-fw fa-sm text-primary"></i>
                                    </div>
                                     <?php }?>
                                </div>
                            </div>
                        </div>
                           

                          
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-top border-top-primary">
                                <div class="card-body">
                             <?php                    
                            $rt = mysqli_query($conn,"SELECT * FROM complaint WHERE status = 2 AND location = '$location'");
                            $num1 = mysqli_num_rows($rt);
                            {?>
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Clossed Complaint</h5>
                                        <h1 class="mb-0"><?php echo htmlentities($num1); ?></h1>
                                    </div>
                                      <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                                        <i class="fa fa-handshake fa-fw fa-sm text-info"></i>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                            <!-- ============================================================== -->
                            <!-- end visitor  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- total orders  -->
                            <!-- ============================================================== -->
                           
                            <!-- ============================================================== -->
                            <!-- end total orders  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
          <?php include "includes/footer.php"; ?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="../assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="../assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="../assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="../assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="../assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="../assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="../assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="../assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="../assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>
