<?php

namespace Flynt\Components\ThreeVideosColumnSection;

use Timber;

add_filter('Flynt/addComponentData?name=ThreeVideosColumnSection', function ($data) {
    $args = [
        'post_type' => 'video',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 3,
        'offset' => 0,
    ];

    $data['videos'] = Timber::get_posts($args);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'threeVideosColumnSection',
        'label' => 'Three Videos Column Section',
        'sub_fields' => [
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
                'label' => 'Link Title',
                'name' => 'link_title',
                'type' => 'text',
                'default_value' => 'See all',
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
