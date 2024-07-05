<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Admin Profile</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="profile_update.php?return=<?php echo basename($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                  <!-- Username Field -->
          		  <div class="form-group">
                  	<label for="username" class="col-sm-3 control-label">Username</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                  	</div>
                </div>

                  <!-- Email ID Field -->
                  <div class="form-group">
                  	<label for="email" class="col-sm-3 control-label">Email ID</label>
                  	<div class="col-sm-9">
                    	<input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                  	</div>
                </div>

                <!-- Firstname Field -->
                <div class="form-group">
                  	<label for="firstname" class="col-sm-3 control-label">Firstname</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
                  	</div>
                </div>

                <!-- Lastname Field -->
                <div class="form-group">
                  	<label for="lastname" class="col-sm-3 control-label">Lastname</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
                  	</div>
                </div>

                <!-- Mobile Number Field -->
                <div class="form-group">
                  	<label for="mobile" class="col-sm-3 control-label">Mobile Number</label>
                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $user['mobile']; ?>">
                  	</div>
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['password']; ?>">
                    </div>
                </div>

                <!-- Photo Upload Field -->
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo:</label>
                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                
                <!-- Divider -->
                <hr>
                
                <!-- Current Password Field -->
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">Current Password:</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Input current password to save changes" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
