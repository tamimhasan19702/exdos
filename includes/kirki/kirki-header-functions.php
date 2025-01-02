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

function exdos_header_section()
{
    if (class_exists('Kirki\Section')) {
        new \Kirki\Section(
            'exdos_header_section',
            [
                'title' => esc_html__('Exdos Header Logo and Phone Number', 'kirki'),
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

exdos_header_section();

function exdos_offcanvas_menu_section()
{
    if (class_exists('Kirki\Section')) {
        new \Kirki\Section(
            'exdos_offcanvas_menu_section',
            [
                'title' => esc_html__('Exdos Offcanvas Menu Section', 'kirki'),
                'description' => esc_html__('Exdos Offcanvas Menu Section Description', 'kirki'),
                'panel' => 'exdos_kirki_panel',
                'priority' => 160,
            ]
        );

        if (class_exists('Kirki\Field')) {

            new \Kirki\Field\Image(
                [
                    'settings' => 'exdos_offcanvas_menu_logo',
                    'label' => esc_html__('Exdos Offcanvas Menu Logo', 'kirki'),
                    'description' => esc_html__('The saved value will be the URL for the offcanvas menu.', 'kirki'),
                    'section' => 'exdos_offcanvas_menu_section',
                    'default' => get_template_directory_uri() . '/assets/img/logo/logo-black.png',
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_offcanvas_menu_text',
                    'label' => esc_html__('Offcanvas Menu Text', 'kirki'),
                    'section' => 'exdos_offcanvas_menu_section',
                    'default' => esc_html__('Hello There!', 'kirki'),
                ]
            );

            new \Kirki\Field\Textarea(
                [
                    'settings' => 'exdos_offcanvas_textarea',
                    'label' => esc_html__('Offcanvas Textarea', 'kirki'),
                    'section' => 'exdos_offcanvas_menu_section',
                    'default' => esc_html__('This is the offcanvas default text', 'kirki'),
                    'description' => esc_html__('Lorem ipsum dolor sit amet, consect etur adipiscing elit.', 'kirki'),
                ]
            );

            new \Kirki\Field\Repeater(
                [
                    'settings' => 'exdos_offcanvas_gallery',
                    'label' => esc_html__('Offcanvas Gallery', 'kirki'),
                    'section' => 'exdos_offcanvas_menu_section',
                    'priority' => 10,
                    'row_label' => [
                        'type' => 'field',
                        'value' => esc_html__('Image', 'kirki'),
                        'field' => 'image_url',
                    ],
                    'button_label' => esc_html__('Add Image', 'kirki'),
                    'default' => [
                        [
                            'image_url' => get_template_directory_uri() . '/assets/img/gallery/image-1.jpg',
                            'image_alt' => esc_html__('Image 1', 'kirki'),
                        ],
                        [
                            'image_url' => get_template_directory_uri() . '/assets/img/gallery/image-2.jpg',
                            'image_alt' => esc_html__('Image 2', 'kirki'),
                        ],
                    ],
                    'fields' => [
                        'image_url' => [
                            'type' => 'image',
                            'label' => esc_html__('Image URL', 'kirki'),
                            'description' => esc_html__('Select an image for the gallery.', 'kirki'),
                            'default' => '',
                        ],
                        'image_alt' => [
                            'type' => 'text',
                            'label' => esc_html__('Image Alt Text', 'kirki'),
                            'description' => esc_html__('Enter alt text for the image.', 'kirki'),
                            'default' => '',
                        ],
                    ],
                ]
            );
        }
    }
}

exdos_offcanvas_menu_section();

function exdos_offcanvas_information_section()
{
    if (class_exists('Kirki\Section')) {
        new \Kirki\Section(
            'exdos_offcanvas_information_section',
            [
                'title' => esc_html__('Exdos Offcanvas Information Section', 'kirki'),
                'description' => esc_html__('Exdos Offcanvas Information Section Description', 'kirki'),
                'panel' => 'exdos_kirki_panel',
                'priority' => 160,
            ]
        );

        if (class_exists('Kirki\Field')) {

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_offcanvas_information_label',
                    'label' => esc_html__('Offcanvas Information Text', 'kirki'),
                    'section' => 'exdos_offcanvas_information_section',
                    'default' => esc_html__('Information', 'kirki'),
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_offcanvas_phone_number',
                    'label' => esc_html__('Offcanvas Phone Number', 'kirki'),
                    'section' => 'exdos_offcanvas_information_section',
                    'default' => esc_html__('02 (256) 256 025', 'kirki'),
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_offcanvas_email',
                    'label' => esc_html__('Offcanvas Email', 'kirki'),
                    'section' => 'exdos_offcanvas_information_section',
                    'default' => esc_html__('info@exdos.com', 'kirki'),
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_offcanvas_location',
                    'label' => esc_html__('Offcanvas Location', 'kirki'),
                    'section' => 'exdos_offcanvas_information_section',
                    'default' => esc_html__('Avenue de Roma 158b, Lisboa', 'kirki'),
                ]
            );
        }
    }
}

exdos_offcanvas_information_section();

function exdos_offcanvas_follow_us_section()
{
    if (class_exists('Kirki\Section')) {
        new \Kirki\Section(
            'exdos_offcanvas_follow_us_section',
            [
                'title' => esc_html__('Exdos Offcanvas Follow Us Section', 'kirki'),
                'description' => esc_html__('Exdos Offcanvas Follow Us Section Description', 'kirki'),
                'panel' => 'exdos_kirki_panel',
                'priority' => 160,
            ]
        );

        if (class_exists('Kirki\Field')) {

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_offcanvas_follow_us',
                    'label' => esc_html__('Offcanvas Follow Us Text', 'kirki'),
                    'section' => 'exdos_offcanvas_follow_us_section',
                    'default' => esc_html__('Follow Us', 'kirki'),
                ]
            );

            new \Kirki\Field\URL(
                [
                    'settings' => 'exdos_offcanvas_facebook',
                    'label' => esc_html__('Facebook URL', 'kirki'),
                    'section' => 'exdos_offcanvas_follow_us_section',
                    'default' => 'https://www.facebook.com/',
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\URL(
                [
                    'settings' => 'exdos_offcanvas_instagram',
                    'label' => esc_html__('Instagram URL', 'kirki'),
                    'section' => 'exdos_offcanvas_follow_us_section',
                    'default' => 'https://www.instagram.com/',
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\URL(
                [
                    'settings' => 'exdos_offcanvas_linkedin',
                    'label' => esc_html__('LinkedIn URL', 'kirki'),
                    'section' => 'exdos_offcanvas_follow_us_section',
                    'default' => 'https://www.linkedin.com/',
                    'priority' => 10,
                ]
            );

            new \Kirki\Field\URL(
                [
                    'settings' => 'exdos_offcanvas_twitter',
                    'label' => esc_html__('Twitter URL', 'kirki'),
                    'section' => 'exdos_offcanvas_follow_us_section',
                    'default' => 'https://twitter.com/',
                    'priority' => 10,
                ]
            );
        }
    }
}

exdos_offcanvas_follow_us_section();


function exdos_search_section()
{
    if (class_exists('Kirki\Section')) {
        new \Kirki\Section(
            'exdos_search_section',
            [
                'title' => esc_html__('Exdos Search Section', 'kirki'),
                'description' => esc_html__('Exdos Search Section Description', 'kirki'),
                'panel' => 'exdos_kirki_panel',
                'priority' => 160,
            ]
        );

        if (class_exists('Kirki\Field')) {
            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_search_text',
                    'label' => esc_html__('Search Text', 'kirki'),
                    'section' => 'exdos_search_section',
                    'default' => esc_html__('What are you looking for?', 'kirki'),
                ]
            );

            new \Kirki\Field\Text(
                [
                    'settings' => 'exdos_search_placeholder',
                    'label' => esc_html__('Search Placeholder Text', 'kirki'),
                    'section' => 'exdos_search_section',
                    'default' => esc_html__('Email here', 'kirki'),
                ]
            );


        }
    }
}

exdos_search_section();


function exdos_breadcrumb_section()
{
    if (class_exists('Kirki\Section')) {
        new \Kirki\Section(
            'exdos_breadcrumb_section',
            [
                'title' => esc_html__('Exdos Breadcrumb Section', 'kirki'),
                'description' => esc_html__('Exdos Breadcrumb Section Description', 'kirki'),
                'panel' => 'exdos_kirki_panel',
                'priority' => 160,
            ]
        );

        if (class_exists('Kirki\Field')) {

            new \Kirki\Field\Image(
                [
                    'settings' => 'exdos_breadcrumb_image',
                    'label' => esc_html__('Breadcrumb Image', 'kirki'),
                    'section' => 'exdos_breadcrumb_section',
                    'default' => '',
                ]
            );

        }
    }
}

exdos_breadcrumb_section();