<?php include ('includes/session.php') ?>
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
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/fixedHeader.bootstrap4.css"> 
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
     	<?php include ('includes/header.php'); ?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <?php include ('includes/sidebar.php'); ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->


                 <div class="row">
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">PCMMIS Log Book</h2>
                            <div class="page-breadcrumb">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
        
 <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Service Center Activity Log</h5>
                            <div class="card-body">
                              
                                    <table table width="100%" class="table table-striped table-bordered table-hover" id="cusTable">
                                        <thead>
                                            <tr>
                                                <th>NOS</th>
                                                <th>Username</th>
                                                <th>Action Performed</th>
                                                <th>Date/Time</th>
                                                
                                            </tr>
                                        </thead>
                                       <tbody>
											<?php
												$count = 1;
												$cq=mysqli_query($conn,"select * from log WHERE acct_type = 'sc'");
												while($cqrow=mysqli_fetch_array($cq)){
												?>
													<tr>
														<td><?php echo  $count++ ?></td>
														<td><?php echo $cqrow['username']; ?></td>
														<td><?php echo $cqrow['action']; ?></td>
														<td><?php echo $cqrow['date_time']; ?></td>
													</tr>
												<?php
												}
											?>
							                </tbody>
                                    </table>
                               
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>       
                
                  <!-- ============================================================== -->
                    <!-- end data table multiselects  -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           <?php include ('includes/footer.php'); ?>
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
    <script src="../assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
   <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
     <script src="../assets/vendor/datatables/js/data-table.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="../../../../../cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="../../../../../cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script> 
    <script src="../../../../../cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>


	<!-- DataTables JavaScript -->
	
    <script src="../assets/vendor2/datatables/js/jquery.dataTables.min.js"></script> 
 
    <script src="../assets/vendor2/datatables-responsive/dataTables.responsive.js"></script> 
    <script> 
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });

        $('#cusTable').DataTable({
        	responsive:true
        });
    });

    </script> 
</body>
 
</html>