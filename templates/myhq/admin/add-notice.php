<div class="row container">


    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-primary" href="/myhq/notices"> <i class="fa fa-list"></i> Manage Notices</a>
                </div>
            </div>
            <div class="panel-body">
                <form action="/ajax/add-notice" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-10">

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                        </div>

                        <div class="form-group">
                            <label>Message / Notice</label>
                            <textarea name="notice" class="form-control" style="min-height: 100px;"></textarea>
                        </div>

                        <div class="form-group">
                            <label>start date</label>
                            <input name="startdate" class="datepicker form-control hasDatepicker" required type="date" placeholder="Start Date">
                        </div>

                        <div class="form-group">
                            <label>End date</label>
                            <input name="enddate" class="datepicker form-control hasDatepicker" required type="date" placeholder="End Date">
                        </div>

                        <div class="form-check">
                            <label>Status</label><br>
                            <label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Active</label>
                            <label class="radio-inline"><input type="radio" name="status" value="0">Inctive</label>
                        </div>
                        <div class="reset-button">
                            <button type="submit" class="btn btn-success">Create New Notice</button>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-check">
                            <label>Select Receipients</label><br />
                            <label class="checkbox-inline col-sm-12"><input type="checkbox" name="receipients[]" value="doctors" />Doctors</label><br />
                            <label class="checkbox-inline col-sm-12"><input type="checkbox" name="receipients[]" value="nurses" />Nurses</label><br />
                            <label class="checkbox-inline col-sm-12"><input type="checkbox" name="receipients[]" value="patients" />Patients</label><br />
                            <label class="checkbox-inline col-sm-12"><input type="checkbox" name="receipients[]" value="users" />Users</label><br />
                            <label class="checkbox-inline col-sm-12"><input type="checkbox" name="receipients[]" value="visitors" />Site Visitors</label><br />
                        </div>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>



</div>