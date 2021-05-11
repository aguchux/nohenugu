                        <div class="row">
                            <!-- Form controls -->
                            <div class="col-sm-12">
                                <div class="panel panel-bd lobidrag">
                                    <div class="panel-heading">
                                        <div class="btn-group"> 
                                            <a class="btn btn-primary" href="/myhq/doctors"> <i class="fa fa-list"></i>Manage Doctors </a>  
                                        </div>
                                    </div>
                                    <div class="panel-body">
           								<form class="col-sm-12" action="/ajax/add-doctor" method="post" enctype="multipart/form-data">
                                           
                                           
                                            <div class="col-sm-6 form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="Enter firstname" required>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Lastname" required>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Enter Email" required>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Enter password" required>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Designation</label>
                                                <input type="text" class="form-control" placeholder="Enter Designation" required>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <label>Department</label>
                                                <select class="form-control" id="exampleSelect1" name="select" size="1">
                                                    <option  selected class="test">Neurology</option>
                                                    <option>Gynaecology</option>
                                                    <option>Microbiology</option>
                                                    <option>Pharmacy</option>
                                                    <option>Neonatal</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Address" required>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Specialist</label>
                                                <input type="text" class="form-control" placeholder="Specialist" required>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Mobile</label>
                                                <input type="number" class="form-control" placeholder="Enter Mobile" required>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                                <label >Picture upload</label>
                                                <input type="file" name="picture" id="picture">
                                            </div>  
                                            <div class="col-sm-12 form-group">
                                                <label>Short Biography</label>
                                                <textarea id="some-textarea" class="form-control" rows="3" placeholder="Enter text ..."></textarea>
                                            </div>        
                                            <div class="col-sm-6 form-group">
                                                <label>Date of Birth</label>
                                                <input name="date_of_birth" class="datepicker form-control hasDatepicker" type="text" placeholder="Date of Birth" id="date_of_birth">
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Blood group</label>
                                                <select class="form-control" id="exampleSelect">
                                                    <option>A+</option>
                                                    <option>AB+</option>
                                                    <option>O+</option>
                                                    <option>AB-</option>
                                                    <option>B+</option>
                                                    <option>A-</option>
                                                    <option>B-</option>
                                                    <option>O-</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-6 form-group">
                                             <label>Sex</label><br>
                                             <label class="radio-inline">
                                                 <input type="radio" name="sex" value="1" checked="checked">Male</label> 
                                                 <label class="radio-inline"><input type="radio" name="sex" value="0" >Female</label>
                                             </div>
                                             <div class="col-sm-6 form-check">
                                              <label>Status</label><br>
                                              <label class="radio-inline"><input type="radio" name="status" value="1" checked="checked">Active</label> 
                                              <label class="radio-inline">
                                                  <input type="radio" name="status" value="0" >Inctive</label>  
                                              </div> 

                                              <div class="col-sm-12 reset-button">
                                                 <a href="#" class="btn btn-warning">Reset</a>
                                                 <a href="#" class="btn btn-success">Save</a>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         
<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="btn-group"> 
               <a class="btn btn-success" href="./dashboard/pages/"> <i class="fa fa-plus"></i>  Manage Pages</a>  
            </div>
         </div>
         <div class="panel-body">
        	
           
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                            <input type="checkbox" id="category1" value="cat1" name="category[]"> 1ST Ft
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                            <input type="checkbox" id="category2" value="cat2" name="category[]">  2ND Ft
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                            <input type="checkbox" id="category3" value="cat3" name="category[]"> Sider
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                            <input type="checkbox" id="category4" value="cat4" name="category[]"> Popular
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                            <input type="checkbox" id="category5" value="cat5" name="category[]"> Top
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                            <input type="checkbox" id="category6" value="cat6" name="category[]"> Footer
                            </label>
                        </div>
                        <div class="col-md-12 form-group">
                            <hr/>
                        </div>
                        
                    </div>
	
                
                
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="shortname">Page Short Name</label>
                            <input class="form-control" name="shortname" type="text" placeholder="Shortname">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="parent">Parent Page</label>
                            <select class="form-control" name="parent" id="parent">
                            <option value="home" selected="selected">Top Memu (Home)</option>
                            <?php
                            while( $pr=mysqli_fetch_array($parents) ){
                            	echo '<option value="'. $pr['shortname'] . '">'. $pr['menutitle'] . '</option>';
                            }	 
                            ?>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="title">Page Title</label>
                            <input name="title" class="form-control" type="text" placeholder="Page Title">
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="isnews">Style</label>
                            <select class="form-control" name="pagestyle">
                                <option value="page">Page</option>
                                <option value="edulet">Edulet</option>
                                <option value="link">Link</option>
                                <option value="info">Info</option>
                                <option value="form">Form</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>
                    </div>
                    
                    
                    
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="menutitle">Menu Title</label>
                        <input class="form-control" name="menutitle" type="text" placeholder="menutitle">
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="sort">Sort?</label>
                        <input class="form-control" name="sort" type="text" placeholder="0">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="sort">News Photo</label>
                        <input class="form-control" name="newsphoto" type="file">
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="isnews">Blog?</label>
                        <select class="form-control" name="isnews">
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="sort">Page Excerpt</label>
                        <textarea class="form-control" name="excerpt"></textarea>
                    </div>
                </div>
                
                <div class="row">
                
                    <div class="col-md-12 ">
                        <textarea class="form-control tinymce-classic" id="contents" name="contents" style="width:100%;"></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" class="form-control btn btn-success" style="margin-top:10px;">Create New Page</button>
                    </div>
                </div>
                
                
         </form>             


         </div>
      </div>
   </div>
</div>

