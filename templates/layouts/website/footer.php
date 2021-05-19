<?php if ($PageInfo->showfooter) : ?>
    <!-- FOOTER-3 ============================================= -->
    <footer id="footer-3" class="bg-image wide-40 footer division">
        <div class="container">
            <!-- FOOTER CONTENT -->
            <div class="row">
                <!-- FOOTER INFO -->
                <div class="col-md-6 col-lg-4">
                    <div class="footer-info mb-40">
                        <!-- Footer Logo -->
                        <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 360 x 80  pixels) -->
                        <img src="<?= $assets ?>website\images\footer-logo-white.png" width="180" height="40" alt="<? $PageInfo->tiel ?>">
                        <!-- Text -->
                        <p class="p-sm mt-20"><?= $Core->getSiteInfo('home_about') ?></p>
                        <!-- Social Icons -->
                        <div class="footer-socials-links mt-20">
                            <ul class="foo-socials text-center clearfix">
                                <?php if ((int) strlen($Core->getSiteInfo('link_google'))) : ?>
                                    <li><a href="<?= $Core->getSiteInfo('link_google') ?>" class="ico-google-plus"><i class="fab fa-google-plus-g"></i></a></li>
                                <?php endif; ?>
                                <?php if ((int) strlen($Core->getSiteInfo('link_linkedin'))) : ?>
                                    <li><a href="<?= $Core->getSiteInfo('link_linkedin') ?>" class="ico-linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                <?php endif; ?>
                                <?php if ((int) strlen($Core->getSiteInfo('link_twitter'))) : ?>
                                    <li><a href="<?= $Core->getSiteInfo('link_twitter') ?>" class="ico-twitter"><i class="fab fa-twitter"></i></a></li>
                                <?php endif; ?>
                                <?php if ((int) strlen($Core->getSiteInfo('link_facebook'))) : ?>
                                    <li><a href="<?= $Core->getSiteInfo('link_facebook') ?>" class="ico-facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <?php endif; ?>
                                <?php if ((int) strlen($Core->getSiteInfo('link_youtube'))) : ?>
                                    <li><a href="<?= $Core->getSiteInfo('link_facebook') ?>" class="ico-youtube"><i class="fab fa-youtube"></i></a></li>
                                <?php endif; ?>
                                <?php if ((int) strlen($Core->getSiteInfo('link_instagram'))) : ?>
                                    <li><a href="<?= $Core->getSiteInfo('link_facebook') ?>" class="ico-instagram"><i class="fab fa-instagram"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- FOOTER CONTACTS -->
                <div class="col-md-6 col-lg-3 offset-lg-1">
                    <div class="footer-box mb-40">
                        <!-- Title -->
                        <h5 class="h5-xs">Our Location</h5>
                        <!-- Address -->
                        <p><?= $Core->getSiteInfo('home_address') ?></p>
                        <!-- Email -->
                        <p class="foo-email mt-20">E: <a href="mailto:<?= $Core->getSiteInfo('home_email') ?>"><?= $Core->getSiteInfo('home_email') ?></a></p>
                        <!-- Phone -->
                        <p>P: <?= $Core->getSiteInfo('home_mobile') ?></p>
                    </div>
                </div>

                <!-- FOOTER LINKS -->
                <div class="col-md-6 col-lg-2">
                    <div class="footer-links mb-40">
                        <!-- Title -->
                        <h5 class="h5-xs">About Clinic</h5>
                        <!-- Footer Links -->
                        <ul class="foo-links clearfix">
                            <?php while ($f3link = mysqli_fetch_object($Cat3Pages)) : ?>
                                <li><a href="/pages/<?= $f3link->shortname ?>"><?= $f3link->menutitle ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
                <!-- FOOTER LINKS -->
                <div class="col-md-6 col-lg-2">
                    <div class="footer-links mb-40">
                        <!-- Title -->
                        <h5 class="h5-xs">Discover</h5>
                        <!-- Footer List -->
                        <ul class="clearfix">
                            <?php while ($f4link = mysqli_fetch_object($Cat4Pages)) : ?>
                                <li><a href="/pages/<?= $f4link->shortname ?>"><?= $f4link->menutitle ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- END FOOTER CONTENT -->
            <!-- FOOTER COPYRIGHT -->
            <div class="bottom-footer">
                <div class="row">
                    <div class="col-md-12">
                        <p class="footer-copyright"><?= $Core->getSiteInfo('copyright_text') ?></p>
                    </div>
                </div>
            </div>
        </div> <!-- End container -->
    </footer> <!-- END FOOTER-3 -->
<?php endif; ?>

</div>
<!-- END PAGE CONTENT -->

<!-- EXTERNAL SCRIPTS ============================================= -->
<script src="<?= $assets ?>website\js\jquery-3.3.1.min.js"></script>
<script src="<?= $assets ?>website\js\bootstrap.min.js"></script>
<script src="<?= $assets ?>website\js\modernizr.custom.js"></script>
<script src="<?= $assets ?>website\js\jquery.easing.js"></script>
<script src="<?= $assets ?>website\js\jquery.appear.js"></script>
<script src="<?= $assets ?>website\js\jquery.stellar.min.js"></script>
<script src="<?= $assets ?>website\js\menu.js"></script>
<script src="<?= $assets ?>website\js\sticky.js"></script>
<script src="<?= $assets ?>website\js\jquery.scrollto.js"></script>
<script src="<?= $assets ?>website\js\materialize.js"></script>
<script src="<?= $assets ?>website\js\owl.carousel.min.js"></script>
<script src="<?= $assets ?>website\js\jquery.magnific-popup.min.js"></script>
<script src="<?= $assets ?>website\js\imagesloaded.pkgd.min.js"></script>
<script src="<?= $assets ?>website\js\isotope.pkgd.min.js"></script>
<script src="<?= $assets ?>website\js\hero-form.js"></script>
<script src="<?= $assets ?>website\js\contact-form.js"></script>
<script src="<?= $assets ?>website\js\comment-form.js"></script>
<script src="<?= $assets ?>website\js\appointment-form.js"></script>
<script src="<?= $assets ?>website\js\jquery.datetimepicker.full.js"></script>
<script src="<?= $assets ?>website\js\jquery.validate.min.js"></script>
<script src="<?= $assets ?>website\js\jquery.ajaxchimp.min.js"></script>
<script src="<?= $assets ?>website\js\wow.js"></script>
<!-- Custom Script -->
<script src="<?= $assets ?>website\js\custom.js"></script>
<script>
    new WOW().init();
</script>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!-- [if lt IE 9]>
			<script src="<?= $assets ?>website\js\html5shiv.js" type="text/javascript"></script>
			<script src="<?= $assets ?>website\js\respond.min.js" type="text/javascript"></script>
		<![endif] -->
<script src="<?= $assets ?>website\js\changer.js"></script>
<script defer="" src="<?= $assets ?>website\js\styleswitch.js"></script>
</body>

</html>