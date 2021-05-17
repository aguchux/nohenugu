<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="btn-group">
               <a class="btn btn-success" href="./myhq/add-patient/"> <i class="fa fa-plus"></i> Add Patient</a>
            </div>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="panel-header">
                  <div class="col-sm-4">
                     <div class="dataTables_length">
                        <label>
                           Manage Patients
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
                        <th>HID</th>
                        <th>Surname</th>
                        <th>First Name</th>
                        <th>Sex</th>
                        <th>Mobile</th>
                        <th>Password</th>
                        <th>Update</th>
                     </tr>
                  </thead>
                  <tbody>
                     <? while ($patient = mysqli_fetch_object($patients)) : ?>
                        <tr>
                           <td><label><?= $patient->username ?></label></td>
                           <td><?= "{$patient->lastname}" ?></td>
                           <td><?= "{$patient->firstname}" ?></td>
                           <td><?= "{$patient->sex}" ?></td>
                           <td><?= $patient->mobile ?></td>
                           <td><?= $patient->password ?></td>
                           <td>
                              <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#EditRequest_<?= $patient->accid; ?>"><i class="fa fa-pencil"></i></button>
                              <div id="EditRequest_<?= $patient->accid; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="dialog">
                                    <div class="modal-content">
                                       <div class="modal-header text-center">
                                          <h3>Edit Patient <br /><strong class="text-info"><?= "<strong>{$patient->lastname}</strong>, {$patient->firstname}" ?></strong></br></h3>
                                       </div>

                                       <div class="modal-body">
                                          <form action="/form/patient/<?= $patient->accid; ?>/edit" method="POST" class="row">

                                             <div class="col-sm-12 col-md-12">

                                                <div class="row">
                                                   <div class="col-sm-6 col-md-6  form-group">
                                                      <label>Hospital Number</label>
                                                      <input type="text" class="form-control form-control-lg" name="hid" readonly="readonly" value="<?= $patient->username; ?>" required>
                                                   </div>
                                                   <div class="col-sm-6 col-md-6  form-group">
                                                      <label>Access Password</label>
                                                      <input type="text" class="form-control form-control-lg" name="accesscode" readonly="readonly" value="<?= $patient->password; ?>" required>
                                                   </div>
                                                </div>

                                                <div class="row">
                                                   <div class="col-sm-6 col-md-6">
                                                      <div class="form-group">
                                                         <label>First Name</label>
                                                         <input type="text" name="fn" class="form-control" placeholder="Enter First Name" required value="<?= $patient->firstname; ?>">
                                                      </div>
                                                   </div>
                                                   <div class="col-sm-6 col-md-6">
                                                      <div class="form-group">
                                                         <label>Last Name</label>
                                                         <input type="text" name="ln" class="form-control" placeholder="Enter last Name" required value="<?= $patient->lastname; ?>">
                                                      </div>
                                                   </div>

                                                </div>

                                                <div class="row">
                                                   <div class="col-sm-6 col-md-6">
                                                      <div class="form-group">
                                                         <label>Mobile</label>
                                                         <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile" required value="<?= $patient->mobile; ?>">
                                                      </div>
                                                   </div>
                                                   <div class="col-sm-6 col-md-6">
                                                      <div class="form-group">
                                                         <label>Email (if any)</label>
                                                         <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?= $patient->email; ?>" required>
                                                      </div>

                                                   </div>
                                                </div>

                                                <div class="row">
                                                   <div class="col-sm-12 col-md-12">
                                                      <div class="form-group">
                                                         <label>Address</label>
                                                         <textarea class="form-control" name="address" id="address" rows="3" required><?= $patient->address; ?></textarea>
                                                      </div>
                                                   </div>
                                                </div>

                                                <div class="row">
                                                   <div class="col-sm-4 col-md-4">
                                                      <div class="form-group">
                                                         <label>Date of Birth</label>
                                                         <input name="date_of_birth" class="form-control" type="date" placeholder="Date of Birth" required value="<?= $patient->dob; ?>">
                                                      </div>
                                                   </div>

                                                   <div class="col-sm-4 col-md-4">
                                                      <div class="form-group">
                                                         <label>Sex</label><br>
                                                         <label class="radio-inline"><input name="sex" value="Male" type="radio" required <?= $patient->sex == "Male" ? "checked" : "" ?>>Male</label>
                                                         <label class="radio-inline"><input name="sex" value="Female" type="radio" required <?= $patient->sex == "Female" ? "checked" : "" ?>>Female</label>
                                                      </div>
                                                   </div>

                                                   <div class="col-sm-4 col-md-4">
                                                      <div class="form-check">
                                                         <label>Status</label><br>
                                                         <label class="radio-inline"><input type="radio" name="status" value="1" <?= $patient->enabled ? "checked" : "" ?>>Active</label>
                                                         <label class="radio-inline"><input type="radio" name="status" value="0" <?= $patient->enabled ? "" : "checked" ?>>Inactive</label>
                                                      </div>
                                                   </div>
                                                </div>



                                                <div class="reset-button">
                                                   <button type="submit" class="btn btn-success">Update Patient</button>
                                                </div>

                                             </div>
                                          </form>

                                       </div>

                                    </div>
                                 </div>
                              </div>
                              <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteRequest_<?= $patient->accid; ?>"><i class="fa fa-trash-o"></i></button>
                              <div id="DeleteRequest_<?= $patient->accid; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="dialog">
                                    <div class="modal-content">
                                       <div class="modal-header text-center">
                                          <h3>Delete Patient? <br /><strong class="text-danger"><?= "<strong>{$patient->lastname}</strong>, {$patient->firstname}" ?></strong></h3>
                                       </div>
                                       <div class="modal-body text-center">
                                          <form action="/form/patient/<?= $patient->accid; ?>/delete" method="POST">
                                             <h3>Are you sure you want to Delete this patient?</h3>
                                             <p><button type="submit" class="btn btn-danger btn-block">Delete Patient</button></p>
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