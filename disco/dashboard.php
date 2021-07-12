<?php include ('includes/session.php')



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
    <title>PCMMIS</title>
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
                                <h2 class="pageheader-title">DISCO Dashboard</h2>
                              <div class="page-breadcrumb">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
 
                    <div class="ecommerce-widget">
                       
                        <div class="row">
 
                            <div class="col-xl-12 col-lg- col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Overall Complaint Information</h5>
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
                            $rt = mysqli_query($conn,"SELECT * FROM complaint WHERE status = 0");
                            $countNotProgress = mysqli_num_rows($rt);
                            {?>
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Pending Complaint</h5>
                                        <h1 class="mb-0"><?php echo htmlentities($countNotProgress);?></h1>
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
                            $rt = mysqli_query($conn,"SELECT * FROM complaint WHERE status = 1");
                            $countProgress = mysqli_num_rows($rt);
                            {?>
                                        <div class="d-inline-block">
                                        <h5 class="text-muted">Complaints In Progress</h5>
                                        <h1 class="mb-0"><?php echo htmlentities($countProgress);?></h1>
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
                            $rt = mysqli_query($conn,"SELECT * FROM complaint WHERE status = 2");
                            $countClosed = mysqli_num_rows($rt);
                            {?>
                                    <div class="d-inline-block">
                                        <h5 class="text-muted">Closed Complaint</h5>
                                        <h1 class="mb-0"><?php echo htmlentities($countClosed); ?></h1>
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
<!--<div class="row">
                           
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"> Product Category</h5>
                                    <div class="card-body">
                                        <div class="ct-chart-category ct-golden-section" style="height: 315px;"></div>
                                        <div class="text-center m-t-40">
                                            <span class="legend-item mr-3">
                                                    <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full "></i></span><span class="legend-text">Man</span>
                                            </span>
                                            <span class="legend-item mr-3">
                                                <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                            <span class="legend-text">Woman</span>
                                            </span>
                                            <span class="legend-item mr-3">
                                                <span class="fa-xs text-info mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                            <span class="legend-text">Accessories</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> -->
 <div class="col-xl-12 col-lg- col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Bosso Service Centre Complaint Information</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>

  <div class="row">
                            <?php $sc1 = mysqli_query($conn, "SELECT * FROM complaint WHERE status=0 AND location = 'Bosso'");
                           $bosso_not = mysqli_num_rows($sc1); 

                           $sc1 = mysqli_query($conn, "SELECT * FROM complaint WHERE status=1 AND location = 'Bosso'");
                           $bosso_in = mysqli_num_rows($sc1); 

                           $sc1 = mysqli_query($conn, "SELECT * FROM complaint WHERE status=2 AND location = 'Bosso'");
                           $bosso_closed = mysqli_num_rows($sc1); 
                           ?>


                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Revenue by Category</h5>
                                    <div class="card-body">
                                        <div id="bosso_chart_category" style="height: 420px;"></div>
                                    </div>
                                </div>
                            </div>


                             <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Revenue by Category</h5>
                                    <div class="card-body">
                                        <div id="bosso_chart_category2" style="height: 420px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end category revenue  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg- col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Chanchaga Service Centre Complaint Information</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>

                                <div class="row">

                            <?php $sc2 = mysqli_query($conn, "SELECT * FROM complaint WHERE status=0 AND location = 'Chanchaga'");
                           $chanchaga_not = mysqli_num_rows($sc2);

                           $sc2 = mysqli_query($conn, "SELECT * FROM complaint WHERE status=1 AND location = 'Chanchaga'");
                           $chanchaga_in = mysqli_num_rows($sc2);

                           $sc2 = mysqli_query($conn, "SELECT * FROM complaint WHERE status=2 AND location = 'Chanchaga'");
                           $chanchaga_closed = mysqli_num_rows($sc2); ?>


                               <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Complaints by Status</h5>
                                    <div class="card-body">
                                        <div id="chanchaga_chart_category" style="height: 420px;"></div>
                                    </div>
                                </div>
                            </div>

                             <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Complaints by Status</h5>
                                    <div class="card-body">
                                        <div id="chanchaga_chart_category2" style="height: 420px;"></div>
                                    </div>
                                </div>
                            </div>

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
    
   <?php include('chart.php'); ?>
</body>
 
</html>
