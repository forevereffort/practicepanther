<?php

namespace Flynt\Components\SoftwareHeroSection;

function getACFLayout()
{
    return [
        'name' => 'softwareHeroSection',
        'label' => 'Software: Hero Section',
        'sub_fields' => [
            [
                'label' => 'Is The Space of Top Bottom Space Wide?',
                'name' => 'is_wide_space',
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
            ],
            [
                'label' => 'Hide Image On Mobile',
                'name' => 'hide_image_on_mobile',
                'type' => 'true_false',
            ],
            [
                'label' => 'Image',
                'name' => 'image',
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
                'label' => 'Retina Image',
                'name' => 'retina_image',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => '',
                'max_size' => 4,
                'mime_types' => 'gif,jpg,jpeg,png',
                'wrapper' => [
                    'width' => '50'
                ]
            ],
        ]
    ];
}
