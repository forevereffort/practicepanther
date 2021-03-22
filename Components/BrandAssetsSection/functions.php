<?php

namespace Flynt\Components\BrandAssetsSection;

function getACFLayout()
{
    return [
        'name' => 'brandAssetsSection',
        'label' => 'Brand Assets Section',
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
            [
                'label' => 'Download Button Title',
                'name' => 'download_button_title',
                'type' => 'text',
                'default_value' => 'Download Brand Kit',
            ],
            [
                'label' => 'Download Button Link',
                'name' => 'download_button_link',
                'type' => 'text',
                'default_value' => '',
            ]
        ]
    ];
}
