<?php

namespace Flynt\Components\SingleTestimonialSection;

add_image_size('avatar_138_138', 138, 138, true);

add_filter('Flynt/addComponentData?name=SingleTestimonialSection', function ($data) {

    $post_id = $data['testimonial']->ID;

    $data['testimonial_data'] = [
        'title' => $data['testimonial']->title,
        'user_avatar' => get_field('user_avatar', $post_id),
        'role' => get_field('role', $post_id),
        'company_logo' => get_field('company_logo', $post_id),
        'content' => get_field('content', $post_id),
    ];

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'singleTestimonialSection',
        'label' => 'Single Testimonial Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'label' => 'Testimonial',
                'name' => 'testimonial',
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
