<?php 
include ('includes/session.php');

if(isset($_POST['submit'])) {
    $itemByWatt = 0;
    for ($x = 0; $x <= count($_POST['name'])-1; $x++) {
        /**
         * multiply the wattage by the application unit for each
         * then multiply by the number of hours the appliance was on
         */
        $itemByWatt = $itemByWatt + (($_POST['unit'][$x] * $_POST['watt'][$x]) * $_POST['usage'][$x]);
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
        $totalCost = $monthlyConsumption * $data['unit_price'];
        echo "<script>
            window.alert('Estimated cost = N$totalCost || VAT = N$vat');
            window.history.back();
        </script>";
    }
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
                <h2 class="pageheader-title">Usage Calculator </h2>
            </div>
        </div>
    </div>                  
</div>

 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Fill the form below to register your complaints</h5>
            <div class="card-body">
                <form id="" method="POST" action="">
                    <div id="addition">
                        <div id="added-row">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="text-sm-right">Name</label>
                                        <input type="text"  maxlength="40" placeholder="Enter appliance name" class="form-control" name="name[]" required="" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="text-sm-right">Watt</label>
                                        <input type="number" placeholder="enter the wattage" class="form-control" name="watt[]" required="" >
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
                                <a href="#" id="remove"><i class="fa fa-minus-square">Remove</i></a>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
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
                var html = "<div id=\"added-row\">\n" +
                    "                            <div class=\"row\">\n" +
                    "                                <div class=\"col\">\n" +
                    "                                    <div class=\"form-group\">\n" +
                    "                                        <label class=\"text-sm-right\">Name</label>\n" +
                    "                                        <input type=\"text\"  maxlength=\"40\" placeholder=\"Enter appliance name\" class=\"form-control\" name=\"name[]\" required=\"\" >\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
                    "                                <div class=\"col\">\n" +
                    "                                    <div class=\"form-group\">\n" +
                    "                                        <label class=\"text-sm-right\">Watt</label>\n" +
                    "                                        <input type=\"number\" placeholder=\"enter the wattage\" class=\"form-control\" name=\"watt[]\" required=\"\" >\n" +
                    "                                    </div>\n" +
                    "                                </div>\n" +
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
                $("#addition").append(html)
            })
            /*$("#remove").click(function () {
                console.log(this)
                $(this).closest("#added-row").remove()
            })*/
            // remove row
            $(document).on('click', '#remove', function () {
                $(this).closest('#added-row').remove();
            });
        })
    </script>
</body>

</html>
