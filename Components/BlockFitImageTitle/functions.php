<?php

namespace Flynt\Components\BlockFitImageTitle;

function getACFLayout()
{
    return [
        'name' => 'blockFitImageTitle',
        'label' => 'Block: Fit Image & Title',
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
                'label' => 'Place Image Right?',
                'name' => 'place_image_right',
                'type' => 'true_false',
                'wrapper' => [
                    'width' => '20'
                ]
            ],
            [
                'label' => 'Image Align Edge',
                'name' => 'image_align_edge',
                'type' => 'true_false',
                'wrapper' => [
                    'width' => '20'
                ]
            ],
            [
                'label' => 'Reduce Top Space',
                'name' => 'reduce_top_space',
                'type' => 'true_false',
                'wrapper' => [
                    'width' => '20'
                ]
            ],
            [
                'label' => 'Reduce Bottom Space',
                'name' => 'reduce_bottom_space',
                'type' => 'true_false',
                'wrapper' => [
                    'width' => '20'
                ]
            ],
            [
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => '',
                'max_size' => 4,
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
                // 'media_upload' => 0,
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
