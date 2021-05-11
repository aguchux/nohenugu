<div class="row">
    <!-- Form controls -->
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="/myhq/beds"> <i class="fa fa-list"></i>  Manage Beds </a>  
                </div>
            </div>
            <div class="panel-body">
                <form class="col-sm-12" action="/ajax/add-bed" method="post" enctype="multipart/form-data">
    
                    <div class="col-sm-6 form-group">
                        <label>Wards</label>
                        <select class="form-control" id="ward" name="ward" size="1">
                            <option selected class="test">Select Ward</option>
                        	<?php while($ward = mysqli_fetch_object($wards)): ?>
                            <option class="test" value="<?= $ward->id ?>"><?= $ward->ward ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                   	
                    <div class="col-sm-6 form-group">
                        <label>Bed Number</label>
                        <input type="text" class="form-control" name="bed" placeholder="Bed Number" required>
                    </div>

                     <div class="col-sm-6 form-check">
                      <label>Status</label><br>
                      <label class="radio-inline"><input type="radio" name="status" value="0" checked="checked">Inactive</label>  
                      <label class="radio-inline"><input type="radio" name="status" value="1">Active</label> 
                      </div> 
    					
                      <div class="col-sm-12 reset-button">
                      	<hr/>
                         <button type="reset" class="btn btn-warning">Reset</button>
                         <button type="submit" class="btn btn-success">Create Bed</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
</div>