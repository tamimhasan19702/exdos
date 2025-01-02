<?php
get_header();
?>
<main>





    <section class="tp-page-area pt-130 pb-130">
        <div class="container justify-content-center">
            <div class="row ">

                <div class="col-xl-12">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/content', 'page');



                            if (comments_open() || get_comments_number()):
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