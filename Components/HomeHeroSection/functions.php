<?php

namespace Flynt\Components\HomeHeroSection;

function getACFLayout()
{
    return [
        'name' => 'homeHeroSection',
        'label' => 'Home: Hero Section',
        'sub_fields' => [
            [
                'label' => 'Is Wide Title',
                'name' => 'is_wide_title',
                'type' => 'true_false',
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
            ],
            [
                'label' => 'Gravity From Shortcode',
                'name' => 'gravity_grom_shortcode',
                'type' => 'text',
                'default_value' => '',
            ]
        ]
    ];
}
