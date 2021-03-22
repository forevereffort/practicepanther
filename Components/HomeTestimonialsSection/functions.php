<?php

namespace Flynt\Components\HomeTestimonialsSection;

add_image_size('avatar_52_52', 52, 52, true);
add_image_size('avatar_140_140', 140, 140, true);

add_filter('Flynt/addComponentData?name=HomeTestimonialsSection', function ($data) {
    $testimonials = [];

    for ($i = 1; $i <= 3; $i++) {
        $post_id = $data['testimonial_' . $i]->ID;

        $testimonials[] = [
            'title' => $data['testimonial_' . $i]->title,
            'user_avatar' => get_field('user_avatar', $post_id),
            'role' => get_field('role', $post_id),
            'company_logo' => get_field('company_logo', $post_id),
            'content' => get_field('content', $post_id),
        ];
    }

    $data['testimonials'] = $testimonials;

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'HomeTestimonialsSection',
        'label' => 'Home: Testimonials Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'wrapper' => [
                    'class' => 'autosize',
                ]
            ],
            [
                'label' => 'Testimonial 1',
                'name' => 'testimonial_1',
                'type' => 'post_object',
                'post_type' => array(
                    0 => 'testimonial',
                ),
                'return_format' => 'object',
                'ui' => 1,
            ],
            [
                'label' => 'Testimonial 2',
                'name' => 'testimonial_2',
                'type' => 'post_object',
                'post_type' => array(
                    0 => 'testimonial',
                ),
                'return_format' => 'object',
                'ui' => 1,
            ],
            [
                'label' => 'Testimonial 3',
                'name' => 'testimonial_3',
                'type' => 'post_object',
                'post_type' => array(
                    0 => 'testimonial',
                ),
                'return_format' => 'object',
                'ui' => 1,
            ],
            [
                'label' => 'Link Title',
                'name' => 'link_title',
                'type' => 'text',
                'default_value' => 'See more Testimonials',
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
