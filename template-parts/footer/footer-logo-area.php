<?php
$footer_logo = get_theme_mod('exdos_footer_logo', get_template_directory_uri() . '/assets/img/logo/logo-white.png');
$facebook = get_theme_mod('exdos_footer_facebook', '#');
$twitter = get_theme_mod('exdos_footer_twitter', '#');
$instagram = get_theme_mod('exdos_footer_instagram', '#');
$linkedin = get_theme_mod('exdos_footer_linkedin', '#');
?>


<div class="tp-foter-logo-area pt-130">
    <div class="row align-items-center">
        <div class="col-xl-3 col-lg-3 col-md-4">

            <?php if (!empty($footer_logo)): ?>
            <div class="footer-logo mb-30">
                <a href="index.html"><img src="<?php echo $footer_logo; ?>" alt=""></a>
            </div>
            <?php endif; ?>

        </div>
        <div class="col-xl-6 col-lg-5 col-md-4 d-none d-md-block">
            <div class="footer-sep mb-30"></div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-4">
            <div class="tpfooter-social pl-35 mb-30">

                <?php if (!empty($facebook)): ?>
                <a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-f"></i></a>
                <?php endif; ?>

                <?php if (!empty($twitter)): ?>
                <a href="<?php echo $twitter; ?>"><i class="fab fa-twitter"></i></a>
                <?php endif; ?>

                <?php if (!empty($instagram)): ?>
                <a href="<?php echo $instagram; ?>"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>

                <?php if (!empty($linkedin)): ?>
                <a href="<?php echo $linkedin; ?>"><i class="fab fa-linkedin-in"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>