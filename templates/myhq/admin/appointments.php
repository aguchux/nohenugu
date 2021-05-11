
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
                        <th>Appionment Id</th>
                        <th>Patient Id</th>
                        <th>Department</th>
                        <th>Doctor</th>
                        <th>Visits</th>
                        <th>Appionment date</th>
                        <th>status</th>
                        <th>-</th>
                    </tr>
                  </thead>
                  <tbody>
					<? while($appointment=mysqli_fetch_object($appointments)): ?>
                    <tr>
                        
                        <td><?=$appointment->id;?></td>
                        <td><?=$appointment->patient;?></td>
                        <td><?=$appointment->department;?></td>
                        <td><?=$appointment->doctor;?></td>
                        <td><?=$appointment->nexdate;?></td>
                        <td><?=$appointment->status;?></td>
                        
                        <td><span class="label-success label label-default">active</span></td>
                        <td><button class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="Cancel"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
                    
                    </tr>
					<? endwhile; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

