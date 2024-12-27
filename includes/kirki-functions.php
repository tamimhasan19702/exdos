<?php

function kirki_panels()
{
    if (class_exists('Kirki\Panel')) {
        new \Kirki\Panel(
            'exdos_kirki_panel',
            [
                'priority' => 10,
                'title' => esc_html__('Exdos Options', 'kirki'),
                'description' => esc_html__('Exdos Options Description.', 'kirki'),
            ]
        );
    }
}

kirki_panels();

function kirki_sections()
{
    if (class_exists('Kirki\Section')) {
        new \Kirki\Section(
            'exdos_header_section',
            [
                'title' => esc_html__('Exdos Header Section', 'kirki'),
                'description' => esc_html__('Exdos Header Section Description', 'kirki'),
                'panel' => 'exdos_kirki_panel',
                'priority' => 160,
            ]
        );

        if (class_exists('Kirki\Field')) {

            new \Kirki\Field\Image(
                [
                    'settings' => 'exdos_header_logo',
                    'label' => esc_html__('Exdos Header Logo', 'kirki'),
                    'description' => esc_html__('The saved value will be the URL.', 'kirki'),
                    'section' => 'exdos_header_section',
                    'default' => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_header_phone_number_text',
                    'label' => esc_html__('Phone Number Text', 'kirki'),
                    'section' => 'exdos_header_section',
                    'default' => esc_html__('Free Call', 'kirki'),
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_header_phone_number',
                    'label' => esc_html__('Phone Number', 'kirki'),
                    'section' => 'exdos_header_section',
                    'default' => '02 (256) 256 025',
                ]
            );

        }
    }
}

kirki_sections();