<?php

/**
 * Displays the breadcrumb navigation with customizable title and background.
 */
function exdos_breadcrumb()
{
    global $post;
    $breadcrumb_class = '';
    $breadcrumb_show = 1;

    // Determine the title and class based on the page type
    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'exdos'));
        $breadcrumb_class = 'home_front_page';
        $breadcrumb_show = 0;
    } elseif (is_front_page()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'exdos'));
        $breadcrumb_show = 0;
    } elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    } elseif (is_single()) {
        if ('post' == get_post_type()) {
            $title = get_the_title();
        } elseif ('service' == get_post_type()) {
            $title = get_the_title();
        } elseif ('product' == get_post_type()) {
            $title = get_theme_mod('breadcrumb_product_details', __('Shop', 'exdos'));
        }
    } elseif (is_search()) {
        $title = esc_html__('Search Results for : ', 'exdos') . get_search_query();
    } elseif (is_404()) {
        $title = esc_html__('Page not Found', 'exdos');
    } elseif (is_archive()) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }

    // Get the ID for conditional breadcrumb display
    $_id = get_the_ID();
    if (is_single() && 'product' == get_post_type()) {
        $_id = $post->ID;
    } elseif (function_exists("is_shop") && is_shop()) {
        $_id = wc_get_page_id('shop');
    } elseif (is_home() && get_option('page_for_posts')) {
        $_id = get_option('page_for_posts');
    }

    // Get custom breadcrumb background image and switch
    $breadcrumb_bg_img = get_theme_mod('exdos_breadcrumb_image');
    $breadcrumb_switch = function_exists('get_field') ? get_field('breacrumb_on_off', $_id) : null;

    // Render the breadcrumb section
    ?>
    <?php if (!empty($breadcrumb_switch) && $breadcrumb_switch): ?>
        <section class="tp-breadcrumb-area tp-breadcrumb-space p-relative"
            data-background="<?php echo esc_url($breadcrumb_bg_img); ?>" data-bg-color="#0A0E1A">
            <div class="tp-breadcrumb-shape">
                <img class="tp-breadcrumb-shape-1 p-absolute"
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb/shape-1.png" alt="">
                <img class="tp-breadcrumb-shape-2 p-absolute"
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb/shape-2.png" alt="">
                <img class="tp-breadcrumb-shape-3 p-absolute"
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb/shape-3.png" alt="">
            </div>
            <div class="container">
                <div class="tp-breadcrumb text-center position-relative z-index-2">
                    <h1 class="tp-breadcrumb-title tp-upper tp-text-white"><?php echo wp_kses_post($title); ?></h1>
                    <?php if (function_exists('bcn_display')): ?>
                        <div class="tp-breadcrumb-list">
                            <?php bcn_display(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php
}

add_action('wp_head', 'exdos_breadcrumb');