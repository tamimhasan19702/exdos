<?php

get_header();


?>

<main>



    <section class="tp-blogpost-area pt-130 pb-130">
        <div class="container">
            <div class="row 
            justify-content-center">

                <div class="col-xl-8 col-lg-8">



                    <div class="error-page text-center">


                        <lottie-player src="<?php echo get_template_directory_uri(); ?> /assets/img/404/404.json" ?
                            background="transparent" speed="1" style="width: 100%; height: 500px;" loop autoplay>
                        </lottie-player>
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