<?php


$videoUrl = function_exists('get_field') ? get_field('post_format_url') : null;

if(is_single()):
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('tp-postbox mb-60'); ?>>

    <div class="tp-postbox-thumb mb-35  position-relative br-20">
        <?php the_post_thumbnail('post-thumbnail', ['alt' => get_the_title()]); ?>
        <div class="tp-blog-video">
            <a class="popup-video" href="<?php echo esc_url($videoUrl); ?>"><i class="fal fa-play"></i></a>
        </div>
    </div>

    <div class="tp-postbox-content">
        <div class="tp-postbox-meta mb-15">
            <span><a href="#"><i class="fal fa-user"></i><?php echo esc_html(get_the_author()); ?></a></span>
            <span><a href="#"><i class="fal fa-calendar-alt"></i>
                    <?php echo esc_html(get_the_date('d M. Y')); ?></a></span>
            <?php get_exdos_category(); ?>
        </div>
        <h3 class="tp-postbox-title tp-fs-40 mb-30">
            <?php echo esc_html(get_the_title()); ?>
        </h3>
        <div class="tp-postbox-details">
            <?php the_content(); ?>

            <div class="tp-postbox-tag-wrapper mt-50">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="tp-postbox-tag">
                            <span>Tags:</span>
                            <?php get_exdos_tags(); ?>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="tp-postbox-social text-start text-md-end">
                            <?php
                            if (has_post_thumbnail()) :
                                $image_id = get_post_thumbnail_id();
                                $image_url = wp_get_attachment_image_src($image_id, 'full')[0];
                            else :
                                $image_url = get_template_directory_uri() . '/assets/img/logo/logo.png';
                            endif;

                            $post_title = get_the_title();
                            $post_url = get_permalink();
                            $post_excerpt = get_the_excerpt();

                            $share_links = array(
                                'facebook' => "https://www.facebook.com/sharer/sharer.php?u=" . $post_url,
                                'twitter' => "https://twitter.com/intent/tweet?text=" . $post_title . "&url=" . $post_url,
                                'linkedin' => "https://www.linkedin.com/sharing/share-offsite/?url=" . $post_url,
                                'pinterest' => "https://pinterest.com/pin/create/button/?url=" . $post_url . "&media=" . $image_url . "&description=" . $post_excerpt,
                            );

                            foreach ($share_links as $key => $share_link) :
                                if (get_post_meta(get_the_ID(), 'exdos_share_' . $key, true) !== 'no') :
                                    ?>
                            <a href="<?php echo esc_url($share_link); ?>" target="_blank"><i
                                    class="fab fa-<?php echo esc_attr($key); ?>"></i></a>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<?php else:?>
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

<?php endif;?>