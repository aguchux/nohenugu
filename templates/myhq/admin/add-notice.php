
<div class="row">


  <!-- Form controls -->
  <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
          <div class="panel-heading">
              <div class="btn-group"> 
                  <a class="btn btn-primary" href="/myhq/notices"> <i class="fa fa-list"></i>  Manage Notices</a>  
              </div>
          </div>
          	<div class="panel-body">
                <form action="/ajax/add-notice" method="post" enctype="multipart/form-data">
                <div class="col-sm-10">
                   
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" required>
                    </div>
    
                    <div class="form-group">
                        <label>Message / Notice</label>
                        <textarea class="form-control tinymce-classic" required="required" rows="1"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>start date</label>
                        <input name="start-date" class="datepicker form-control hasDatepicker" type="date" placeholder="start date" >
                    </div>
                    
                    <div class="form-group">
                        <label>End date</label>
                        <input name="end-date" class="datepicker form-control hasDatepicker" type="date" placeholder="end date" >
                    </div>
    
                    <div class="form-check">
                      	<label>Status</label><br>
						<label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Active</label> 
						<label class="radio-inline"><input type="radio" name="status" value="0" >Inctive</label>  
                          </div>                                    
                          <div class="reset-button">
                           <a href="#" class="btn btn-warning">Reset</a>
                           <a href="#" class="btn btn-success">Save</a>
                       </div>
                </div>      
                <div class="col-sm-2">
                    <div class="form-check">
                    <label>Select Receipients</label><br>
                    <label class="checkbox-inline col-sm-12"><input type="checkbox" name="status" value="1" checked="checked">Doctors</label> 
                    <br>
                    <label class="checkbox-inline col-sm-12"><input type="checkbox" name="status" value="0" >Nurses</label>
                    <br>
                    <label class="checkbox-inline col-sm-12"><input type="checkbox" name="status" value="0" >Patients</label>
                    </div>      
                </div>      
                </form>
			</div>
                                   
                                           
        
         </div>
     </div>
 </div>
                       
                   

</div>

