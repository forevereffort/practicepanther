<?php

namespace Flynt\Components\FirmHeroSection;

function getACFLayout()
{
    return [
        'name' => 'FirmHeroSection',
        'label' => 'Firm: Hero Section',
        'sub_fields' => [
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
                'label' => 'Content',
                'name' => 'content',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'wrapper' => [
                    'class' => 'autosize',
                ],
            ]
        ]
    ];
}
