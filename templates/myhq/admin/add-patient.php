<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-primary" href="/myhq/patients">
                        <i class="fa fa-list"></i> Manage Patients </a>
                </div>
            </div>
            <div class="panel-body">
                <form class="row" action="/ajax/add-patient" method="post" enctype="multipart/form-data">

                    <div class="col-sm-4 col-md-4 alert alert-success">
                        <div class="row">
                            <div class="col-sm-12 col-md-12  form-group">
                                <label>Hospital Number</label>
                                <input type="text" class="form-control form-control-lg" name="hid" readonly="readonly" value="<?= $hid ?>" required>
                            </div>
                            <div class="col-sm-12 col-md-12  form-group">
                                <label>Access Password</label>
                                <input type="text" class="form-control form-control-lg" name="accesscode" readonly="readonly" value="<?= $Core->GenPassword(6) ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8 col-md-8">

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="fn" class="form-control" placeholder="Enter First Name" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="ln" class="form-control" placeholder="Enter last Name" required>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile" required>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label>Email (if any)</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?= "{$hid}@nohenugu.org.ng" ?>" required>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input name="date_of_birth" class="form-control" type="date" placeholder="Date of Birth" required>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label>Sex</label><br>
                                    <label class="radio-inline"><input name="sex" value="Male" type="radio" required>Male</label>
                                    <label class="radio-inline"><input name="sex" value="Female" type="radio" required>Female</label>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4">
                                <div class="form-check">
                                    <label>Status</label><br>
                                    <label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Active</label> 
                                    <label class="radio-inline"><input type="radio" name="status" value="0">Inactive</label>
                                </div>
                            </div>
                        </div>



                        <div class="reset-button">
                            <button type="submit" class="btn btn-success">Add New Patient</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>