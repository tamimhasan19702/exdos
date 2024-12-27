<?php


function exdos_footer_section()
{
    if (class_exists('Kirki\Section')) {
        new \Kirki\Section(
            'exdos_footer_section',
            [
                'title' => esc_html__('Exdos Footer Logo and Contact Information', 'kirki'),
                'description' => esc_html__('Exdos Footer Section Description', 'kirki'),
                'panel' => 'exdos_kirki_panel',
                'priority' => 160,
            ]
        );

        if (class_exists('Kirki\Field')) {

            new \Kirki\Field\Image(
                [
                    'settings' => 'exdos_footer_logo',
                    'label' => esc_html__('Exdos Footer Logo', 'kirki'),
                    'description' => esc_html__('The saved value will be the URL.', 'kirki'),
                    'section' => 'exdos_footer_section',
                    'default' => get_template_directory_uri() . '/assets/img/logo/logo-white.png',
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_footer_phone_number_text',
                    'label' => esc_html__('Phone Number Text', 'kirki'),
                    'section' => 'exdos_footer_section',
                    'default' => esc_html__('Contact Us', 'kirki'),
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_footer_phone_number',
                    'label' => esc_html__('Phone Number', 'kirki'),
                    'section' => 'exdos_footer_section',
                    'default' => '02 (256) 256 025',
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_footer_email',
                    'label' => esc_html__('Email Address', 'kirki'),
                    'section' => 'exdos_footer_section',
                    'default' => 'contact@exdos.com',
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_footer_address',
                    'label' => esc_html__('Office Address', 'kirki'),
                    'section' => 'exdos_footer_section',
                    'default' => 'Avenue de Roma 158b, Lisboa',
                ]
            );
        }
    }
}