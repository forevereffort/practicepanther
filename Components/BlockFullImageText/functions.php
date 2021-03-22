<?php

namespace Flynt\Components\BlockFullImageText;

function getACFLayout()
{
    return [
        'name' => 'blockFullImageText',
        'label' => 'Block: Full Image & Text',
        'sub_fields' => [
            [
                'label' => 'Is Gray Background?',
                'name' => 'is_gray_background',
                'type' => 'true_false',
                'wrapper' => [
                    'width' => '20'
                ]
            ],
            [
                'label' => 'Mobile: Display title below image?',
                'name' => 'mobile_title_below_image',
                'type' => 'true_false',
                'default_value' => 0,
                'wrapper' => [
                    'width' => '80'
                ]
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
