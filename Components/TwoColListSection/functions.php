<?php

namespace Flynt\Components\TwoColListSection;

function getACFLayout()
{
    return [
        'name' => 'twoColListSection',
        'label' => 'Two Col List Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text'
            ],
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
                        'preview_size' => 'full',
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
            ]
        ]
    ];
}
