<?php

$directory = './templates/webparts/';
$WebParts = array_diff(scandir($directory), array('..', '.'));
$Template->assign("WebParts", $WebParts);

?>
<div class="container-fluid my-5">
    <div class="row">

        <div class="col-lg-12">
            <div class="page-section">

                <legend class="mx-auto my-3">Web Part & Builder</legend>

                <div class="row">
                    <?php foreach ($WebParts as $parts) :
                        $WPHeader = $Core->WebPartHeader("./templates/webparts/{$parts}/index.php");
                    ?>
                        <div class="col-sm-4 col-md-4 my-2">
                            <!-- BOX 4 -->
                            <div class="card card--raised">
                                <div class="card-header d-flex align-items-center">
                                    <div class="flex" style="background-color: #000; padding: 5px 20px;">
                                        <h3 class="card-title text-white">
                                            <?= $WPHeader ?>
                                        </h3>
                                        <p class="card-subtitle">
                                        <h4 class="text-white"><?= $parts ?></h4>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="media gbr">
                                        <img src="./templates/webparts/<?= $parts ?>/photo.jpg" class="img-responsive">
                                    </div>
                                    <hr />
                                    <p class="text-70"><span class="comments"><i class="fa fa-comment-o"></i><?= $Core->CountPagedWebParts($parts) ?> added to page</span></p>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>


                </div>
            </div>
        </div>
    </div>
</div>