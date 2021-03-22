<?php

namespace Flynt\Components\TestimonialHeroSection;

use Flynt\Utils\Asset;

add_filter('Flynt/addComponentData?name=TestimonialHeroSection', function ($data) {
    $data['desktop_background_image'] = [
        'src' => Asset::requireUrl('Components/TestimonialHeroSection/Assets/testimonial-hero-desktop-bkg.svg')
    ];

    $data['mobile_background_image'] = [
        'src' => Asset::requireUrl('Components/TestimonialHeroSection/Assets/testimonial-hero-mobile-bkg.svg')
    ];

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'testimonialHeroSection',
        'label' => 'Testimonial: Hero Section',
        'sub_fields' => [
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
            [
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => '',
                'max_size' => 4,
                'mime_types' => 'gif,jpg,jpeg,png'
            ],
        ]
    ];
}
