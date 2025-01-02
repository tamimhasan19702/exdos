<?php

get_header();
$check_sidebar = is_active_sidebar('blog-sidebar') ? '' : 'justify-content-center';
?>




<main>



    <section class="tp-blogpost-area pt-130 pb-130">
        <div class="container">
            <div class="row <?php echo esc_attr($check_sidebar) ?>">

                <div class="col-xl-8 col-lg-8">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/content', get_post_format());
                        }
                    } else {
                        echo '<p>' . esc_html__('No Posts To Display.', 'exdos') . '</p>';
                    }
                    ?>

                    <?php get_template_part('template-parts/blog/pagination') ?>
                </div>

                <?php if (is_active_sidebar('blog-sidebar')): ?>
                    <div class="col-xl-4 col-lg-4">
                        <?php get_sidebar(); ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>

</main>






<?php get_footer();