<?php

namespace Flynt\Components\ThreeColContactInfoSection;

function getACFLayout()
{
    return [
        'name' => 'threeColContactInfoSection',
        'label' => 'Three Col Contact Info Section',
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
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text'
            ],
            [
                'label' => 'Icon 1',
                'name' => 'icon_1',
                'type' => 'image',
                'wrapper' => [
                    'width' => '30'
                ]
            ],
            [
                'label' => 'Content 1',
                'name' => 'content_1',
                'type' => 'text',
                'wrapper' => [
                    'class' => 'autosize',
                    'width' => '70'
                ]
            ],
            [
                'label' => 'Icon 2',
                'name' => 'icon_2',
                'type' => 'image',
                'wrapper' => [
                    'width' => '30',
                ]
            ],
            [
                'label' => 'Content 2',
                'name' => 'content_2',
                'type' => 'text',
                'wrapper' => [
                    'class' => 'autosize',
                    'width' => '70'
                ],
            ],
            [
                'label' => 'Icon 3',
                'name' => 'icon_3',
                'type' => 'image',
                'wrapper' => [
                    'width' => '30'
                ]
            ],
            [
                'label' => 'Content 3',
                'name' => 'content_3',
                'type' => 'text',
                'wrapper' => [
                    'class' => 'autosize',
                    'width' => '70'
                ],
            ],
        ]
    ];
}
