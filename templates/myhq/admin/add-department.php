
<div class="row">


  <!-- Form controls -->
  <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
          <div class="panel-heading">
              <div class="btn-group"> 
                  <a class="btn btn-primary" href="/myhq/departments"> <i class="fa fa-list"></i>  Department List</a>  
              </div>
          </div>
          <div class="panel-body">

              <form class="col-sm-6" action="/ajax/add-department" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>Department Name</label>
                      <input type="text" required="required" class="form-control" name="department" placeholder="Name of Department">
                  </div>
                  <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                  </div>
                  <div class="form-check">
                    <label>Status</label><br>
                    <label class="radio-inline">
                        <input type="radio" name="status" value="1" checked="checked">Active</label>
                        <label class="radio-inline"><input type="radio" name="status" value="0" >Inactive</label>
                    </div>                                       
                    
                    <div class="reset-button">
                     <a href="#" class="btn btn-warning">Reset</a>
                     <button type="submit" class="btn btn-success">Save</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
                       
                   

</div>

