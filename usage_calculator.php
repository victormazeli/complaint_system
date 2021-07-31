<?php 
include ('includes/session.php');
$myVat = "SELECT * FROM tariff WHERE status =1";
$myVat = mysqli_query($conn, $myVat);

if(isset($_POST['submit'])) {
    $itemByWatt = 0;
    for ($x = 0; $x <= count($_POST['name'])-1; $x++) {
        /**
         * multiply the wattage by the application unit for each
         * then multiply by the number of hours the appliance was on
         */
        $name = $_POST['name'][$x];
        $query = "SELECT * FROM appliances WHERE id = '$name'";
        $app = mysqli_fetch_assoc(mysqli_query($conn, $query));

        $itemByWatt = $itemByWatt + (($_POST['unit'][$x] * $app['max_watt']) * $_POST['usage'][$x]);
    }

    /**
     * go ahead to multiply the itemByWatt by 30 to het the monthly consumption
     */
    $monthlyConsumption = $itemByWatt * 30;

    /**
     * get the unit price and vat
     */

    $query = "SELECT * FROM company_policy WHERE `status`=1";
    $run_query = mysqli_query($conn, $query);
    if($data=mysqli_fetch_array($run_query))
    {
        $vat = $data['vat'];
        $totalCost = $monthlyConsumption * $_SESSION['tariff'];
        echo "<script>
            window.alert('Estimated cost = N$totalCost || VAT = N$vat');
            window.history.back();
        </script>";
    }
}
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
                <h2 class="pageheader-title">Usage Calculator || N<?=$_SESSION['tariff']?></h2>
            </div>
        </div>
    </div>                  
</div>

 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Fill the form below to register your complaints</h5>
            <div class="card-body">
                <form id="" method="POST" action="calculated.php">
                    <div id="addition">
                        <div id="added-row">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="text-sm-right">Name</label>
                                        <select name="name[]" id="watt_name" class="form-control" required>
                                            <option value="">--select appliance name--</option>
                                            <?php
                                            $query = "SELECT * FROM appliances";
                                            $app = mysqli_query($conn, $query);
                                            while ($a = mysqli_fetch_assoc($app)):
                                            ?>
                                            <option value="<?=$a['id']?>" data-watt="<?=$a['max_watt']?>">
                                                <?=$a['name']?> || <?=$a['max_watt']?>watt
                                            </option>
                                            <?php
                                            endwhile;
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="text-sm-right">Usage (hour)</label>
                                        <input type="number" placeholder="How many hours a day is it in use?" class="form-control" name="usage[]" required="" max="24">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="text-sm-right">Units</label>
                                        <input type="number" placeholder="number of this appliance in use" class="form-control" name="unit[]" required="" >
                                    </div>
                                </div>
                                <input type="hidden" name="submit" value="1">
                                <a href="#" id="remove"><i class="fa fa-minus-square">Remove</i></a>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="button" class="btn btn-space btn-warning" data-toggle="modal" data-target="#myModal"><i class="fa fa-recycle">Change tariff</i></button>
                            <button type="button" class="btn btn-space btn-success" id="add-new"><i class="fa fa-plus-square">Add Item</i></button>
                            <button type="submit" class="btn btn-space btn-primary" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
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
    <script>
        $(function(){
            $("#add-new").click(function(){
                var add = ""
                <?php
                $query = "SELECT * FROM appliances";
                $app = mysqli_query($conn, $query);
                while ($a = mysqli_fetch_assoc($app)):
                ?>
                var add = add + "<option value=\"<?=$a['id']?>\" data-watt=\"<?=$a['max_watt']?>\">\n" +
                    "                    <?=$a['name']?> || <?=$a['max_watt']?>watt\n" +
                    "                    </option>"
                <?php
                endwhile;
                ?>
                var add = add + "</select>\n" +
                    "                    </div>\n" +
                    "                    </div>"

                var html = "<div id=\"added-row\">\n" +
                        "<div class='row'>\n"+
                    "                            <div class=\"col\">\n" +
                    "                    <div class=\"form-group\">\n" +
                    "                    <label class=\"text-sm-right\">Name</label>\n" +
                    "                    <select name=\"name[]\" id=\"watt_name\" class=\"form-control\" required>\n" +
                    "                <option value=\"\">--select appliance name--</option>" + add +
                    "                                <div class=\"col\">\n" +
                    "                                    <div class=\"form-group\">\n" +
                    "                                        <label class=\"text-sm-right\">Usage (hour)</label>\n" +
                    "                                        <input type=\"number\" placeholder=\"How many hours a day is it in use?\" class=\"form-control\" name=\"usage[]\" required=\"\" >\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                                <div class=\"col\">\n" +
                    "                                    <div class=\"form-group\">\n" +
                    "                                        <label class=\"text-sm-right\">Units</label>\n" +
                    "                                        <input type=\"number\" placeholder=\"number of this appliance in use\" class=\"form-control\" name=\"unit[]\" required=\"\" >\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                                <a href=\"#\" id=\"remove\"><i class=\"fa fa-minus-square\">Remove</i></a>\n" +
                    "                            </div>\n" +
                    "                            <hr>\n" +
                    "                        </div>"
                +"</div>"
                $("#addition").append(html)
            })

            // remove row
            $(document).on('click', '#remove', function () {
                $(this).closest('#added-row').remove();
            });
        })
    </script>
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
