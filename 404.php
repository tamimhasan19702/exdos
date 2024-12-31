<?php

get_header();


?>

<main>

    <section class="tp-breadcrumb-area tp-breadcrumb-space p-relative"
        data-background="<?php echo get_template_directory_uri(); ?> /assets/img/breadcrumb/breadcrumb-pattern.png"
        data-bg-color="#0A0E1A">
        <div class="tp-breadcrumb-shape">
            <img class="tp-breadcrumb-shape-1 p-absolute"
                src="<?php echo get_template_directory_uri(); ?> /assets/img/breadcrumb/shape-1.png" alt="">
            <img class="tp-breadcrumb-shape-2 p-absolute"
                src="<?php echo get_template_directory_uri(); ?> /assets/img/breadcrumb/shape-2.png" alt="">
            <img class="tp-breadcrumb-shape-3 p-absolute"
                src="<?php echo get_template_directory_uri(); ?> /assets/img/breadcrumb/shape-3.png" alt="">
        </div>
        <div class="container">
            <div class="tp-breadcrumb text-center position-relative z-index-2">
                <h1 class="tp-breadcrumb-title tp-upper tp-text-white">Blog</h1>
                <div class="tp-breadcrumb-list">
                    <span class="active"><a href="#">Home</a></span>
                    <span class="dvir">-</span>
                    <span><a href="#">blog</a></span>
                </div>
            </div>
        </div>
    </section>


    <section class="tp-blogpost-area pt-130 pb-130">
        <div class="container">
            <div class="row 
            justify-content-center">

                <div class="col-xl-8 col-lg-8">



                    <div class="error-page text-center">
                        <h1>404 Error</h1>
                        <p>Whoops, this is emberassing. Looks like the page you're looking for isn't here. <br></p>
                        <div class="tp-about-btn">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="tp-btn">
                                <span class="tp-btn-wrap">
                                    <span class="tp-btn-y-1">Back To Home</span>
                                    <span class="tp-btn-y-2">Back To Home</span>
                                </span>
                                <i></i>
                            </a>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </section>

</main>






<?php get_footer();