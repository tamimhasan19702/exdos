<?php


$videoUrl = function_exists('get_field') ? get_field('post_format_url') : null;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("tp-postbox mb-60 sadadadada"); ?>>

    <div class="tp-postbox-thumb mb-35  position-relative br-20">
        <?php the_post_thumbnail('post-thumbnail', ['alt' => get_the_title()]); ?>
        <div class="tp-blog-video">
            <a class="popup-video" href="<?php echo esc_url($videoUrl); ?>"><i class="fal fa-play"></i></a>
        </div>
    </div>

    <div class="tp-postbox-content">
        <div class="tp-postbox-meta mb-15">
            <span><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i
                        class="fal fa-user"></i> <?php echo esc_html(get_the_author()); ?></a></span>
            <span><a
                    href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>"><i
                        class="fal fa-calendar-alt"></i> <?php echo esc_html(get_the_date('d M. Y')); ?></a></span>

            <?php get_exdos_category(); ?>

        </div>
        <h3 class="tp-postbox-title tp-fs-40 mb-30"><a
                href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h3>
        <div class="tpblog__btn">
            <a class="tp-text-btn"
                href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html__('Read More', 'exdos'); ?> <i
                    class="far fa-arrow-right"></i></a>
        </div>
    </div>
</article>