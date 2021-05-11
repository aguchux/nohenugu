
<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="btn-group"> 
               <a class="btn btn-success" href="./dashboard/layouts/"> <i class="fa fa-plus"></i>  Manage Layouts</a>  
            </div>
         </div>
         <div class="panel-body">
        	
            <form action="/ajax/add-layout" method="post" enctype="multipart/form-data">
           	
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


         	</form>             


         </div>
      </div>
   </div>
</div>

