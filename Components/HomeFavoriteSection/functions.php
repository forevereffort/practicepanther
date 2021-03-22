<?php

namespace Flynt\Components\HomeFavoriteSection;

// add_filter('Flynt/addComponentData?name=HomeFavoriteSection', function ($data) {
//     $desktop_css = '';

//     if ( !empty($data['desktop_image']) ) {
//         $desktop_css = "style=\"background-image:url('{$data['desktop_image']}')\"";
//     }

//     $data['desktop_css'] = $desktop_css;

//     $mobile_css = '';

//     if ( !empty($data['mobile_image']) ) {
//         $mobile_css = "style=\"background-image:url('{$data['mobile_image']}')\"";
//     }

//     $data['mobile_css'] = $mobile_css;

//     return $data;
// });

function getACFLayout()
{
    return [
        'name' => 'homeFavoriteSection',
        'label' => 'Home: Favorite Section',
        'sub_fields' => [
            [
                'label' => 'Content',
                'name' => 'content',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'required' => true,
                'wrapper' => [
                    'class' => 'autosize',
                ],
            ],
            // [
            //     'label' => 'Desktop Image',
            //     'name' => 'desktop_image',
            //     'type' => 'image',
            //     'preview_size' => 'medium',
            //     'instructions' => '',
            //     'max_size' => 4,
            //     'mime_types' => 'gif,jpg,jpeg,png'
            // ],
            // [
            //     'label' => 'Mobile Image',
            //     'name' => 'mobile_image',
            //     'type' => 'image',
            //     'preview_size' => 'medium',
            //     'instructions' => '',
            //     'max_size' => 4,
            //     'mime_types' => 'gif,jpg,jpeg,png'
            // ],
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
