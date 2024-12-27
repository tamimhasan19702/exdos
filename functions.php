<?php


if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Kirki')) {
    add_action('admin_notices', function () {
        echo '<div class="notice notice-warning is-dismissible"><p>Please install and activate the Kirki Customizer Framework plugin to use this theme.</p></div>';
    });
    return;
}



include_once(get_template_directory() . '/includes/enqueue.php');
include_once(get_template_directory() . '/includes/theme-support.php');
include_once(get_template_directory() . '/includes/kirki-functions.php');

add_action('after_setup_theme', 'exdos_setup');
add_action('wp_enqueue_scripts', 'exdos_scripts');