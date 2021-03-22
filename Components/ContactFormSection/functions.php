<?php

namespace Flynt\Components\ContactFormSection;

function getACFLayout()
{
    return [
        'name' => 'contactFormSection',
        'label' => 'Contact Form Section',
        'sub_fields' => [
            [
                'label' => 'Is Gray Background?',
                'name' => 'is_gray_background',
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
