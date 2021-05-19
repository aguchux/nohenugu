<?php
$Cat1Pages = $Core->CatPages('cat1');
$Cat2Pages = $Core->CatPages('cat2');
$Cat3Pages = $Core->CatPages('cat3');
$Cat4Pages = $Core->CatPages('cat4');
?>

<!DOCTYPE html>
<!-- MedService - Medical & Medical Health Landing Page Template design by Jthemes -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">

<head>
    <base href="<?= domain ?>" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="De-Golojan Technologies Ltd">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- SITE TITLE -->
    <title><?= $title ?></title>

    <!-- FAVICON AND TOUCH ICONS  -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $assets ?>website/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= $assets ?>website/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $assets ?>website/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $assets ?>website/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $assets ?>website/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $assets ?>website/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $assets ?>website/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $assets ?>website/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $assets ?>website/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= $assets ?>website/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $assets ?>website/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $assets ?>website/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $assets ?>website/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= $assets ?>website/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= $assets ?>website/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link href="<?= $assets ?>website\css\bootstrap.min.css" rel="stylesheet">
    <!-- FONT ICONS -->
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" rel="stylesheet" crossorigin="anonymous">
    <link href="<?= $assets ?>website\css\flaticon.css" rel="stylesheet">
    <!-- PLUGINS STYLESHEET -->
    <link href="<?= $assets ?>website\css\menu.css" rel="stylesheet">
    <link id="effect" href="<?= $assets ?>website\css\dropdown-effects\fade-down.css" media="all" rel="stylesheet">
    <link href="<?= $assets ?>website\css\magnific-popup.css" rel="stylesheet">
    <link href="<?= $assets ?>website\css\owl.carousel.min.css" rel="stylesheet">
    <link href="<?= $assets ?>website\css\owl.theme.default.min.css" rel="stylesheet">
    <link href="<?= $assets ?>website\css\animate.css" rel="stylesheet">
    <link href="<?= $assets ?>website\css\jquery.datetimepicker.min.css" rel="stylesheet">

    <!-- TEMPLATE CSS -->
    <link href="<?= $assets ?>website\css\style.css" rel="stylesheet">
    <!-- RESPONSIVE CSS -->
    <link href="<?= $assets ?>website\css\responsive.css" rel="stylesheet">

</head>

<body>

    <div id="loader-wrapper">
        <div id="loader">
            <div class="loader-inner"></div>
        </div>
    </div>


    <!-- PAGE CONTENT ============================================= -->
    <div id="page" class="page">

        <?php if ($PageInfo->showheader) : ?>

            <!-- HEADER
			============================================= -->
            <header id="header" class="header">


                <!-- MOBILE HEADER -->
                <div class="wsmobileheader clearfix">
                    <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
                    <span class="smllogo"><img src="<?= $assets ?>website\images\logo-grey.png" width="180" height="40" alt="mobile-logo"></span>
                    <a href="tel:<?= $Core->getSiteInfo('home_mobile'); ?>" class="callusbtn"><i class="fas fa-phone"></i></a>
                </div>


                <!-- HEADER STRIP -->
                <div class="headtoppart bg-deepblue clearfix">
                    <div class="headerwp clearfix">

                        <!-- Address -->
                        <div class="headertopleft">
                            <div class="address clearfix">
                                <span><i class="fas fa-map-marker-alt"></i><?= $Core->getSiteInfo('home_address'); ?></span>
                                <a href="tel:<?= $Core->getSiteInfo('home_mobile'); ?>" class="callusbtn mx-2"><i class="fas fa-phone"></i><?= $Core->getSiteInfo('home_mobile'); ?></a>
                            </div>
                        </div>

                        <!-- Social Links -->
                        <div class="headertopright">

                            <?php if ((int) strlen($Core->getSiteInfo('link_google'))) : ?>
                                <a class="googleicon" title="Google" href="<?= $Core->getSiteInfo('link_google'); ?>"><i class="fab fa-google"></i> <span class="mobiletext02">Google</span></a>
                            <?php endif; ?>
                            <?php if ((int) strlen($Core->getSiteInfo('link_linkedin'))) : ?>
                                <a class="linkedinicon" title="Linkedin" href="<?= $Core->getSiteInfo('link_linkedin'); ?>"><i class="fab fa-linkedin-in"></i> <span class="mobiletext02">Linkedin</span></a>
                            <?php endif; ?>
                            <?php if ((int) strlen($Core->getSiteInfo('link_twitter'))) : ?>
                                <a class="twittericon" title="Twitter" href="<?= $Core->getSiteInfo('link_twitter'); ?>"><i class="fab fa-twitter"></i> <span class="mobiletext02">Twitter</span></a>
                            <?php endif; ?>
                            <?php if ((int) strlen($Core->getSiteInfo('link_facebook'))) : ?>
                                <a class="facebookicon" title="Facebook" href="<?= $Core->getSiteInfo('link_facebook'); ?>"><i class="fab fa-facebook-f"></i> <span class="mobiletext02">Facebook</span></a>
                            <?php endif; ?>

                        </div>

                    </div>
                </div> <!-- END HEADER STRIP -->

                <!-- NAVIGATION MENU -->
                <div class="wsmainfull menu clearfix">
                    <div class="wsmainwp clearfix">

                        <!-- LOGO IMAGE -->
                        <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 80 pixels) -->
                        <div class="desktoplogo"><a href="/"><img src="<?= $assets ?>website\images\logo-grey.png" width="180" height="40" alt="<?= $PageInfo->title ?>"></a></div>

                        <!-- MAIN MENU -->
                        <nav class="wsmenu clearfix">
                            <ul class="wsmenu-list">

                                <li class="nl-simple <?= !isset($menukey) ? 'current' : '' ?>" aria-haspopup="true"><a href="./">Home</a></li>
                                <?php while ($tlink = mysqli_fetch_object($Cat2Pages)) : ?>
                                    <?php if ($Core->HasPages($tlink->pageid)) : $TopSubMenuPages = $Core->SubPages($tlink->pageid) ?>
                                        <li class="dropdown" aria-haspopup="true"><a href="#"><?= $tlink->menutitle ?><span class="wsarrow"></span></a>
                                            <ul class="sub-menu">
                                                <?php while ($topsubmenu = mysqli_fetch_object($TopSubMenuPages)) : ?>
                                                    <li aria-haspopup="true"><a href="/pages/<?= $tlink->shortname ?>/<?= $topsubmenu->shortname ?>"><?= $topsubmenu->menutitle ?></a></li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </li>
                                    <?php else : ?>
                                        <li class="nl-simple <?= !isset($menukey) ? 'current' : '' ?>" aria-haspopup="true"><a href="/pages/<?= $tlink->shortname ?>" class="<?= $menukey == $tlink->shortname ? 'current' : '' ?>"><?= $tlink->menutitle ?></a></li>
                                    <?php endif; ?>
                                <?php endwhile; ?>

                                <!-- NAVIGATION MENU BUTTON -->
                                <li class="nl-simple header-btn" aria-haspopup="true"><a href="#"><i class="fa fa-plus"></i>Patients</a></li>
                            </ul>
                        </nav> <!-- END MAIN MENU -->

                    </div>
                </div> <!-- END NAVIGATION MENU -->
            </header>
            <!-- END HEADER -->
        <?php endif; ?>