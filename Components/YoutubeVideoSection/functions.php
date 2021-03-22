<?php

namespace Flynt\Components\YoutubeVideoSection;

function getACFLayout()
{
    return [
        'name' => 'youtubeVideoSection',
        'label' => 'Youtube Video Section',
        'sub_fields' => [
            [
                'label' => 'Is Gray Background?',
                'name' => 'is_gray_background',
                'type' => 'true_false',
            ],
            [
                'label' => 'Retina Image',
                'name' => 'image',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => '',
                'max_size' => 4,
                'mime_types' => 'gif,jpg,jpeg,png'
            ],
            [
                'label' => 'Retina Logo',
                'name' => 'logo',
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
            [
                'label' => 'Video URL',
                'name' => 'video_url',
                'type' => 'text',
                'default_value' => '',
            ]
        ]
    ];
}
