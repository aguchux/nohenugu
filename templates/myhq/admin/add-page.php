<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-success" href="./myhq/pages/"> <i class="fa fa-plus"></i> Manage Pages</a>
                </div>
            </div>
            <div class="panel-body">

                <form action="/ajax/add-page" method="POST" enctype="multipart/form-data">

                    <?= $Me->tokenize() ?>

                    <div class="row mx-auto">
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category1" value="cat1" name="category[]"> 1ST Menu
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category2" value="cat2" name="category[]"> 2ND Menu
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category3" value="cat3" name="category[]"> Sider Menu
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category4" value="cat4" name="category[]"> Popular Menu
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category5" value="cat5" name="category[]"> Top Menu
                            </label>
                        </div>
                        <div class="col-md-2 form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="category6" value="cat6" name="category[]"> Footer Menu
                            </label>
                        </div>
                        <div class="col-md-12 form-group">
                            <hr />
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12 col-md-6 form-group">
                            <label for="title">Page Title</label>
                            <input required name="title" id="title" class="form-control form-control-lg" type="text" placeholder="Page Title">
                        </div>

                        <div class="col-12 col-md-6 form-group">
                            <label for="menutitle">Menu Title</label>
                            <input required class="form-control form-control-lg" name="menutitle" id="menutitle" type="text" placeholder="menutitle">
                        </div>

                        <div class="col-12 col-md-3 form-group">
                            <label class="col-12 col-md-12" for="parent">Parent Page</label>
                            <select name="parent" id="parent" class="form-control form-control-lg">
                                <option value="0" selected="selected">Top Memu (Home)</option>
                                <?php
                                $parents = $Core->LoadParentMenus();
                                while ($pr = mysqli_fetch_array($parents)) {
                                    echo '<option value="' . $pr['id'] . '">' . $pr['menutitle'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-3 form-group">
                            <label for="sort">Sort Number?</label>
                            <input required name="sort" class="form-control form-control-lg" type="text" value="<?= $Core->GetNextSort('page'); ?>" placeholder="0">
                        </div>
                        <div class="col-12 col-md-3 form-group">
                            <label class="col-12 col-md-12">Content Type</label>
                            <select name="type" required class="form-control form-control-lg">
                                <option value="" selected="selected"> - Content Type - </option>
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

                    <div class="row clearfix">
                        <div class="col-12 col-md-12 clearfix">


                        </div>
                    </div>

                    <div class="row-flud clearfix">
                        <div class="col-12 col-md-12 mt-5">
                            <button type="submit" class="btn btn-primary btn-lg">Create my Page</button>
                        </div>
                    </div>


                </form>


            </div>
        </div>
    </div>
</div>