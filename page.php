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



    <section class="tp-page-area pt-130 pb-130">
        <div class="container justify-content-center">
            <div class="row ">

                <div class="col-xl-12">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/content', 'page');

                            
                   
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    
                        }
                    } else {
                        echo '<p>' . esc_html__('Content not found', 'exdos') . '</p>';
                    }
                    ?>



                    <?php get_template_part('template-parts/blog/pagination') ?>
                </div>

            </div>
        </div>
    </section>






</main>



<?php get_footer();