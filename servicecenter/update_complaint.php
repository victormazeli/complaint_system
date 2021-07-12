<?php
include ("includes/session.php");
  if(isset($_POST['update']))
  {
$complaint_id=$_GET['cid'];
$status=$_POST['status'];
$remark=$_POST['remark'];
$date_modified = date("y:m:d h:i:s");

$query=mysqli_query($conn,"INSERT INTO complaint_remark VALUES ('','$complaint_id','$status','$remark','$date_modified')");
$sql=mysqli_query($conn,"UPDATE complaint SET status='$status', date_modified='$date_modified' WHERE complaint_id='$complaint_id'");

echo "<script>alert('Complaint details updated successfully');</script>";

  }

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Profile</title>
<link href="style.css" rel="stylesheet" type="text/css"/>
<link href="anuj.css" rel="stylesheet" type="text/css">

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

<div style="margin-left:50px; text-align: center; ">
 <form name="updateticket" id="updatecomplaint" method="post" action=""> 
<table width="100%" border="" cellspacing="0" cellpadding="0" class="datatable-1 table table-bordered table-striped   display" width="50%">
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Complaint Number</b></td>
      <td><?php echo htmlentities($_GET['cid']); ?></td>
    </tr>
    <tr height="">
      <td ><b>Status</b></td>
      <td ><select name="status" class="btn btn-info dropdown-toggle" required="">
      <option value="0" >Select Status</option>
      <option value="1">In Process</option>
    <option value="2">Closed</option>
        
      </select></td>
    </tr>


      <tr height="">
      <td><b>Remark</b></td>
      <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
    </tr>
    


        <tr height="">
      <td><input type="submit" name="update" value="Submit" class="btn btn-rounded btn-primary"></td>
      <td><input name="Submit2" type="submit" class="btn btn-rounded btn-danger" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td></td>
    </tr>
    
    <tr>
  <td></td>
      <td >   
     
    </tr>
   

 
</table>
 </form>
</div>

</body>
</html>
