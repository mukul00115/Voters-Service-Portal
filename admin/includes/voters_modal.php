<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3C8DBC">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add New Voter</b></h4>
            </div>
            <div class="modal-body" style="background-color: #F1E9D2">
                <form class="form-horizontal" method="POST" action="voters_add.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="lastname" class="col-sm-3 control-label">Lastname</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">Firstname</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="col-sm-3 control-label">Mobile</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="mobile" name="mobile" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">Password</label>

                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="voters_id" class="col-sm-3 control-label">Voter's ID</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="voters_id" name="voters_id" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo</label>

                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo">
                        </div>
                    </div>
                    <!-- New fields -->
                    <div class="form-group">
                        <label for="fathersname" class="col-sm-3 control-label">Father's Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fathersname" name="fathersname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mothersname" class="col-sm-3 control-label">Mother's Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="mothersname" name="mothersname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="age" class="col-sm-3 control-label">Age</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="age" name="age">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="col-sm-3 control-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="dob" name="dob">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="gender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="house" class="col-sm-3 control-label">House</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="house" name="house">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="street" class="col-sm-3 control-label">Street</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="street" name="street">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="town" class="col-sm-3 control-label">Town</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="town" name="town">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pincode" class="col-sm-3 control-label">Pincode</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="pincode" name="pincode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="state" class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="state" name="state">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="parliamentary" class="col-sm-3 control-label">Parliamentary</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="parliamentary" name="parliamentary">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="district" class="col-sm-3 control-label">District</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="district" name="district">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="aadhar" class="col-sm-3 control-label">Aadhar</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="aadhar" name="aadhar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="aadharfile" class="col-sm-3 control-label">Upload Aadhar</label>
                        <div class="col-sm-9">
                            <input type="file" id="aadharfile" name="aadharfile">
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background-color:#3C8DBC">
                    <button type="button" class="btn btn-default btn-curve" data-dismiss="modal" style="background-color: #F1E9D2; color:black; font-size: 12px; font-family:Times">Close</button>
                    <button type="submit" class="btn btn-primary btn-curve" name="add" style="background-color: #9CD095; color:black; font-size: 12px; font-family:Times">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#4682B4; color: black; font-family: Times;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Voter</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="voters_edit.php">
                    <input type="hidden" class="id" name="id">
                    <div class="form-group">
                        <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_lastname" name="lastname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_firstname" name="firstname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="edit_email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_mobile" class="col-sm-3 control-label">Mobile</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_mobile" name="mobile">
                        </div>
                    </div>
                    <!-- Add new fields -->
                    <div class="form-group">
                        <label for="edit_fathersname" class="col-sm-3 control-label">Father's Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_fathersname" name="fathersname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_mothersname" class="col-sm-3 control-label">Mother's Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_mothersname" name="mothersname">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_age" class="col-sm-3 control-label">Age</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_age" name="age">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_dob" class="col-sm-3 control-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_dob" name="dob">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_gender" class="col-sm-3 control-label">Gender</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_gender" name="gender">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_house" class="col-sm-3 control-label">House</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_house" name="house">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_street" class="col-sm-3 control-label">Street</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_street" name="street">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_town" class="col-sm-3 control-label">Town</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_town" name="town">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_pincode" class="col-sm-3 control-label">Pincode</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_pincode" name="pincode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_state" class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_state" name="state">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_parliamentary" class="col-sm-3 control-label">Parliamentary</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_parliamentary" name="parliamentary">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_district" class="col-sm-3 control-label">District</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit_district" name="district">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="edit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #d8d1bd">
            <div class="modal-header" style="background-color:#3C8DBC">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body" style="background-color: #F1E9D2">
                <form class="form-horizontal" method="POST" action="voters_delete.php">
                    <input type="hidden" class="id" name="id">
                    <div class="text-center">
                        <p style="color:black; font-size: 15px; font-family:Times">DELETE VOTER</p>
                        <h2 class="bold fullname" style="color:black; font-size: 17px; font-family:Times"></h2>
                    </div>
            </div>
            <div class="modal-footer" style="background-color:#3C8DBC">
                <button type="button" class="btn btn-default btn-curve" data-dismiss="modal" style="background-color: #d8d1bd; color:black; font-size: 12px; font-family:Times"><i class="fa fa-times"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-curve" name="delete" style="background-color:#ff8e88; color:black; font-size: 12px; font-family:Times"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Photo Modal -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Update Photo</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="voters_photo.php" enctype="multipart/form-data">
                    <input type="hidden" class="id" name="id">
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="upload" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


