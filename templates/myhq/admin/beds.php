
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
                        <td><button class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
                        <td><button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                     </tr>
					<? endwhile; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

