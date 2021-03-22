<?php

namespace Flynt\Components\OurPlansSection;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'ourPlansSection',
        'label' => 'Our Plans Section',
        'sub_fields' => [
            [
                'label' => 'Is Gray Background?',
                'name' => 'is_gray_background',
                'type' => 'true_false',
            ],
            [
                'label' => 'Section Title',
                'name' => 'section_title',
                'type' => 'text',
            ],
            [
                'label' => 'Plans',
                'name' => 'plans',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Plan',
                'sub_fields' => [
                    [
                        'label' => 'Icon',
                        'name' => 'icon',
                        'type' => 'image',
                        'preview_size' => 'full',
                    ],
                    [
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'text',
                    ],
                ]
            ],
            [
                'label' => 'Link Title',
                'name' => 'link_title',
                'type' => 'text',
                'default_value' => '',
            ],
            [
                'label' => 'Link URL',
                'name' => 'link_url',
                'type' => 'text',
                'default_value' => '',
            ],
        ]
    ];
}
