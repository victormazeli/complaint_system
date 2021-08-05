<?php 
include ('includes/session.php');
$myVat = "SELECT * FROM tariff WHERE status =1";
$myVat = mysqli_query($conn, $myVat);
if (isset($_GET['tariff']))
{
    $_SESSION["tariff"] = $_GET['tariff'];
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
    <style>
        table {
            width: 100%;

        }

        th 	{
            background-color: #2196F3;
            color: white;
            padding: 8px;
        }
        td 	{
            padding: 8px;
        }

        tr:nth-child(even){
            background-color: #f2f2f2
        }

        #icon {
            padding-bottom: 10px;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 100%
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }
        }

        .labels tr td {
            background-color: #90CAF9;
            font-weight: bold;
            color: #fff;
        }

        label{
            cursor: pointer;
        }

        [data-toggle="toggle"] {
            display: none;
        }
    </style>
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
                <h2 class="pageheader-title">Usage Calculated || N<?=$_SESSION['tariff']?></h2>
            </div>
        </div>
    </div>                  
</div>

 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Calculated bill</h5>
            <div class="card-body">
                <section class="page_loop">
                    <!--content here-->
                    <table cellpadding="0" cellspacing="2" border="1" class="calculator" width="100%">

                        <tbody><tr>
                            <th>
                                Appliance
                            </th>
                            <th>
                                Standard Load (WATTS)
                            </th>
                            <th valign="middle" align="center">
                                Average Daily Consumption(Hours/Day)
                            </th>
                            <th>
                                &nbsp;
                            </th>
                            <th valign="middle" align="center">
                                Number Of Items
                            </th>
                            <th valign="middle" align="center">
                                Expected Average Unit Consumed /Day
                            </th>
                        </tr>
                        </tbody><tbody>
                        </tbody>
                        <tbody class="collapse" style="display: table-row-group;">
                        <?php
                        if(isset($_POST['submit'])) {
                        $itemByWatt = 0;
                        $exp = 0;
                            for ($x = 0; $x <= count($_POST['name'])-1; $x++) {
                                /**
                                * multiply the wattage by the application unit for each
                                * then multiply by the number of hours the appliance was on
                                */
                                $name = $_POST['name'][$x];
                                $query = "SELECT * FROM appliances WHERE id = '$name'";
                                $app = mysqli_fetch_assoc(mysqli_query($conn, $query));

                                $itemByWatt = $itemByWatt + (($_POST['unit'][$x] * $app['max_watt']) * $_POST['usage'][$x]);
                                ?>
                        <tr>
                            <td>
                                <?=$app['name']?>
                            </td>
                            <td>
                                <?=$app['max_watt']?>
                            </td>
                            <td valign="middle" align="center">
                                <input type="number" value="<?=$_POST['usage'][$x]?>" disabled>
                            </td>
                            <td>
                                &nbsp;
                            </td>
                            <td valign="middle" align="center">
                                <input type="number" value="<?=$_POST['unit'][$x]?>" disabled>
                            </td>
                            <td valign="middle" align="center">
                                <?=$ep=(($app['max_watt']/1000)*$_POST['usage'][$x])*$_POST['unit'][$x]?>
                                <?php
                                $exp = $exp+ $ep;
                                ?>
                            </td>
                        </tr>
                                <?php
                            }

                        /**
                        * go ahead to multiply the itemByWatt by 30 to het the monthly consumption
                        */
                        $monthlyConsumption = $exp * 30;

                        /**
                        * get the unit price and vat
                        */

                        $query = "SELECT * FROM company_policy WHERE `status`=1";
                        $run_query = mysqli_query($conn, $query);
                            if($data=mysqli_fetch_array($run_query))
                        {
                        $vat = $data['vat'];
                        $totalCost = $monthlyConsumption * $_SESSION['tariff'];
                        $totalCost = $totalCost + ((10/100)*$totalCost);

                        }
                        }
                        ?>

                        </tbody>

                        <tbody><tr style="border:1px #000 solid;height:30px;">
                            <td colspan="5" align="right" valign="middle" style="margin-right:5px;">
                                <b>Total Average Unit consumed per day</b>
                            </td>
                            <td valign="middle" align="center">
                                <label id="TotalAverageUnits"> <?=$exp?> </label>
                            </td>
                        </tr>
                        <tr style="border:1px #000 solid; height:30px;">
                            <td colspan="5" align="right" valign="middle" style="padding-right:5px;" height="100%">
                                <b>Number of days availability</b>
                            </td>
                            <td valign="middle" align="center">
                                <input type="number" id="NoOfDays" value="30" disabled>
                            </td>
                        </tr>
                        <tr style="border:1px #000 solid;height:30px;">
                            <td colspan="5" align="right" valign="middle" style="margin-right:5px;">
                                <b>Estimated Units Consumed in the month-period</b>
                            </td>
                            <td valign="middle" align="center">
                                <label id="UnitConsumedInMonth"> <?=$monthlyConsumption?> </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Tariff</b>
                            </td>

                            <td>
                                <select id="Tariff" disabled>
                                    <option value="">N<?=$_SESSION['tariff']?></option>
                                </select>
                            </td>
                            <td>
                                VAT: 10%
                            </td>
                            <td></td>
                            <td align="right"><b>Applicable rate</b></td>
                            <td valign="middle" align="center">
                                <label id="ApplicableRate"><?=$_SESSION['tariff']?></label>
                            </td>
                        </tr>
                        <tr style="border:2px #000 solid;height:30px;">
                            <td colspan="5" align="right" valign="middle" style="margin-right:5px;">
                                <b>ESTIMATED BILLED AMOUNT</b>
                            </td>
                            <td valign="middle" align="center" style="font-weight:bold;">
                                <label id="BilledAmount">N<?=$totalCost?></label>
                            </td>
                        </tr>
                        </tbody></table>
                </section>
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
    <!-- The Modal -->
    <div class="modal <?php echo (isset($_SESSION['tariff']))? "fade": ""?> hide" id="myModal" role="dialog" <?php echo(!isset($_SESSION['tariff']))? "data-backdrop='static' data-keyboard='false'":"";?>>
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form action="" method="get">
                <div class="modal-header">
                    <?php
                    if (isset($_SESSION['tariff']))
                    {
                    ?>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <?php
                    }
                    ?>
                    <h4 class="modal-title">Select Tariff</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <select name="tariff" id="" class="form-control" required>
                            <option value="">--select tariff--</option>
                            <?php
                            while($v = mysqli_fetch_assoc($myVat)) {
                            ?>
                            <option value="<?=$v['rate']?>"><?=$v['name']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <?php
                    if (isset($_SESSION['tariff']))
                    {
                    ?>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <?php
                    }
                    ?>
                </div>
                </form>
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
        <?php
        if (!isset($_SESSION['tariff']))
        {
            ?>
            <script type="text/javascript">
                $(window).on('load', function() {
                    $('#myModal').modal('show');
                });
            </script>
            <?php
        }
        ?>
</body>
</html>
