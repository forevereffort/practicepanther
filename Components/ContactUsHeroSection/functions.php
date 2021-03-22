<?php

namespace Flynt\Components\ContactUsHeroSection;

function getACFLayout()
{
    return [
        'name' => 'contactUsHeroSection',
        'label' => 'Contact Us:Hero Section',
        'sub_fields' => [
            [
                'label' => 'Desktop Background Image',
                'name' => 'desktop_background_image',
                'type' => 'image',
                'preview_size' => 'medium',
                'wrapper' => [
                    'width' => '50'
                ]
            ],
            [
                'label' => 'Mobile Background Image',
                'name' => 'mobile_background_image',
                'type' => 'image',
                'preview_size' => 'medium',
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
