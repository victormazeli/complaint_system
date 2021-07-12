<?php
include ('includes/session.php'); 
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
<link href="style.css" rel="stylesheet" type="text/css" />
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
<body bgcolor="">

<div style="margin-left:50px;">
 <form name="" id="" method="post"> 
<table width="50%" align="center" class="datatable-1 table table-bordered table-striped   display" border="2" >
    <tbody>
<?php 

$ret1=mysqli_query($conn,"SELECT * FROM complainant WHERE complainant_id='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret1))
{
?>
<br>
<br>
    <tr>
      <td colspan="2"><b><?php echo $row['first_name']." ". $row['last_name'];?>'s Profile</b></td>
      
    </tr>    
    <tr>
   
    </tr>
    <tr height="50">
      <td><b>Reg Date:</b></td>
      <td><?php echo htmlentities($row['date_reg']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Email: </b></td>
      <td><?php echo htmlentities($row['email']); ?></td>
    </tr>


      <tr height="50">
      <td><b>Tel. No:</b></td>
      <td><?php echo htmlentities($row['tel_number']); ?></td>
    </tr>
    


        <tr height="50">
      <td><b>Address:</b></td>
      <td><?php echo htmlentities($row['address']); ?></td>
    </tr>


        <tr height="50">
      <td><b>LGA:</b></td>
      <td><?php echo htmlentities($row['local_govt']); ?></td>
    </tr>


        <tr height="50">
      <td><b>Meter No.:</b></td>
      <td><?php if($row['meter_num']=="NULL" || $row['meter_num']==""){      
        echo "Nill";}
        else{
      } echo htmlentities($row['meter_num']); ?></td>
    </tr>  


        <tr height="50">
      <td><b>Last Update Date:</b></td>
      <td><?php echo htmlentities($row['date_modified']); ?></td>
    </tr>
    <tr>
  
      <td colspan="2" align="center">   
     <a href="javascript:void(0);" style="cursor: pointer;"  onClick="return f2();" title="Close Window">
                       <button type="button" class="btn btn-danger"><b>Close</b></button></a>
    </tr>
   
    <?php } 

 
    ?>
 
</table>
 </form>
</div>

</body>
</html>

  