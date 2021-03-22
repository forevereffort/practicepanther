<?php

namespace Flynt\Components\HelpHeroSection;

function getACFLayout()
{
    return [
        'name' => 'helpHeroSection',
        'label' => 'Help Hero Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'wrapper' => [
                    'class' => 'autosize',
                ],
            ],
            [
                'label' => 'Desktop Background Image',
                'name' => 'desktop_background_image',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => '',
                'max_size' => 4,
                'mime_types' => 'gif,jpg,jpeg,png',
                'wrapper' => [
                    'width' => '50'
                ]
            ],
            [
                'label' => 'Mobile Background Image',
                'name' => 'mobile_background_image',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => '',
                'max_size' => 4,
                'mime_types' => 'gif,jpg,jpeg,png',
                'wrapper' => [
                    'width' => '50'
                ]
            ],
            [
                'label' => 'Buttons Group Title',
                'name' => 'buttons_group_title',
                'type' => 'text',
                'default_value' => '',
            ],
            [
                'label' => 'Buttons',
                'name' => 'buttons',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Button',
                'sub_fields' => [
                    [
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'label' => 'Link Url',
                        'name' => 'link_url',
                        'type' => 'text',
                    ],
                ]
            ],
        ]
    ];
}
