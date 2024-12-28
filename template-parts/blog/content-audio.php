<?php
$cat = get_the_category();

$audioUrl = function_exists('get_field') ? get_field('post_format_url') : null;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("tp-postbox mb-60 sadadadada"); ?>>

    <div class="tp-postbox-thumb mb-35  ratio ratio-16x9 ">
        <?php echo wp_oembed_get($audioUrl) ?>
    </div>

    <div class="tp-postbox-content">
        <div class="tp-postbox-meta mb-15">
            <span><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i
                        class="fal fa-user"></i> <?php echo esc_html(get_the_author()); ?></a></span>
            <span><a
                    href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>"><i
                        class="fal fa-calendar-alt"></i> <?php echo esc_html(get_the_date('d M. Y')); ?></a></span>
            <span><a href="<?php echo esc_url(get_category_link($cat[0]->term_id)); ?>"><i
                        class="fal fa-certificate"></i> <?php echo esc_html($cat[0]->cat_name); ?></a></span>
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