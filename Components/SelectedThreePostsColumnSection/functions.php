<?php

namespace Flynt\Components\SelectedThreePostsColumnSection;

use Timber;

add_image_size('blog_400_200', 400, 200, true);

add_filter('Flynt/addComponentData?name=SelectedThreePostsColumnSection', function ($data) {
    $data['blogs'] = [];

    for ($i = 1; $i <= 3; $i++) {
        $data['blogs'][] = $data['post_' . $i];
    }

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'selectedThreePostsColumnSection',
        'label' => 'Selected Three Posts Column Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '',
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
                'label' => 'Link Title',
                'name' => 'link_title',
                'type' => 'text',
                'default_value' => 'See more blog posts',
            ],
            [
                'label' => 'Link URL',
                'name' => 'link_url',
                'type' => 'text',
                'default_value' => '',
            ]
        ]
    ];
}
