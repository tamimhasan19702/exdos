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

include_once(get_template_directory() . '/includes/theme-functionality.php');
include_once(get_template_directory() . '/includes/class_exdos_walker_nav_menu.php');

if (class_exists('Kirki')) {
    include_once(get_template_directory() . '/includes/kirki/kirki-header-functions.php');
    include_once(get_template_directory() . '/includes/kirki/kirki-footer-functions.php');
}