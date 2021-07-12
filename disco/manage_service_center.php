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
         <?php include "includes/header.php"; ?>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
         <?php include "includes/sidebar.php"; ?>
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Service Center</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                           
                        </div>
                    </div>
                </div>

                        <div class="form-group row text-left">
                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                     <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_disco" >Add New  <i class="fa fa-plus-circle"></i> </button>

                            </div>                          
                        </div>

                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="cusTable">
                <div class="card">
                    <h5 class="card-header">Manage Service Center Account</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>
                                        <th>USERNAME</th>
                                        <th>EMAIL</th>
                                        <th>TEL.</th>
                                         <th>ADDRESS</th>
                                        <th>LGA</th>
                                        <th>ACTION</th>
                                                
                                    </tr>
                                    
                                </thead>
                                <tbody>

                                    <?php 
                                        $count = 1;
                                      $cq=mysqli_query($conn,"select * from service_center");
                                        while($row=mysqli_fetch_array($cq)){

                                          $sc_id = $row['sc_id'];

                                    ?>
                                    <tr>

                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['tel_number']; ?></td>
                                         <td><?php echo $row['address']; ?></td>
                                         <td><?php echo $row['local_govt']; ?></td>
                                        
                                                
                                        <td>
                             <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_<?php echo $sc_id; ?>"><i class="fa fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $sc_id; ?>"><i class="fa fa-trash"></i> Delete</button>

                                        </td>
                                    </tr>
                  <?php include('includes/modal.php'); ?>
                        <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
           <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
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
    <script src="../../../../../cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
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
    
    <script src="custom.js"></script>
</body>
</html>