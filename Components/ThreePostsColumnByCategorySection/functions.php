<?php

namespace Flynt\Components\ThreePostsColumnByCategorySection;

use Timber;

// add_image_size('blog_400_200', 400, 200, true);

add_filter('Flynt/addComponentData?name=ThreePostsColumnByCategorySection', function ($data) {
    $args = [
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 3,
        'offset' => 0,
        'cat' =>  $data['post_category']->id,
    ];

    $data['blogs'] = Timber::get_posts($args);

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'threePostsColumnByCategorySection',
        'label' => 'Three Posts Column By Category Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '',
            ],
            [
                'label' => 'Post Category',
                'name' => 'post_category',
                'type' => 'taxonomy',
                'taxonomy' => 'category',
                'field_type' => 'select',
                'return_format' => 'object',
            ],
            [
                'label' => 'Desktop Link Title',
                'name' => 'desktop_link_title',
                'type' => 'text',
                'default_value' => 'See all',
            ],
            [
                'label' => 'Mobile Link Title',
                'name' => 'mobile_link_title',
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
