<?php

/**
 * Offcanvas template part
 *
 * @package Exdos
 */

// offcanvas menu section
$off_canvas_logo = get_theme_mod('exdos_offcanvas_menu_logo', get_template_directory_uri() . '/assets/img/logo/logo-black.png');
$off_canvas_text = get_theme_mod('exdos_offcanvas_menu_text', 'Hello There!');
$off_canvas_description = get_theme_mod('exdos_offcanvas_textarea', 'Lorem ipsum dolor sit amet, consect etur adipiscing elit. ');
$off_canvas_repeater = get_theme_mod('exdos_offcanvas_gallery', get_template_directory_uri() . '/assets/img/project/showcase-thumb-01.jpg');

// offcanvas information
$off_canvas_information = get_theme_mod('exdos_offcanvas_information_label', 'Information');
$off_canvas_phone_number = get_theme_mod('exdos_offcanvas_phone_number', '+ 4 20 7700 1007');
$off_canvas_email = get_theme_mod('exdos_offcanvas_email', 'hello@exdos.com');
$off_canvas_location = get_theme_mod('exdos_offcanvas_location', 'Avenue de Roma 158b, Lisboa');

// offcanvas social media
$off_canvas_follw_us = get_theme_mod('exdos_offcanvas_follow_us_label', 'Follow Us');
$off_canvas_facebook = get_theme_mod('exdos_offcanvas_facebook', '#');
$off_canvas_twitter = get_theme_mod('exdos_offcanvas_twitter', '#');
$off_canvas_linkedin = get_theme_mod('exdos_offcanvas_linkedin', '#');
$off_canvas_instagram = get_theme_mod('exdos_offcanvas_instagram', '#');

?>
<div class="tp-offcanvas">
    <div class="tp-offcanvas-wrapper">
        <div class="tp-offcanvas-header d-flex justify-content-between align-items-center mb-90">
            <div class="tp-offcanvas-logo">
                <a href="index.html"><img src="<?php echo esc_url($off_canvas_logo) ?>" alt=""></a>
            </div>
            <div class="tp-offcanvas-close">
                <button class="tp-offcanvas-close-toggle"><i class="fal fa-times"></i></button>
            </div>
        </div>
        <div class="tp-offcanvas-menu d-xl-none mb-50">
            <nav></nav>
        </div>
        <div class="tp-offcanvas-content mb-50 d-none d-xl-block">
            <?php
            if (!empty($off_canvas_text)) {
                echo '<h2 class="tp-offcanvas-title">' . esc_html($off_canvas_text) . '</h2>';
            }
            ?>
            <?php
            if (!empty($off_canvas_description)) {
                echo '<p>' . esc_html($off_canvas_description) . '</p>';
            }
            ?>


        </div>
        <?php if (!empty($off_canvas_repeater)) {
            ?>
            <div class="tp-offcanvas-gallery mb-50">
                <?php
                foreach ($off_canvas_repeater as $item) {
                    echo '<a class="popup-image" href="' . esc_url($item['image_url']) . '"><img src="' . esc_url($item['image_url']) . '" alt="' . esc_attr($item['image_alt']) . '"></a>';
                }
                ?>
            </div>
            <?php
        } ?>
        <?php
        if (!empty($off_canvas_phone_number) || !empty($off_canvas_email) || !empty($off_canvas_location)):
            ?>
            <div class="tp-offcanvas-info mb-50">
                <h3 class="tp-offcanvas-sm-title"><?php echo esc_html($off_canvas_information) ?></h3>
                <span><a href="#"><?php echo esc_html($off_canvas_phone_number) ?></a></span>
                <span><a href="#"><?php echo esc_html($off_canvas_email) ?></a></span>
                <span><a href="#"><?php echo esc_html($off_canvas_location) ?></a></span>
            </div>

        <?php endif; ?>
        <?php if (!empty($off_canvas_facebook) || !empty($off_canvas_twitter) || !empty($off_canvas_linkedin) || !empty($off_canvas_instagram)): ?>
            <div class="tp-offcanvas-social mb-50">
                <h3 class="tp-offcanvas-sm-title"><?php echo esc_html($off_canvas_follw_us) ?></h3>
                <?php if (!empty($off_canvas_facebook)): ?>
                    <a href="<?php echo esc_url($off_canvas_facebook) ?>"><i class="fab fa-facebook-f"></i></a>
                <?php endif; ?>
                <?php if (!empty($off_canvas_twitter)): ?>
                    <a href="<?php echo esc_url($off_canvas_twitter) ?>"><i class="fab fa-twitter"></i></a>
                <?php endif; ?>
                <?php if (!empty($off_canvas_linkedin)): ?>
                    <a href="<?php echo esc_url($off_canvas_linkedin) ?>"><i class="fab fa-linkedin-in"></i></a>
                <?php endif; ?>
                <?php if (!empty($off_canvas_instagram)): ?>
                    <a href="<?php echo esc_url($off_canvas_instagram) ?>"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="tp-offcanvas-overlay"></div>