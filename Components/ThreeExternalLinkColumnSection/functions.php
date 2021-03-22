<?php

namespace Flynt\Components\ThreeExternalLinkColumnSection;

function getACFLayout()
{
    return [
        'name' => 'threeExternalLinkColumnSection',
        'label' => 'Three External Link Column Section',
        'sub_fields' => [
            [
                'label' => 'Items',
                'name' => 'items',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Item',
                'sub_fields' => [
                    [
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'instructions' => '',
                        'max_size' => 4,
                        'mime_types' => 'gif,jpg,jpeg,png',
                        'wrapper' => [
                            'width' => '20'
                        ]
                    ],
                    [
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'label' => 'Excerpt',
                        'name' => 'excerpt',
                        'type' => 'textarea',
                        'rows' => 3,
                    ],
                    [
                        'label' => 'Link Url',
                        'name' => 'link_url',
                        'type' => 'text',
                    ],
                ]
            ]
        ]
    ];
}
