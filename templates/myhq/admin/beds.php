
<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="btn-group"> 
               <a class="btn btn-success" href="./myhq/add-bed/"> <i class="fa fa-plus"></i>  Add Bed</a>  
            </div>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="panel-header">
                  <div class="col-sm-4">
                     <div class="dataTables_length">
                        <label>
                           Beds
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
                        <th>BED</th>
                        <th>WARD</th>
                        <th>STATUS</th>
                        <th>-</th>
                        <th>-</th>
                     </tr>
                  </thead>
                  <tbody>
					<? while($bed=mysqli_fetch_object($beds)):  ?>
                      <tr>
                        <td><?=$bed->id;?></td>
                        <td><?=$bed->bed;?></td>
                        <td><?= $Core->WardInfo($bed->ward)->ward ?></td>
                        <td><span class="<?= $bed->inuse?"label-danger label":"label-success label" ?>"><?= $bed->inuse?"In Use":"Available" ?></span></td>
                        <td><button class="btn btn-info btn-xs" data-toggle="modal" data-target="#EditRequest_<?= $bed->id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                 <div class="modal-dialog modal-dialog-centered" role="dialog">
                                    <div class="modal-content">
                                       <div class="modal-header text-center">
                                          <h3>Edit Bed <br /><strong class="text-info"><?= $bed->bed ?></br></h3>
                                       </div>

                                       <div class="modal-body">
                                          <form action="/form/bed/<?= $bed->id; ?>/edit" method="POST">

                                                   <div class="col-sm-6 form-group">
                                                      <label>Wards</label>
                                                      <select class="form-control" id="ward" name="ward" value="<?= $Core->WardInfo($bed->ward)->ward ?>" size="1">
                                                            <option selected class="test">Select Ward</option>
                                                         <?php while($ward = mysqli_fetch_object($wards)): ?>
                                                            <option class="test" value="<?= $ward->id ?>"><?= $ward->ward ?></option>
                                                            <?php endwhile; ?>
                                                      </select>
                                                   </div>
                                                      
                                                   <div class="col-sm-6 form-group">
                                                      <label>Bed Number</label>
                                                      <input type="text" class="form-control" name="bed" value="<?= $bed->id ?>" placeholder="Bed Number" required>
                                                   </div>

                                                   <div class="col-sm-6 form-check">
                                                      <label>Status</label><br>
                                                      <label class="radio-inline"><input type="radio" name="status" value="0" <?=$bed->inuse ?"":"checked='checked'" ?>>Inactive</label>  
                                                      <label class="radio-inline"><input type="radio" name="status" value="1" <?=$bed->inuse ?"checked='checked'":"" ?>>Active</label> 
                                                      </div> 
                                                   
                                                      <div class="col-sm-12">
                                                         <hr/>
                                                         <button type="submit" class="btn btn-success">Save Bed</button>
                                                     </div>
                                                </form>
                                       </div>

                                    </div>
                                 </div>
                        </td>
                        <td><button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#DeleteRequest_<?= $bed->id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                           <div id="DeleteRequest_<?= $bed->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="dialog">
                                       <div class="modal-content">
                                          <div class="modal-header text-center">
                                             <h3>Delete Bed? <br /><strong class="text-danger"><?=$bed->bed ?></h3>
                                          </div>
                                          <div class="modal-body text-center">
                                             <form action="/form/bed/<?= $bed->id; ?>/delete" method="POST">
                                                <h3>Are you sure you want to Delete this bed?</h3>
                                                <p><button type="submit" class="btn btn-danger btn-block">Delete Bed</button></p>
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

