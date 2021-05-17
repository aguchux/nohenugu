<?php

$SiteInfos = $Core->SiteInfos();

?>
<div class="container page__container my-5">
    <div class="row">

        <div class="col-lg-12">
            <div class="page-section">

                <legend class="mx-auto my-3">Site Settings</legend>

                <form action="/ajax/settings" method="POST" enctype="multipart/form-data">
                    <?= $Me->tokenize() ?>
                    <div class="row">



                        <?php while ($site = mysqli_fetch_object($SiteInfos)) : ?>
                            <div class="col-12 col-md-12 form-group my-0">
                                <label><?= strtoupper($site->name) ?></label>
                                <?php if ($site->type == "input") : ?>
                                    <input required name="<?= $site->name ?>" class="form-control form-control-lg" type="text" value="<?= $site->value ?>" placeholder="<?= strtoupper($site->name) ?>" />
                                <?php elseif ($site->type == "checkbox ") : ?>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="<?= $site->name ?>" value="1" name="<?= $site->name ?>" <?= $site->value ? "checked" : "" ?>> <?= strtoupper($site->name) ?>
                                    </label>
                                <?php elseif ($site->type == "textarea") : ?>
                                    <textarea required name="<?= $site->name ?>" class="form-control form-control-lg" placeholder="<?= strtoupper($site->name) ?>"><?= $site->value ?></textarea>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>


                    </div>

                    <hr class="my-1" />

                    <div class="row clearfix">
                        <div class="col-12 col-md-12 mt-5">
                            <button type="submit" class="btn btn-primary btn-lg">Update Settings</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>