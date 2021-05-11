
<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="btn-group"> 
               <a class="btn btn-success" href="./myhq/pages/"> <i class="fa fa-plus"></i>  Manage Pages</a>  
            </div>
         </div>
         <div class="panel-body">

        <form action="/ajax/edit-page" method="post" enctype="multipart/form-data">
       		<input type="hidden" name="pageid" value="<?= $pageinfo->pageid ?>" />
            <div class="row">
                <div class="col-md-2 form-group">
                    <label class="checkbox-inline">
                    <input type="checkbox" id="category1" value="cat1" name="category[]" <?= in_array('cat1',$cat)?'checked="checked"':''; ?>> 1ST Ft
                    </label>
                </div>
                <div class="col-md-2 form-group">
                    <label class="checkbox-inline">
                    <input type="checkbox" id="category2" value="cat2" name="category[]" <?= in_array('cat2',$cat)?'checked="checked"':''; ?>> 2ND Ft
                    </label>
                </div>
                <div class="col-md-2 form-group">
                    <label class="checkbox-inline">
                    <input type="checkbox" id="category3" value="cat3" name="category[]" <?= in_array('cat3',$cat)?'checked="checked"':''; ?>> Sider
                    </label>
                </div>
                <div class="col-md-2 form-group">
                    <label class="checkbox-inline">
                    <input type="checkbox" id="category4" value="cat4" name="category[]" <?= in_array('cat4',$cat)?'checked="checked"':''; ?>> Popular
                    </label>
                </div>
                <div class="col-md-2 form-group">
                    <label class="checkbox-inline">
                    <input type="checkbox" id="category5" value="cat5" name="category[]" <?= in_array('cat5',$cat)?'checked="checked"':''; ?>> Top
                    </label>
                </div>
                <div class="col-md-2 form-group">
                    <label class="checkbox-inline">
                    <input type="checkbox" id="category6" value="cat6" name="category[]" <?= in_array('cat6',$cat)?'checked="checked"':''; ?>> Footer
                    </label>
                </div>
                
                <div class="col-md-12 form-group">
                    <hr/>
                </div>
                
            </div>
            
                        
                        
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="shortname">Page Short Name</label>
                    <input class="form-control" name="shortname" type="text" value="<?= $pageinfo->shortname; ?>" placeholder="Shortname">
                </div>
                <div class="col-md-3 form-group">
                    <label for="parent">Parent Page</label>
                    <select class="form-control" name="parent" id="parent">
                        <option value="home" selected="selected">Top Memu (Home)</option>
                        <?php while($pr=mysqli_fetch_array($parents)): ?>
                            <option value="<?= $pr['shortname'] ?>" <?= $pageinfo->shortname==$pr['shortname']?"selected='selected'":"" ?>><?= $pr['menutitle'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label for="title">Page Title</label>
                    <input name="title" class="form-control" type="text" value="<?= $pageinfo->title; ?>" placeholder="Page Title">
                </div>
                
                <div class="col-md-2 form-group">
                    <label for="pagestyle">Style</label>
                    <select class="form-control" name="pagestyle">
                        <option value="<?= $pageinfo->pagestyle; ?>" selected="selected"><?= $pageinfo->pagestyle; ?></option>
                        <option value="page">Page</option>
                        <option value="article">Article</option>
                    </select>
                </div>
            
            </div>
            
            
            
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="menutitle">Menu Title</label>
                    <input class="form-control" name="menutitle" type="text" value="<?= $pageinfo->menutitle; ?>" placeholder="menutitle">
                </div>
                <div class="col-md-2 form-group">
                    <label for="sort">Sort?</label>
                    <input class="form-control" name="sort" type="text" value="<?= $pageinfo->sort; ?>" placeholder="0">
                </div>
                <div class="col-md-4 form-group">
                    <label for="newsphoto">Edit Photo</label>
                    <input class="form-control" name="newsphoto" type="file">
                </div>
                <div class="col-md-2 form-group">
                    <label for="isnews">Blog?</label>
                    <select class="form-control" name="isnews">
                        <option value="<?= $pageinfo->isnews; ?>" selected="selected"><?= $pageinfo->isnews; ?></option>
                        <option value="NO">NO</option>
                        <option value="YES">YES</option>
                    </select>
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="excerpt">Page Excerpt</label>
                    <textarea class="form-control" name="excerpt"><?= $pageinfo->excerpt;?></textarea>
                </div>
            </div>
            
            
            <div class="row">
            
                <div class="col-md-12 form-group">
                    <textarea class="form-control tinymce-classic" name="contents" id="contents" style="width:100%;"><?= $pageinfo->content;?></textarea>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" class="form-control btn btn-success btn-block" style="margin-top:10px;">Save Changes</button>
                </div>
            </div>
                    
         </form>             
                    
                


         </div>
      </div>
   </div>
</div>



