<!-- View Complainant -->
    <div class="modal fade" id="view_<?php echo $complainant_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <?php
        $a=mysqli_query($conn,"SELECT * FROM complainant WHERE complainant_id = $complainant_id");
        $row=mysqli_fetch_array($a);
    ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                     <center><h4 class="modal-title" id="myModalLabel">Complainant Details</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="edit_disco.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <div class="form-group input-group" >
                            <span style="width:150px;" class="input-group-addon">First Name:</span>
                            <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="name" value="<?php echo ucwords($row['first_name']); ?>" disabled>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Last Name:</span>
                            <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="abbreviation" value="<?php echo ucwords($row['last_name']); ?>" disabled>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Email Address:</span>
                            <input type="text" style="width:330px;" class="form-control" name="username" value="<?php echo $row['email']; ?>" disabled>
                        </div>
                         <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Meter Number:</span>
                            <input type="text" style="width:330px;" class="form-control" name="password" value="<?php echo $row['meter_num']; ?>" disabled>
                        </div>
                         <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Username:</span>
                            <input type="text" style="width:330px;" class="form-control" name="address" value="<?php echo $row['username']; ?>" disabled>
                        </div>
                        <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Telephone Number:</span>
                            <input type="email" style="width:330px;" class="form-control" name="email" value="<?php echo $row['tel_number']; ?>" disabled>
                        </div>
                         <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Address:</span>
                            <input type="text" style="width:330px;" class="form-control" name="" value="<?php echo $row['address']; ?>" disabled>
                        </div>
                         <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Reg Date:</span>
                            <input type="text" style="width:330px;" class="form-control" name="" value="<?php echo $row['date_reg']; ?>" disabled>
                        </div>
                         <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Modified Date:</span>
                            <input type="text" style="width:330px;" class="form-control" name="" value="<?php echo $row['date_modified']; ?>" disabled>
                        </div>
                         <div class="form-group input-group" hidden="">
                            <span style="width:150px;" class="input-group-addon"></span>
                            <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="complainant_id" value="<?php echo $complainant_id; ?>">
                        </div>
                        </div>
                </div>                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- Logout -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Are you sure you want to logout?</h4></center>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    
                    <p>Click Confirm Button to Logout</p></center> 
                </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <a href="../logout.php" class="btn btn-danger"><i class="fa fa-sign-out"></i>Confirm</a>
                </div>
                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<!-- Delete Service Center -->    
        <div class="modal fade" id="del_<?php echo $complainant_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                     <center><h4 class="modal-title" id="myModalLabel">Confirm Action</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"SELECT * FROM complainant where complainant_id='$complainant_id'");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <h5><center>Are you sure you want to delete <strong><br>
                        <?php echo $b['first_name']." ". $b['last_name']; ?> ?</strong></center></h5>
                    </div>                 
                </div>
                    <form role="form" method="POST" action="delete_user.php<?php echo '?cid='.$complainant_id; ?>">
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>