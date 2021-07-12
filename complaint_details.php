<?php 
include ('includes/session.php');

        $user = $_SESSION['login'];
          $query = "SELECT * FROM complainant WHERE `complainant_id`='$user'";
            $run_query = mysqli_query($conn, $query);
            $data=mysqli_fetch_array($run_query);
            $date = date("y:m:d h:i:s");

           $complainant_id =$data['complainant_id'];

           $log = "INSERT INTO `log` VALUES ('', '$user', 'Print Complaint Report', '$date', 'commplainant')";
            if($query = mysqli_query($conn, $log)){
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
    <script type="text/javascript">
        function printContent (el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
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
        <div class="dashboard-wrapper" id="cd">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row" id="cd">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">Complaint Details</h2>
                                </div>
                            </div>
                        </div>                  
                    </div>
      
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="50%">
                                    
                                    <tbody>

<?php $st='closed';
            $cq=mysqli_query($conn,"SELECT * FROM complaint where complaint_id='".$_GET['com_id']."'");


                while($row=mysqli_fetch_array($cq)){
?>                                  
                                        <tr>
                                            <td rowspan=""><b>Complaint Number</b></td>
                                            <td rowspan=""><?php echo ($row['complaint_id']);?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Complaint Title</b></td>
                                            <td><?php echo htmlentities($row['complaint_title']);?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Complaint Details</b></td>
                                            
                                            <td colspan=""> <?php echo htmlentities($row['complaint_details']);?></td>
                                            
                                        </tr>
                                          <tr>
                                            <td><b>Registration Date</b></td>
                                            <td><?php echo htmlentities($row['date_reg']);?></td>
                                        </tr>        
                                            <tr>
<td><b>Final Status</b></td>
                                            
                                            <td colspan=""><?php if($row['status']=="0")
                                            { echo "Complaint Not in Process Yet";
                                                } else if($row['status']=="1"){
                                                    echo "Complaint in Progress";
                                                }else
                                                {
                                                echo "Complaint is Closed";
                                         }?></td>
                                            
                                        </tr>

<?php

$cqq=mysqli_query($conn, "SELECT * FROM `complaint_remark` WHERE complaint_id='".$_GET['com_id']."' ");


while($rw=mysqli_fetch_array($cqq))
{
?>
<tr>
<td><b>Remark</b></td>
<td colspan=""><?php echo  htmlentities($rw['remark']); ?>    ||  <b>Remark Date :</b><?php echo  htmlentities($rw['remark_date']); ?></td>
</tr>

<tr>
<td><b>Status</b></td>
<td colspan=""><?php if ($rw['status']=="1"){

    echo "In Progress"; }
    else {echo "Closed";}?></td>
</tr>
<?php }?>

                <tr>
                <td align="center"><a href="complaint_history.php" title="Go Back">
                 <button type="button" class="btn btn-info">Go Back</button></a></td>

                 <td align=""><a href="" title="Print">
                 <button type="button" class="btn btn-success" onclick="printContent('cd')">Print Report</button></a></td>

                                        </tr>
                                        <?php  } ?>
                                    </td>
                                </tbody>
                                        
                                </table>  
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
