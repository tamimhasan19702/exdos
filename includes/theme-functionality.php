<?php


function exdos_register_menu()
{

    register_nav_menu('Exdos Main Menu', __('Exdos Main Menu'));
    register_nav_menu('Exdos Footer Menu', __('Exdos Footer Menu'));
}

add_action('init', 'exdos_register_menu');