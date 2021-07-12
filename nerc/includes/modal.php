<!-- Add DISCO -->
    <div class="modal fade" id="add_disco" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Add New DISCO</h4></center>
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="add_disco.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Name:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="name" required>
                        </div>
						<div class="form-group input-group">
                            <span style="width:200px;" class="input-group-addon">Abbreviation:*In CAPS LOCK</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="abbreviation" required="">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Username:</span>
                            <input type="text" style="width:400px;" class="form-control" name="username">
                        </div>
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Password:</span>
                            <input type="password" style="width:400px;" class="form-control" name="password" required>
                        </div>
                           <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Address:</span>
                            <input type="text" style="width:400px;" class="form-control" name="address" required>
                        </div>  
						<div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Email:</span>
                            <input type="email" style="width:400px;" class="form-control" name="email" required>
                        </div>  
                        <div class="form-group input-group">
                            <span style="width:120px;" class="input-group-addon">Telphone Number:</span>
                            <input type="number" style="width:400px;" class="form-control" name="tel" placeholder="Enter 11 Digit Number" pattern="[0-9]{11}" required>
                        </div>  						
						</div>
				</div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary" name="submit" ><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
			</div>
		</div>
    </div>

<!-- Edit DISCO -->
    <div class="modal fade" id="edit_<?php echo $disco_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <?php
        $a=mysqli_query($conn,"SELECT * FROM disco WHERE disco_id = $disco_id");
        $row=mysqli_fetch_array($a);
    ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                     <center><h4 class="modal-title" id="myModalLabel">Edit DISCO</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <form role="form" method="POST" action="edit_disco.php" enctype="multipart/form-data">
                        <div class="container-fluid">
                        <div style="height:15px;"></div>
                        <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Name:</span>
                            <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="name" value="<?php echo ucwords($row['name']); ?>">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Abbreviation:</span>
                            <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="abbreviation" value="<?php echo ucwords($row['abbreviation']); ?>">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Username:</span>
                            <input type="text" style="width:330px;" class="form-control" name="username" value="<?php echo $row['username']; ?>">
                        </div>
                         <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Password:</span>
                            <input type="password" style="width:330px;" class="form-control" name="password" value="<?php echo $row['password']; ?>">
                        </div>
                         <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Address:</span>
                            <input type="text" style="width:330px;" class="form-control" name="address" value="<?php echo $row['address']; ?>">
                        </div>
                        <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Email:</span>
                            <input type="email" style="width:330px;" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                        </div>
                         <div class="form-group input-group">
                            <span style="width:150px;" class="input-group-addon">Telephone Number:</span>
                            <input type="number" style="width:330px;" class="form-control" name="tel" value="<?php echo $row['tel_number']; ?>">
                        </div>
                         <div class="form-group input-group" hidden="">
                            <span style="width:150px;" class="input-group-addon">Abbreviation:</span>
                            <input type="text" style="width:330px; text-transform:capitalize;" class="form-control" name="disco_id" value="<?php echo $disco_id; ?>">
                        </div>
                        </div>
                </div>                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Update</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->


<!-- Delete DISCO -->    
        <div class="modal fade" id="del_<?php echo $disco_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                     <center><h4 class="modal-title" id="myModalLabel">Confirm Delection</h4></center>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                <div class="container-fluid">
                    <?php
                        $a=mysqli_query($conn,"select * from disco where disco_id='$disco_id'");
                        $b=mysqli_fetch_array($a);
                    ?>
                    <h5><center>Are you sure you want to delete <strong><br>
                        <?php echo $b['name']; ?> ?</strong></center></h5>
                    </div>                 
                </div>
                    <form role="form" method="POST" action="delete_disco.php<?php echo '?disco_id='.$disco_id; ?>">
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- /.modal -->

