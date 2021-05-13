
<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="btn-group"> 
               <a class="btn btn-success" href="./myhq/add-patient/"> <i class="fa fa-plus"></i>  Add Patient</a>  
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
                            <th>Sur Name</th>
                            <th>First Name</th>
                            <th>Mobile</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
					<? while($patient=mysqli_fetch_object($patients)): ?>
                    <tr>
					   <td><label><?= $Me->Core->GetHID($patient->accid) ?></label></td>
                       <td><?= "{$patient->lastname}" ?></td>
                       <td><?= "{$patient->firstname}" ?></td>
                       <td><?= $patient->mobile ?></td>
                       <td>
                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#EditRequest_<?= $patient->accid; ?>"><i class="fa fa-pencil"></i></button>
                              <div id="EditRequest_<?= $patient->accid; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="dialog">
                                    <div class="modal-content">
                                       <div class="modal-header text-center">
                                          <h3>Edit Patient <br /><strong class="text-info"><?= "<strong>{$patient->lastname}</strong>, {$patient->firstname}" ?></br></h3>
                                       </div>

                                       <div class="modal-body">
                                          <form action="/form/patient/<?= $patient->accid; ?>/edit" method="POST">                                                   
                                                <div class="col-sm-8 col-md-8">
                                                            <div class="form-group">
                                                               <label>First Name</label>
                                                               <input type="text" name="fn" value="<?= $patient->firstname?>" class="form-control" placeholder="Enter First Name" required>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                               <label>Last Name</label>
                                                               <input type="text" name="ln" value="<?= $patient->lastname?>" class="form-control" placeholder="Enter last Name" required>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                               <label>Mobile</label>
                                                               <input type="text" name="mobile" value="<?= $patient->mobile?>" class="form-control" placeholder="Enter Mobile" required>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                               <label>Date of Birth</label>
                                                               <input name="date_of_birth" value="<?= $patient->dob?>" class="form-control" type="date" placeholder="Date of Birth">
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                            <label>Sex</label><br>
                                                            <label class="radio-inline"><input name="sex" value="1" <?=$patient->sex == "Male"? "checked='checked'":""?> type="radio">Male</label> 
                                                            <label class="radio-inline"><input name="sex" value="0" type="radio" <?=$patient->sex == "Female"? "checked='checked'":""?>>Female</label>
                                                            </div>
                                                            
                                                            <div class="form-check">
                                                               <label>Status</label><br>
                                                               <label class="radio-inline"><input type="radio" name="status" value="1" <?=$patient->status ? "checked='checked'":""?>>Active</label>
                                                               <label class="radio-inline"><input type="radio" name="status" value="0" <?=$patient->status ? "":"checked='checked'"?> >Inctive</label>
                                                         </div>                                       
                                          
                                                         <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea class="form-control" name="address" rows="3" value="<?= $patient->address?>" required></textarea>
                                                         </div>
                                                         
                                                         <div class="reset-button">
                                                         <button type="submit" class="btn btn-success">Save Patient</button>
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
                    <li class="disabled"><span>...</span></li><li>
                    <li><a rel="next" href="#">Next</a></li>
                </ul>
            </div>
               
            </div>
         </div>
      </div>
   </div>
</div>

