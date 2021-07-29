<?php
include ('includes/session.php');

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    extract($_POST);

    /**
     * assign the complaint to a center then you update
     */

    $sql = "UPDATE complaint SET center_id = '$center', status = 1 WHERE complaint_id = '$complaint_id'";
    $sql = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    echo "<script>window.alert('ACTION WAS SUCCESSFUL')</script>";
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
                        <h2 class="pageheader-title">Assign Service Centers to Complaint</h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>

                    </div>
                </div>
            </div>

            <div class="form-group row text-left">
                <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                    <a href="manage_service_center.php" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"> Back</i> </a>
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
                                        <th>TITLE</th>
                                        <th>LOCATION</th>
                                        <th>ACTION</th>

                                    </tr>

                                    </thead>
                                    <tbody>

                                    <?php
                                    $count = 1;
                                    $cq=mysqli_query($conn,"select * from complaint where status = 0");

                                    while($row=mysqli_fetch_array($cq)){
                                        $centers = mysqli_query($conn,"select * from service_center");
                                        ?>
                                        <tr>

                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['complaint_title']; ?></td>
                                            <td><?php echo $row['location']; ?></td>
                                            <td>
                                                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                                    <input type="hidden" name="complaint_id" value="<?=$row['complaint_id']?>">
                                                    <div class="form-group">
                                                        <label for="">Service centers</label>
                                                        <select name="center" id="" class="form-control" required>
                                                            <option value="">--select center--</option>
                                                            <?php
                                                            while ($c = mysqli_fetch_assoc($centers)):
                                                            ?>
                                                                <option value="<?=$c['sc_id']?>"><?=$c['address']?></option>
                                                                <?php
                                                            endwhile;
                                                                ?>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Assign</button>
                                                </form>
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