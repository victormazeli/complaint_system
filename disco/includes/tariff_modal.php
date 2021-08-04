<!-- Add Tariff plan -->
<div class="modal fade" id="add_disco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Add New Tariff Plan</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="add_tf.php">
                        <div class="container-fluid">
                            <div style="height:15px;"></div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Name:</span>
                                <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Rate:</span>
                                <input type="number" style="width:400px;" class="form-control" name="rate">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:120px;" class="input-group-addon">Vat:</span>
                                <input type="number" style="width:400px;" class="form-control" name="vat">
                            </div>
                        </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Tariff plan -->
<div class="modal fade" id="edit_<?php echo $sc_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Edit Tariff Plan</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="edit_tf.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div style="height:15px;"></div>
                            <div class="form-group input-group">
                                <span style="width:150px;" class="input-group-addon">Name:</span>
                                <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="name" value="<?=htmlentities($row['name']); ?>">
                            </div>

                            <div class="form-group input-group">
                                <span style="width:150px;" class="input-group-addon">Rate:</span>
                                <input type="number" style="width:330px;" class="form-control" name="rate" value="<?=htmlentities($row['rate']); ?>">
                            </div>
                            <div class="form-group input-group">
                                <span style="width:150px;" class="input-group-addon">Vat:</span>
                                <input type="number" style="width:330px;" class="form-control" name="vat" value="<?=htmlentities($row['vat']); ?>">
                            </div>
                            <div class="form-group input-group" hidden="">
                                <span style="width:150px;" class="input-group-addon">:</span>
                                <input type="hidden" style="width:330px;" class="form-control" name="sc_id" value="<?php echo $sc_id; ?>">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-success" name="submit" ><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Delete Service Center -->
<div class="modal fade" id="del_<?php echo $sc_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Confirm Action</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?php
                    $a=mysqli_query($conn,"SELECT * FROM tariff where id='$sc_id'");
                    $b=mysqli_fetch_array($a);
                    ?>
                    <h5><center>Are you sure you want to delete <strong><br>
                                <?php echo $b['name']; ?> ?</strong></center></h5>
                </div>
            </div>
            <form role="form" method="POST" action="delete_tf.php<?php echo '?sc_id='.$sc_id; ?>">

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
            </form>
        </div>
    </div>
</div>
</div>
<!-- /.modal -->

<!-- Edit LGA -->
<div class="modal fade" id="lga<?php echo $lga_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <?php
    $a=mysqli_query($conn,"select * from local_govt where lga_id = $lga_id");
    $row=mysqli_fetch_array($a);
    ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Edit LGA</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="edit_sc.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div style="height:15px;"></div>
                            <div class="form-group input-group">
                                <span style="width:150px;" class="input-group-addon">Name:</span>
                                <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="name" value="<?php echo htmlentities($row['name']); ?>">
                            </div>
                            <div class="form-group input-group" hidden="">
                                <span style="width:150px;" class="input-group-addon">:</span>
                                <input type="text" style="width:330px;" class="form-control" name="lga_id" value="<?php echo $lga_id; ?>">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-success" name="submit" ><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



