<!-- BANNER -->
<!--
Name: Banner Dynamic Slider
-->
<?php

$Sliders = $Core->Sliders();
$Sliders1 = $Core->Sliders();

?>
<!-- Start Main Slider -->

<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="border-top: 10px solid #F99828; margin-top:20px;border-bottom: 10px solid #F99828; margin-top:20px;">
        <ol class="carousel-indicators">

            <?php
            $x = 0;
            while ($slider = mysqli_fetch_object($Sliders)) : ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class=" <?= $x==0?'active':'' ?>"></li>
            <?php
                ++$x;
            endwhile; ?>

        </ol>
        <div class="carousel-inner">

            <?php
            $i = 0;
            while ($slider1 = mysqli_fetch_object($Sliders1)) : $PageLink = $Core->PageInfo($slider1->page_link); ?>
                <div class="carousel-item <?= $i==0?'active':'' ?> ">
                    <img class="d-block w-100" src="<?= $slider1->slide ?>">
                </div>
            <?php
                ++$i;
            endwhile; ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<!-- End Main Slider -->