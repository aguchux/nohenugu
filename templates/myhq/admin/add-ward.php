<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="/myhq/wards"> <i class="fa fa-list"></i>  Manage Wards </a>  
                </div>
            </div>
            <div class="panel-body">
                <form class="col-sm-12" action="/ajax/add-ward" method="post" enctype="multipart/form-data">
    
                        
                    <div class="col-sm-6 form-group">
                        <label>Name of Ward</label>
                        <input type="text" class="form-control" name="ward" placeholder="Name of Ward" required>
                    </div>
                  <div class="col-sm-6 form-group">
                      <label>Description</label>
                      <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                  </div>
                     <div class="col-sm-6 form-check">
                      <label>Status</label><br>
                      <label class="radio-inline"><input type="radio" name="status" value="0" checked="checked">Inactive</label>  
                      <label class="radio-inline"><input type="radio" name="status" value="1">Active</label> 
                      </div> 
    					
                      <div class="col-sm-12 reset-button">
                      	<hr/>
                         <button type="reset" class="btn btn-warning">Reset</button>
                         <button type="submit" class="btn btn-success">Create Ward</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
</div>