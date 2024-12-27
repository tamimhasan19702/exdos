<?php

$logo = get_theme_mod('exdos_header_logo', get_template_directory_uri() . '/assets/img/logo/logo-white.png');
$phone_number_text = get_theme_mod('exdos_header_phone_number_text', 'Free Call');
$phone_number = get_theme_mod('exdos_header_phone_number', '02 (256) 256 025');
?>


<header>
    <div id="tp-header-sticky" class="tp-header-area tp-transparent-header pl-100 tp-header-border tp-sticky-black">
        <div class="container-fluid p-0">
            <div class="row gx-0 align-items-center">
                <div class="col-xl-2 col-lg-5 col-md-4 col-6">
                    <div class="tp-logo">
                        <a href="index.html"><img src="<?php echo esc_url($logo); ?>" alt=""></a>
                    </div>
                </div>

                <div class="col-xl-10 col-lg-7 col-md-8 col-6">
                    <div class="tp-header-box d-flex justify-content-xl-between justify-content-end">
                        <div class="tp-main-menu pl-45 d-none d-xl-block">
                            <nav class="tp-mobile-menu-active">
                                <ul>
                                    <!-- Home Menu -->
                                    <li class="has-dropdown"><a href="index.html">Home</a></li>

                                    <!-- About Us Menu -->
                                    <li><a href="about.html">About Us</a></li>

                                    <!-- Service Menu -->
                                    <li><a href="services.html">Service</a>
                                        <ul class="sub-menu">
                                            <li><a href="services.html">Services</a></li>
                                            <li><a href="services-details.html">Services Details</a></li>
                                        </ul>
                                    </li>

                                    <!-- Portfolio Menu -->
                                    <li class="has-dropdown"><a href="portfolio.html">Portfolio</a>
                                        <ul class="sub-menu">
                                            <li><a href="portfolio.html">Portfolio</a></li>
                                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                        </ul>
                                    </li>

                                    <!-- Pages Menu -->
                                    <li><a href="#">Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="portfolio.html">Portfolio</a></li>
                                            <li><a href="services.html">Services</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="pricing.html">Pricing</a></li>
                                            <li><a href="faq.html">Faq</a></li>
                                            <li><a href="team.html">Team</a></li>
                                            <li><a href="team-details.html">Team Details</a></li>
                                        </ul>
                                    </li>

                                    <!-- Blog Menu -->
                                    <li><a href="blog.html">Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li>

                                    <!-- Contact Menu -->
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>

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