<?php

$logo = get_theme_mod('exdos_header_logo', get_template_directory_uri() . '/assets/img/logo/logo-white.png');
$phone_number_text = get_theme_mod('exdos_header_phone_number_text', 'Free Call');
$phone_number = get_theme_mod('exdos_header_phone_number', '02 (256) 256 025');
?>


<header>
    <div id="tp-header-sticky" class="tp-header-area tp-transparent-header pl-100 tp-header-border tp-sticky-black"
        style="background-color: green">
       
        <div class="container-fluid p-0">
            <div class="row gx-0 align-items-center">
                <div class="col-xl-2 col-lg-5 col-md-4 col-6">

                    <div class="tp-logo">
                        <a href="index.html"><img src="<?php echo esc_url($logo); ?>" alt=""></a>
                    </div>
                </div>

                <div class="col-xl-10 col-lg-7 col-md-8 col-6">
                    <div class="tp-header-box d-flex justify-content-xl-between justify-content-end">
                        <?php get_template_part('template-parts/header/header-menu'); ?>

                        <div class="tp-header-right d-flex justify-content-end flex-wrap align-items-center">
                            <!-- Search Button -->
                            <div class="tp-header-search d-none d-md-flex">
                                <button class="d-flex align-items-center tp-search-toggle"><i
                                        class="flaticon-search"></i></button>
                            </div>

                            <!-- Call to Action -->
                            <div class="tp-header-cta d-none d-md-flex">
                                <div class="tp-header-cta-icon d-flex align-items-center">
                                    <i class="flaticon-phone-book"></i>
                                </div>
                                <div class="tp-header-cta-text">
                                    <span><?php echo esc_html($phone_number_text, 'exdos') ?></span>
                                    <h4> <?php echo esc_html($phone_number, 'exdos') ?> </h4>
                                </div>
                            </div>

                            <!-- Offcanvas Toggle -->
                            <div class="tp-header-bar">
                                <button class="tp-offcanvas-toogle"><i class="flaticon-menu"></i></button>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</header>