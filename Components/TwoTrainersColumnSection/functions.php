<?php

namespace Flynt\Components\TwoTrainersColumnSection;

add_filter('Flynt/addComponentData?name=TwoTrainersColumnSection', function ($data) {
    $data['is_mobile'] = wp_is_mobile();

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'twoTrainersColumnSection',
        'label' => 'Two Trainers Column Section',
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
                'label' => 'Trainers',
                'name' => 'trainers',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add Trainer',
                'sub_fields' => [
                    [
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'instructions' => '',
                        'max_size' => 4,
                        'mime_types' => 'gif,jpg,jpeg,png',
                        'wrapper' => [
                            'width' => '15'
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
                            'width' => '15'
                        ]
                    ],
                    [
                        'label' => 'Train Time',
                        'name' => 'train_time',
                        'type' => 'text',
                        'wrapper' => [
                            'width' => '10'
                        ]
                    ],
                    [
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                    ],
                    [
                        'label' => 'Excerpt',
                        'name' => 'excerpt',
                        'type' => 'textarea',
                        'rows' => 3,
                        'wrapper' => [
                            'width' => '30'
                        ]
                    ],
                    [
                        'label' => 'Link Url',
                        'name' => 'link_url',
                        'type' => 'text',
                    ],
                ]
            ]
        ]
    ];
}
