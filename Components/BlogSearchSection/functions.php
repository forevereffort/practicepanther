<?php

namespace Flynt\Components\BlogSearchSection;

use Timber;

// add_image_size('blog_700_300', 700, 300, true);
// add_image_size('blog_100_150', 100, 150, true);

add_filter('Flynt/addComponentData?name=BlogSearchSection', function ($data) {
    $data['blogs'] = [];
    $data['is_mobile'] = wp_is_mobile();

    for ($i = 1; $i <= 4; $i++) {
        $data['blogs'][] = $data['post_' . $i];
    }

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'BlogSearchSection',
        'label' => 'Blog Search Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '',
            ],
            [
                'label' => 'Buttons',
                'name' => 'buttons',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Button',
                'sub_fields' => [
                    [
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'label' => 'Link Url',
                        'name' => 'link_url',
                        'type' => 'text',
                    ],
                ]
            ],
            [
                'label' => 'Post 1',
                'name' => 'post_1',
                'type' => 'post_object',
                'post_type' => [
                    0 => 'post',
                ],
                'return_format' => 'object',
                'ui' => 1,
            ],
            [
                'label' => 'Post 2',
                'name' => 'post_2',
                'type' => 'post_object',
                'post_type' => [
                    0 => 'post',
                ],
                'return_format' => 'object',
                'ui' => 1,
            ],
            [
                'label' => 'Post 3',
                'name' => 'post_3',
                'type' => 'post_object',
                'post_type' => [
                    0 => 'post',
                ],
                'return_format' => 'object',
                'ui' => 1,
            ],
            [
                'label' => 'Post 4',
                'name' => 'post_4',
                'type' => 'post_object',
                'post_type' => [
                    0 => 'post',
                ],
                'return_format' => 'object',
                'ui' => 1,
            ],
        ]
    ];
}
