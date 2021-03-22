<?php

namespace Flynt\Components\BlockImageText;

function getACFLayout()
{
    return [
        'name' => 'blockImageText',
        'label' => 'Block: Image & Text',
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
                'mime_types' => 'gif,jpg,jpeg,png'
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
        ]
    ];
}
