
<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="btn-group"> 
               <a class="btn btn-success" href="./myhq/add-doctor/"> <i class="fa fa-plus"></i>  Add Doctor</a>  
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
					<? while($doctor=mysqli_fetch_object($doctors)): ?>
                    <tr>
					   <td><label><?= $doctor->accid ?></label></td>
                       <td><img src="<?= $assets ?>dist/img/d3.png" class="img-circle" height="30" width="30"></td>
                       <td><?= "DR. <strong>{$doctor->lastname}</strong>, {$doctor->firstname}" ?></td>
                       <td><?= $Me->Core->GetDepartment($doctor->department)->department ?></td>
                       <td><?= $doctor->email ?></td>
                       <td><?= $doctor->mobile ?></td>
                       <td>
                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ordine"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ordine"><i class="fa fa-trash-o"></i></button>
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

