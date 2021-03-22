<?php

namespace Flynt\Components\BlockImage3ColText;

function getACFLayout()
{
    return [
        'name' => 'blockImage3ColText',
        'label' => 'Block: Image & 3 Columns Text',
        'sub_fields' => [
            [
                'label' => 'Is Gray Background?',
                'name' => 'is_gray_background',
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
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'wrapper' => [
                    'class' => 'autosize',
                ],
            ],
            [
                'label' => 'Hide Content Row',
                'name' => 'hide_content_row',
                'type' => 'true_false',
            ],
            [
                'label' => 'Contents',
                'name' => 'contents',
                'type' => 'group',
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'label' => 'Column 1',
                        'name' => 'column_1',
                        'type' => 'wysiwyg',
                        'delay' => 1,
                        'media_upload' => 0,
                        'wrapper' => [
                            'class' => 'autosize',
                        ],
                    ],
                    [
                        'label' => 'Column 2',
                        'name' => 'column_2',
                        'type' => 'wysiwyg',
                        'delay' => 1,
                        'media_upload' => 0,
                        'wrapper' => [
                            'class' => 'autosize',
                        ],
                    ],
                    [
                        'label' => 'Column 3',
                        'name' => 'column_3',
                        'type' => 'wysiwyg',
                        'delay' => 1,
                        'media_upload' => 0,
                        'wrapper' => [
                            'class' => 'autosize',
                        ],
                    ],
                ],
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
