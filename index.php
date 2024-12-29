<?php

get_header();
$check = is_active_sidebar('blog-sidebar');
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
            <div class="row">

                <div class="col-xl-8 col-lg-8">

                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) {
                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            get_template_part('template-parts/blog/content', get_post_format());
                        }
                        wp_reset_postdata();
                    } else {
                        echo '<p>' . esc_html__('No Posts To Display.', 'exdos') . '</p>';
                    }
                    ?>

                    <?php get_template_part('template-parts/blog/pagination') ?>
                </div>

                <?php if ($check): ?>
                <div class="col-xl-4 col-lg-4">
                    <?php dynamic_sidebar('blog-sidebar')?>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

</main>






<?php get_footer();