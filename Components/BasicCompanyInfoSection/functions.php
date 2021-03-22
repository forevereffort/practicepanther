<?php

namespace Flynt\Components\BasicCompanyInfoSection;

function getACFLayout()
{
    return [
        'name' => 'basicCompanyInfoSection',
        'label' => 'Basic Company Info Section',
        'sub_fields' => [
            [
                'label' => 'Section Title',
                'name' => 'section_title',
                'type' => 'text',
            ],
            [
                'label' => 'Founded in Icon',
                'name' => 'founded_in_icon',
                'type' => 'image',
                'preview_size' => 'full',
                'wrapper' => [
                    'width' => '33'
                ]
            ],
            [
                'label' => 'Location Icon',
                'name' => 'location_icon',
                'type' => 'image',
                'preview_size' => 'full',
                'wrapper' => [
                    'width' => '33'
                ]
            ],
            [
                'label' => 'Contact Email Icon',
                'name' => 'contact_email_icon',
                'type' => 'image',
                'preview_size' => 'full',
                'wrapper' => [
                    'width' => '33'
                ]
            ],
            [
                'label' => 'Founded in',
                'name' => 'founded_in',
                'type' => 'text',
                'wrapper' => [
                    'width' => '33'
                ]
            ],
            [
                'label' => 'Location',
                'name' => 'location',
                'type' => 'text',
                'wrapper' => [
                    'width' => '33'
                ]
            ],
            [
                'label' => 'Contact Email',
                'name' => 'contact_email',
                'type' => 'text',
                'wrapper' => [
                    'width' => '33'
                ]
            ],
        ]
    ];
}
