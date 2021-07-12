<?php 
include ("includes/session.php");

        $sc = $_SESSION['login'];
          $query = "SELECT * FROM service_center WHERE `username`='$sc'";
            $run_query = mysqli_query($conn, $query);
            $data=mysqli_fetch_array($run_query);

           $location =$data['local_govt'];

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

<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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
                            <h3 class="card-header">Complaint Details</h3>
                            <div class="card-body">
                              
                               
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="50%">
									
									<tbody>

<?php $st='closed';
			$cq=mysqli_query($conn,"SELECT complaint.complaint_id, complaint.complaint_title, complainant.first_name, complaint.complaint_file, complaint.status, complaint.date_reg, complaint.complaint_details, complainant.last_name, complainant.complainant_id FROM complaint INNER JOIN complainant ON complaint.complainant_id=complainant.complainant_id where complaint.complaint_id='".$_GET['cid']."' AND location='$location'");


				while($row=mysqli_fetch_array($cq)){
?>									
										<tr>
											<td rowspan=""><b>Complaint Number</b></td>
											<td rowspan=""><?php echo ($row['complaint_id']);?></td>
										</tr>
										<tr>
											<td rowspan=""><b>Complainant Name</b></td>
											<td rowspan=""><?php echo htmlentities($row['first_name']." ".$row['last_name']);?></td>
										</tr>
										<tr>
											<td><b>Reg Date</b></td>
											<td><?php echo htmlentities($row['date_reg']);?></td>
										</tr>
										<tr>
											<td><b>Complaint Title</b></td>
											<td><?php echo htmlentities($row['complaint_title']);?></td>
										</tr>
										<tr>
											<td><b>Complaint Details </b></td>
											
											<td colspan=""> <?php echo htmlentities($row['complaint_details']);?></td>
											
										</tr>

											</tr>
										<tr>
											<td><b>File (if any) </b></td>
											
											<td colspan=""> <?php $cfile=$row['complaint_file'];
if($cfile=="" || $cfile=="NULL")
{
  echo "File NA";
}
else{?>
<a href="../complaintfiles/<?php echo htmlentities($row['complaint_file']);?>" target="_blank"/> View File</a>
<?php } ?></td>
</tr>

<tr>
<td><b>Final Status</b></td>
											
											<td colspan=""><?php if($row['status']=="0")
											{ echo "Not Process Yet";
												} else if($row['status']=="1"){
													echo "Still in Progress";
												}else
												{
										 		echo "Closed";
										 }?></td>
											
										</tr>

<?php

$cqq=mysqli_query($conn, "SELECT * FROM `complaint_remark` WHERE complaint_id='".$_GET['cid']."' ");


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
											<td><b>Action</b></td>
											
											<td> 
											<?php if($row['status']=="2"){

												echo "Complaint Already Closed, You Cant't Perform Any Action!";

												} else {?>
<a href="javascript:void(0);" onClick="popUpWindow('http://localhost/project/servicecenter/update_complaint.php?cid=<?php echo htmlentities($row['complaint_id']);?>');" title="Update order">
											 <button type="button" class="btn btn-primary">Take Action</button></td>
											</a><?php } ?></td></tr>
											<td>
											<td colspan=""> 
											<a href="javascript:void(0);" onClick="popUpWindow('http://localhost/project/servicecenter/user_profile.php?uid=<?php echo htmlentities($row['complainant_id']);?>');" title="Update order">
											 <button type="button" class="btn btn-info">View User Account Detials</button></a></td>
											
										</tr>
										<?php  } ?>
                                    </td>
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
    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>


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