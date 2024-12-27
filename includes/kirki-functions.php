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
            'exfos_header_info',
            [
                'title' => esc_html__('Stocker Topbar Info', 'kirki'),
                'description' => esc_html__('Stocker Topbar Info Description', 'kirki'),
                'panel' => 'stocker_options_panel',
                'priority' => 160,
            ]
        );

        if (class_exists('Kirki\Field')) {

            new \Kirki\Field\Image(
                [
                    'settings' => 'image_setting_url',
                    'label' => esc_html__('Image Control (URL)', 'kirki'),
                    'description' => esc_html__('The saved value will be the URL.', 'kirki'),
                    'section' => 'section_id',
                    'default' => '',
                ]
            );

        }
    }
}