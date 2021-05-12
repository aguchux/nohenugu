<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="btn-group">
               <a class="btn btn-success" href="./myhq/add-department/"> <i class="fa fa-plus"></i> Add Department</a>
            </div>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="panel-header">
                  <div class="col-sm-4">
                     <div class="dataTables_length">
                        <label>
                           Departments
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
               <table class="DataTable table table-bordered table-hover">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>DEPARTMENT</th>
                        <th>DESCRIPTION</th>
                        <th>Edit</th>
                        <th>Delete</th>
                     </tr>
                  </thead>
                  <tbody>
                     <? while ($department = mysqli_fetch_object($departments)) : ?>
                        <tr>
                           <td><?= $department->id; ?></td>
                           <td><?= $department->department; ?></td>
                           <td><?= $department->description; ?></td>
                           <td>
                              <a href="javascript:;" class="btn-link" data-toggle="modal" data-target="#EditRequest_<?= $department->id; ?>">Edit</a>
                              <div id="EditRequest_<?= $department->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="dialog">
                                    <div class="modal-content">
                                       <div class="modal-header text-center">
                                          <h3>Edit Department <br /><strong class="text-info"><?= $department->department; ?></br></h3>
                                       </div>

                                       <div class="modal-body">
                                          <form action="/form/department/<?= $department->id; ?>/edit" method="POST">
                                             <div class="form-group">
                                                <label>Department Name</label>
                                                <input type="text" required="required" class="form-control" name="department" value="<?= $department->department; ?>" placeholder="Name of Department">
                                             </div>
                                             <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3"><?= $department->description; ?></textarea>
                                             </div>
                                             <div class="form-check">
                                                <label>Status</label><br>
                                                <label class="radio-inline">
                                                   <input type="radio" name="status" value="1" <?= $department->enabled ? "checked='checked'" : "" ?>>Active</label>
                                                <label class="radio-inline"><input type="radio" name="status" value="0" <?= $department->enabled ? "" : "checked='checked'" ?>>Inactive</label>
                                             </div>

                                             <div class="reset-button">
                                                <button type="submit" class="btn btn-success">Save Department</button>
                                             </div>
                                          </form>
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <a href="javascript:;" class="btn-link text-danger" data-toggle="modal" data-target="#DeleteRequest_<?= $department->id; ?>">Delete</a>
                              <div id="DeleteRequest_<?= $department->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered" role="dialog">
                                    <div class="modal-content">
                                       <div class="modal-header text-center">
                                          <h3>Delete Department<br /><strong class="text-danger"><?= $department->department; ?></strong></h3>
                                       </div>
                                       <div class="modal-body text-center">
                                          <form action="/form/department/<?= $department->id; ?>/delete" method="POST">
                                             <h3>Are you sure you want to Delete this department?</h3>
                                             <p><button type="submit" class="btn btn-danger btn-block">Delete Department</button></p>
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
         </div>
      </div>
   </div>
</div>