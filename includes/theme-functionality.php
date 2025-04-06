<?php


function exdos_register_menu()
{

    register_nav_menu('Exdos Main Menu', __('Exdos Main Menu'));
    register_nav_menu('Exdos Footer Menu', __('Exdos Footer Menu'));
    register_nav_menu('Exdos Bottom Menu', __('Exdos Bottom Menu'));
}

add_action('init', 'exdos_register_menu');


if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Footer 1', 'exdos'),
        'id' => 'footer-1',
        'description' => __('Widgets in this area will be shown in the first column of the footer.', 'exdos'),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-footer-widget-title mb-20">',
        'after_title' => '</h3>',
    ));


    register_sidebar(array(
        'name' => __('Footer 2', 'exdos'),
        'id' => 'footer-2',
        'description' => __('Widgets in this area will be shown in the second column of the footer.', 'exdos'),
        'before_widget' => '<div class="tp-footer-widget tp-footer-col-2 mb-50">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-footer-widget-title mb-20">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer 3', 'exdos'),
        'id' => 'footer-3',
        'description' => __('Widgets in this area will be shown in the third column of the footer.', 'exdos'),
        'before_widget' => '<div class="tp-footer-widget tp-footer-col-3 mb-50">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-footer-widget-title mb-20">',
        'after_title' => '</h3>',
    ));


    register_sidebar(array(
        'name' => __('Footer 4', 'exdos'),
        'id' => 'footer-4',
        'description' => __('Widgets in this area will be shown in the fourth column of the footer.', 'exdos'),
        'before_widget' => '<div class="tp-footer-widget tp-footer-col-4 mb-50">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-footer-widget-title mb-20">',
        'after_title' => '</h3>',
    ));


    register_sidebar(array(
        'name' => __('Blog Sidebar', 'exdos'),
        'id' => 'blog-sidebar',
        'description' => __('Widgets in this area will be shown in the blog page', 'exdos'),
        'before_widget' => '<div id="%1$s" class="tp-blog-sidebar-widget widget-blog-sidebar mb-30 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="tp-blog-sidebar-title tp-fs-24 mb-25">',
        'after_title' => '</h3>',
    ));


}




function exdos_search_form($form)
{
    $form = '<form class="tp-blog-form position-relative" action="/" method="get">     <input type="text" name="s" value="' . get_search_query() . '"         placeholder="' . esc_attr__('Search Keywords', 'exdos') . '">     <button type="submit"><i class="far fa-arrow-right"></i></button> </form>';

    return $form;
}
add_filter('get_search_form', 'exdos_search_form');

function get_exdos_category()
{
    $categories = get_the_category();
    if (!empty($categories)) {
        $category = $categories[0];
        ?>
<span>
    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
        <i class="fal fa-certificate"></i> <?php echo esc_html($category->name); ?>
    </a>
</span>
<?php
    }
}

function get_exdos_tags()
{
    $tags = get_the_tags();
    if (!empty($tags)) {
        $output = '<span>';
        foreach ($tags as $tag) {
            $output .= '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a> ';
        }
        $output .= '</span>';
        echo wp_kses_post($output);
    }
}




function exdos_kses($content = '')
{
    $allowed_html = [

        'span' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'i' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'a' => [
            'class' => [],
            'id' => [],
            'href' => [],
            'style' => [],
            'target' => [],
            'rel' => [],
        ],
        'br' => [
        ],
        'p' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h1' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h2' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h3' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h4' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h5' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h6' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'img' => [
            'src' => [],
            'alt' => [],
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'ul' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'li' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'ol' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'blockquote' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'pre' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'code' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'table' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'tr' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'td' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'th' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'dl' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'dt' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'dd' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'video' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'autoplay' => [],
            'controls' => [],
            'loop' => [],
            'muted' => [],
            'playsinline' => [],
            'preload' => [],
            'src' => [],
            'poster' => [],
            'width' => [],
            'height' => [],
        ],
        'source' => [
            'src' => [],
            'type' => [],
            'media' => [],
            'sizes' => [],
        ],
        'strong' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'b' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'em' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'i' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'div' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'button' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'input' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'type' => [],
            'name' => [],
            'value' => [],
            'placeholder' => [],
        ],
        'textarea' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'name' => [],
            'placeholder' => [],
        ],
        'select' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'name' => [],
        ],
        'option' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'value' => [],
        ],
        'svg' => [
            'xmlns' => [],
            'fill' => [],
            'viewbox' => [],
            'role' => [],
            'aria-hidden' => [],
            'focusable' => [],
            'height' => [],
            'width' => [],
        ],
        'path' => [
            'd' => [],
            'fill' => [],
        ],
        'iframe' => [
            'src' => [],
            'width' => [],
            'height' => [],
            'frameborder' => [],
            'allowfullscreen' => [],
        ],
        'strong' => [
            'class' => [],
            'id' => [],

        ],
    ];

    return wp_kses($content, $allowed_html);
}


if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_breadcrumb_settings', // Unique key for the field group
        'title' => 'Breadcrumb Settings', // Title of the field group
        'fields' => array(
            array(
                'key' => 'field_breacrumb_on_off', // Unique key for the field
                'label' => 'Enable Breadcrumb', // Label for the field
                'name' => 'breacrumb_on_off', // Name of the field (used in get_field())
                'type' => 'true_false', // Checkbox field (True/False)
                'instructions' => 'Toggle breadcrumb display for this page/post.', // Instructions for the user
                'required' => 0, // Not required
                'conditional_logic' => 0, // No conditional logic
                'wrapper' => array(
                    'width' => '', // Full width
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Enable breadcrumb for this page/post', // Checkbox label
                'default_value' => true, // Default value (checked by default)
                'ui' => 1, // Use UI styling
                'ui_on_text' => 'Yes', // Text for "on" state
                'ui_off_text' => 'No', // Text for "off" state
                'return_format' => 'bool', // Return the value as a boolean (true/false)
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type', // Show this field group for all post types
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
            array(
                array(
                    'param' => 'post_type', // Show this field group for pages
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
            array(
                array(
                    'param' => 'post_type', // Show this field group for custom post types (e.g., 'product')
                    'operator' => '==',
                    'value' => 'product',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side', // Display in the sidebar of the editor
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
}


function exdos_headers(){
    $header_variation = function_exists('get_field') ? get_field('header_variation') : '';

    $header_variation_kirki = get_theme_mod('exdos_header_variation', 'header_1');

    if($header_variation == 'header_1'){
        get_template_part('template-parts/header/header-1');
    }elseif($header_variation == 'header_2'){
        get_template_part('template-parts/header/header-2');
    }else{
        if($header_variation_kirki == 'header_1'){
            get_template_part('template-parts/header/header-1');
        }elseif($header_variation_kirki == 'header_2'){
            get_template_part('template-parts/header/header-2');
        }
    }

}


function exdos_footers(){
    $footer_variation = function_exists('get_field') ? get_field('footer_variation') : '';

    $footer_variation_kirki = get_theme_mod('exdos_footer_variation', 'footer_1');

    if($footer_variation == 'footer_1'){
        get_template_part('template-parts/footer/footer-1');
    }elseif($footer_variation == 'footer_2'){
        get_template_part('template-parts/footer/footer-2');
    }else{
        if($footer_variation_kirki == 'footer_1'){
            get_template_part('template-parts/footer/footer-1');
        }elseif($footer_variation_kirki == 'footer_2'){
            get_template_part('template-parts/footer/footer-2');
        }
    }

}