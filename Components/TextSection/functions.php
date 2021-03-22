<?php

namespace Flynt\Components\TextSection;

function getACFLayout()
{
    return [
        'name' => 'textSection',
        'label' => 'Text Section',
        'sub_fields' => [
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
