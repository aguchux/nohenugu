<!-- Page Content -->
<?php $Galleries = $Core->Galleries() ?>
<div class="container page-top">

    <div class="row">
        <? while ($gallery = mysqli_fetch_object($Galleries)) : ?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb my-2">
                <a href="<?= $gallery->photo; ?>" class="fancybox" rel="ligthbox">
                    <img src="<?= $gallery->photo; ?>" class="zoom img-fluid " alt="<?= $gallery->title; ?>">
                </a>
            </div>
        <? endwhile; ?>
    </div>

</div>