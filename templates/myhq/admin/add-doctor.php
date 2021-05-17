<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-primary" href="/myhq/doctors"> <i class="fa fa-list"></i> Manage Doctors </a>
                </div>
            </div>
            <div class="panel-body">
                <form class="col-sm-12" action="/ajax/add-doctor" method="post" enctype="multipart/form-data">

                    <div class="col-sm-6 form-group">
                        <label>Picture upload</label>
                        <input type="file" name="picture" id="picture">
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Department</label>
                        <select class="form-control" id="department" name="department" size="1">
                            <option selected class="test">Select Department</option>
                            <?php while ($department = mysqli_fetch_object($departments)) : ?>
                                <option class="test" value="<?= $department->id ?>"><?= $department->department ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="Enter firstname" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Last Name(Surname)</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname" required>
                    </div>

                    <div class="col-sm-12 col-md-12 alert alert-success">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" readonly="readonly" value="<?= $password ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Mobile</label>
                        <input type="text" class="form-control" placeholder="Enter Mobile" name="mobile" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Date of Birth</label>
                        <input name="date_of_birth" class="form-control" type="date" id="date_of_birth">
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>Sex</label><br>
                        <label class="radio-inline">
                            <input type="radio" name="sex" value="Male" checked="checked">Male</label>
                        <label class="radio-inline"><input type="radio" name="sex" value="Female">Female</label>
                    </div>

                    <div class="col-sm-6 form-check">
                        <label>Status</label><br>
                        <label class="radio-inline"><input type="radio" name="status" value="0">Inactive</label>
                        <label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Active</label>
                    </div>

                    <div class="col-sm-12 reset-button">
                        <hr />
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button type="submit" class="btn btn-success">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>