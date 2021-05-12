<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="btn-group">
               <a class="btn btn-success" href="./myhq/add-doctor/"> <i class="fa fa-plus"></i> Add Doctor</a>
            </div>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="panel-header">
                  <div class="col-sm-4">
                     <div class="dataTables_length">
                        <label>
                           Manage Doctors
                        </label>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="dataTables_length">
                        <a class="btn btn-default buttons-copy btn-sm" tabindex="0"><span>Copy</span></a>
                        <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0"><span>CSV</span></a>
                        <a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0"><span>Excel</span></a>
                        <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0"><span>PDF</span></a>
                        <a class="btn btn-default buttons-print btn-sm" tabindex="0"><span>Print</span></a>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="dataTables_length" id="example_length">
                        <div class="input-group custom-search-form">
                           <input type="search" class="form-control" placeholder="search pages..">
                           <span class="input-group-btn">
                              <button class="btn btn-primary" type="button">
                                 <span class="glyphicon glyphicon-search"></span>
                              </button>
                           </span>
                        </div>
                        <!-- /input-group -->
                     </div>
                  </div>
               </div>
            </div>
            <div class="table-responsive">
               <table class="table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Update</th>
                     </tr>
                  </thead>
                  <tbody>
                     <? while ($doctor = mysqli_fetch_object($doctors)) : ?>
                        <tr>
                           <td><label><?= $doctor->accid ?></label></td>
                           <td><img src="<?= $assets ?>dist/img/d3.png" class="img-circle" height="30" width="30"></td>
                           <td><?= "DR. <strong>{$doctor->lastname}</strong>, {$doctor->firstname}" ?></td>
                           <td><?= @$Me->Core->GetDepartment($doctor->department)->department ?></td>
                           <td><?= $doctor->email ?></td>
                           <td><?= $doctor->mobile ?></td>
                           <td>
                              <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#EditRequest_<?= $doctor->accid; ?>"><i class="fa fa-pencil"></i></button>
                              <div id="EditRequest_<?= $doctor->accid; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="dialog">
                                    <div class="modal-content">
                                       <div class="modal-header text-center">
                                          <h3>Edit Doctor <br /><strong class="text-info"><?= "DR. <strong>{$doctor->lastname}</strong>, {$doctor->firstname}" ?></br></h3>
                                       </div>

                                       <div class="modal-body">
                                          <form action="/form/department/<?= $doctor->accid; ?>/edit" method="POST">

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
                                                <input type="text" class="form-control" name="firstname" value="<?=$doctor->firstname ?>" placeholder="Enter firstname" required>
                                             </div>
                                             <div class="col-sm-6 form-group">
                                                <label>Last Name(Surname)</label>
                                                <input type="text" class="form-control" name="lastname" value="<?=$doctor->lastname ?>" placeholder="Enter Lastname" required>
                                             </div>

                                             <div class="col-sm-12 col-md-12 alert alert-success">
                                                <div class="row">
                                                   <div class="col-sm-6 form-group">
                                                      <label>Email</label>
                                                      <input type="email" class="form-control" name="email" value="<?=$doctor->email ?>" placeholder="Enter Email" required>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-sm-6 form-group">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control" placeholder="Enter Mobile" name="mobile" value="<?=$doctor->mobile ?>" required>
                                             </div>
                                             <div class="col-sm-6 form-group">
                                                <label>Date of Birth</label>
                                                <input name="date_of_birth" value="<?=$doctor->date_of_birth ?>" class="form-control" type="date" id="date_of_birth">
                                             </div>

                                             <div class="col-sm-6 form-group">
                                                <label>Sex</label><br>
                                                <label class="radio-inline">
                                                   <input type="radio" name="sex" value="Male" <?=$doctor->sex == "Male"? "checked='checked'":""?>>Male</label>
                                                <label class="radio-inline"><input type="radio" name="sex" value="Female" <?=$doctor->sex == "Female"? "checked='checked'":""?>>Female</label>
                                             </div>

                                             <div class="col-sm-6 form-check">
                                                <label>Status</label><br>
                                                <label class="radio-inline"><input type="radio" name="status" value="0" <?=$doctor->status ? "":"checked='checked'"?>>Inactive</label>
                                                <label class="radio-inline"><input type="radio" name="status" value="1" <?=$doctor->status ? "checked='checked'":""?>>Active</label>
                                             </div>

                                             <div class="reset-button">
                                                <button type="submit" class="btn btn-success">Save Doctor</button>
                                             </div>
                                          </form>
                                       </div>

                                    </div>
                                 </div>
                              </div>

                              <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteRequest_<?= $doctor->accid; ?>"><i class="fa fa-trash-o"></i></button>
                              <div id="DeleteRequest_<?= $doctor->accid; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="dialog">
                                    <div class="modal-content">
                                       <div class="modal-header text-center">
                                          <h3>Delete Doctor? <br /><strong class="text-danger"><?= "DR. <strong>{$doctor->lastname}</strong>, {$doctor->firstname}" ?></strong></h3>
                                       </div>
                                       <div class="modal-body text-center">
                                          <form action="/form/doctor/<?= $doctor->accid; ?>/delete" method="POST">
                                             <h3>Are you sure you want to Delete this doctor?</h3>
                                             <p><button type="submit" class="btn btn-danger btn-block">Delete Doctor</button></p>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </td>
                        </tr>
                     <? endwhile; ?>
                  </tbody>
               </table>
            </div>
            <div class="page-nation text-right">
               <ul class="pagination pagination-large">
                  <li class="disabled"><span>«</span></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li class="disabled"><span>...</span></li>
                  <li>
                  <li><a rel="next" href="#">Next</a></li>
               </ul>
            </div>

         </div>
      </div>
   </div>
</div>
</div>