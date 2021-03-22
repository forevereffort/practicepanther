<?php

namespace Flynt\Components\ThreePostsRowByCategorySection;

use Timber;

add_filter('Flynt/addComponentData?name=ThreePostsRowByCategorySection', function ($data) {
    $args = [
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 3,
        'offset' => 0,
        'cat' =>  $data['post_category']->id,
    ];

    $data['blogs'] = Timber::get_posts($args);
    $data['is_mobile'] = wp_is_mobile();

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'threePostsRowByCategorySection',
        'label' => 'Three Posts Row By Category Section',
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
                'label' => 'Banner AD',
                'name' => 'banner_ad',
                'type' => 'group',
                'layout' => 'table',
                'sub_fields' => [
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
                        'label' => 'Link URL',
                        'name' => 'link_url',
                        'type' => 'text',
                        'default_value' => '',
                    ]
                ]
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
