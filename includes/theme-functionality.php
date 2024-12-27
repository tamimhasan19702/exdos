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





}