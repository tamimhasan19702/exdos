<?php
$copyright = get_theme_mod('exdos_footer_copyright_text', 'Copyright 2024 | Alright reserved exdos ');
$copyright_company = get_theme_mod('exdos_footer_copyright_company', 'ThemePure');
$copyright_link = get_theme_mod('exdos_footer_copyright_company_url', '#');
?>

<div class="tp-footer-copyright-area pt-40 pb-10 p-relative z-index-1">
    <div class="row align-items-center">
        <div class="col-xl-3 col-lg-4">
            <div class="tp-footer-copyright mb-30 text-md-center text-lg-start">
                <p><?php echo esc_html($copyright); ?>

                    <?php if (!empty($copyright_link) && !empty($copyright_company)): ?>
                    by <a href="<?php echo esc_url($copyright_link); ?>"><?php echo esc_html($copyright_company); ?></a>
                    <?php endif; ?>

                </p>
            </div>
        </div>

        <?php if (has_nav_menu('Exdos Bottom Menu')): ?>
        <div class="col-xl-9 col-lg-8">
            <div class="tp-footer-menu text-md-center text-lg-end mb-30 ">
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'Exdos Bottom Menu',
                    ));
                    ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>