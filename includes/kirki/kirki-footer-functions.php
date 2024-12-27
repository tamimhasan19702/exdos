<?php


function exdos_footer_section()
{
    if (class_exists('Kirki\Section')) {
        new \Kirki\Section(
            'exdos_footer_section',
            [
                'title' => esc_html__('Exdos Footer Logo and Social Media', 'kirki'),
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

            new \Kirki\Field\URL(
                [
                    'settings' => 'exdos_footer_facebook',
                    'label' => esc_html__('Facebook URL', 'kirki'),
                    'section' => 'exdos_footer_section',
                    'default' => 'https://www.facebook.com/',
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\URL(
                [
                    'settings' => 'exdos_footer_instagram',
                    'label' => esc_html__('Instagram URL', 'kirki'),
                    'section' => 'exdos_footer_section',
                    'default' => 'https://www.instagram.com/',
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\URL(
                [
                    'settings' => 'exdos_footer_linkedin',
                    'label' => esc_html__('LinkedIn URL', 'kirki'),
                    'section' => 'exdos_footer_section',
                    'default' => 'https://www.linkedin.com/',
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\URL(
                [
                    'settings' => 'exdos_footer_twitter',
                    'label' => esc_html__('Twitter URL', 'kirki'),
                    'section' => 'exdos_footer_section',
                    'default' => 'https://twitter.com/',
                    'priority' => 10,
                ]
            );


        }
    }
}

exdos_footer_section();

function exdos_footer_Copyright()
{
    if (class_exists('Kirki\Section')) {
        new \Kirki\Section(
            'exdos_footer_copyright_section',
            [
                'title' => esc_html__('Exdos Footer Copyright & Links', 'kirki'),
                'description' => esc_html__('Exdos Footer Section Description', 'kirki'),
                'panel' => 'exdos_kirki_panel',
                'priority' => 160,
            ]
        );

        if (class_exists('Kirki\Field')) {

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_footer_copyright_text',
                    'label' => esc_html__('Copyright Text', 'kirki'),
                    'section' => 'exdos_footer_copyright_section',
                    'default' => esc_html__('© Copyright 2024 | All rights reserved exdos', 'kirki'),
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_footer_copyright_company',
                    'label' => esc_html__('Copyright Company', 'kirki'),
                    'section' => 'exdos_footer_copyright_section',
                    'default' => esc_html__('ThemePure', 'kirki'),
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_footer_copyright_company_url',
                    'label' => esc_html__('Copyright Company URL', 'kirki'),
                    'section' => 'exdos_footer_copyright_section',
                    'default' => 'https://exdos.com',
                ]
            );
        }
    }
}

exdos_footer_Copyright();