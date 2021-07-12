<!--Create acoount modal-->
 <div class="modal fade" id="create_account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Create Account</h4></center>
                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="register.php" name="" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:5px;"></div>

                        <div style="height:5px;">
                            <span>Please Make Sure You Provide Correct Details...</span><br>
                              <span style="color: red; text-align: left;">*-Feilds Must Not Be Empty</span>
                        </div>                      
                        <div style="height: 50px;"></div>
                            <hr style="height:2px; border-color: blue;">
						<div class="form-group input-group">
                            <span style="width:120px; text-align: left;" class="input-group-addon">First Name:<span style="color: red;">*</span></span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="fname" required>
                        </div>
                        <hr style="height:2px; border-color: blue;">
						<div class="form-group input-group">
                            <span style="width:120px;  text-align: left;" class="input-group-addon">Last Name:<span style="color: red;">*</span></span>
                            <input type="text" style="width:400px; text-transform:capitalize;" class="form-control" name="lname" required>
                        </div>
                         <hr style="height:2px; border-color: blue;">
                         <div class="form-group input-group">
                            <span style="width:120px;  text-align: left;" class="input-group-addon">Email:<span style="color: red;">*</span></span>
                            <input type="email" style="width:400px;" class="form-control" name="email" required>
                        </div>
                         <hr style="height:2px; border-color: blue;">
                        <div class="form-group input-group">
                            <span style="width:120px;  text-align: left;" class="input-group-addon">Meter Number:</span>
                            <input type="text" style="width:400px;" class="form-control" name="meternum">
                        </div>
                         <hr style="height:2px; border-color: blue;">
						<div class="form-group input-group">
                            <span style="width:500px;  text-align: left;" class="input-group-addon">Telephone Number<span style="color: red;">*</span>: (0XXXXXXXXXX)</span>
                            <input type="number" style="width:400px;" class="form-control" name="telnum" required>
                        </div>
                         <hr style="height:2px; border-color: blue;">
                        <div class="form-group input-group">
                            <span style="width:250px;  text-align: left;" class="input-group-addon">Address:<span style="color: red;">*</span> (Street)</span>
                            <input type="text" style="width:400px;" class="form-control" name="address" required>
                        </div> 
                         <hr style="height:2px; border-color: blue;">
                        <div class="form-group input-group">
                            <span style="width:120px;  text-align: left;" class="input-group-addon">LGA:<span style="color: red;">*</span></span>
                            <select type="text" style="width:400px;" class="form-control" name="lga" required>
                                <option value="">Select LGA</option>
                                <?php $query=mysqli_query($conn, "select lga_name from local_govt");
                                while ($row=mysqli_fetch_array($query)) {
                                 ?>

                                 <option value="<?php echo htmlentities($row['lga_name']); ?>"><?php echo htmlentities($row['lga_name']); ?></option>
                                 <?php
                             }
                             ?>

                            </select>
                        </div> 
                         <hr style="height:2px; border-color: blue;">
                        <div class="form-group input-group">
                            <span style="width:120px;  text-align: left;" class="input-group-addon">Username:<span style="color: red;">*</span></span>
                            <input type="text" style="width:400px;" class="form-control" name="username" required>
                        </div> 
                         <hr style="height:2px; border-color: blue;">
                        <div class="form-group input-group">
                            <span style="width:120px;  text-align: left;" class="input-group-addon">Password:<span style="color: red;">*</span></span>
                            <input type="password" style="width:400px;" class="form-control" name="password" required>
                        </div>  						
						</div>


				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
					</form>
                </div>
			</div>
		</div>
    </div>
