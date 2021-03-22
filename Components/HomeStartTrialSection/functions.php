<?php

namespace Flynt\Components\HomeStartTrialSection;

use Flynt\Utils\Asset;

add_filter('Flynt/addComponentData?name=HomeStartTrialSection', function ($data) {
    $data['image'] = [
        'src' => Asset::requireUrl('Components/HomeStartTrialSection/Assets/start-trial.svg'),
        'alt' => 'start free trial'
    ];

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'homeStartTrialSection',
        'label' => 'Home: Start Trial Section',
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
                'label' => 'Gravity From Shortcode',
                'name' => 'gravity_grom_shortcode',
                'type' => 'text',
                'default_value' => '',
            ]
        ]
    ];
}
