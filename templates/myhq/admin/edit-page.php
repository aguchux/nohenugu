<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-success" href="./myhq/pages/"> <i class="fa fa-plus"></i> Manage Pages</a>
                </div>
            </div>
            <div class="panel-body">

                <form action="/ajax/edit-page" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="pageid" value="<?= $pageinfo->pageid ?>" />
                    
                    
                    <div class="row">
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category1" value="cat1" name="category[]" <?= in_array('cat1', $cat) ? 'checked="checked"' : ''; ?>> 1ST Menu
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category2" value="cat2" name="category[]" <?= in_array('cat2', $cat) ? 'checked="checked"' : ''; ?>> 2ND Menu
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category3" value="cat3" name="category[]" <?= in_array('cat3', $cat) ? 'checked="checked"' : ''; ?>> Sider Menu
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category4" value="cat4" name="category[]" <?= in_array('cat4', $cat) ? 'checked="checked"' : ''; ?>> Popular Menu
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category5" value="cat5" name="category[]" <?= in_array('cat5', $cat) ? 'checked="checked"' : ''; ?>> Top Menu
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category6" value="cat6" name="category[]" <?= in_array('cat6', $cat) ? 'checked="checked"' : ''; ?>> Footer Menu
                            </label>
                        </div>

                        <div class="col-md-12 form-group">
                            <hr />
                        </div>

                    </div>




                    <div class="row">

                        <div class="col-12 col-md-6 form-group">
                            <label for="title">Page Title</label>
                            <input required name="title" id="title" class="form-control form-control-lg" type="text" placeholder="Page Title" value="<?= $pageinfo->title; ?>">
                        </div>

                        <div class="col-12 col-md-6 form-group">
                            <label for="menutitle">Menu Title</label>
                            <input required class="form-control form-control-lg" name="menutitle" id="menutitle" type="text" placeholder="menutitle" value="<?= $pageinfo->menutitle; ?>">
                        </div>

                        <div class="col-12 col-md-3 form-group">
                            <label class="col-12 col-md-12" for="parent">Parent Page</label>
                            <select name="parent" id="parent" class="form-control form-control-lg">
                                <option value="home" selected="selected">Top Memu (Home)</option>
                                <?php while ($pr = mysqli_fetch_array($parents)) : ?>
                                    <option value="<?= $pr['shortname'] ?>" <?= $pageinfo->shortname == $pr['shortname'] ? "selected='selected'" : "" ?>><?= $pr['menutitle'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-3 form-group">
                            <label for="sort">Sort Number?</label>
                            <input required name="sort" class="form-control form-control-lg" type="text" value="<?= $pageinfo->sort; ?>" placeholder="0">
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label class="col-12 col-md-12">Content Type</label>
                            <select name="type" required class="form-control form-control-lg">
                                <option value="<?= $pageinfo->pagestyle; ?>" selected="selected"><?= $pageinfo->pagestyle; ?></option>
                                <option value="page">Site Page</option>
                                <option value="blog">Blog & News</option>
                                <option value="form">Forms & Applications</option>
                                <option value="info">Information Page</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label for="photo">Page Photo</label>
                            <input name="photo" id="photo" class="form-control form-control-lg" type="file" placeholder="Page Title">
                        </div>

                    </div>


                    <?php if($pageinfo->pagestyle=="blog"): ?>
                    <div class="row clearfix">
                        <div class="col-md-12 form-group">
                            <textarea class="form-control tinymce-classic" name="contents" id="contents" style="width:100%;"><?= $pageinfo->content; ?></textarea>
                        </div>
                    </div>
                    <?php endif; ?>

                

                    <div class="row-flud clearfix">
                        <div class="col-12 col-md-12 mt-5">
                            <button type="submit" class="btn btn-primary btn-lg">Update Page</button>
                        </div>
                    </div>



                </form>




            </div>
        </div>
    </div>
</div>