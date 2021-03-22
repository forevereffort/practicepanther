<?php

namespace Flynt\Components\HomeFeaturedSection;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'HomeFeaturedSection',
        'label' => 'Home: Featured Section',
        'sub_fields' => [
            [
                'label' => 'Only Display Logos?',
                'name' => 'only_display_logos',
                'type' => 'true_false',
                'default_value' => 0,
            ],
            [
                'label' => 'Section Title',
                'name' => 'section_title',
                'type' => 'text',
                'default_value' => 'Featured in',
            ],
            [
                'label' => 'Logo Setting',
                'name' => 'logo_setting',
                'type' => 'group',
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'label' => 'Desktop',
                        'name' => 'desktop',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Logos',
                                'name' => 'logos',
                                'type' => 'repeater',
                                'layout' => 'table',
                                'button_label' => 'Add Logo',
                                'sub_fields' => [
                                    [
                                        'label' => 'Retina Image',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'preview_size' => 'full',
                                    ],
                                    [
                                        'label' => 'Width (px)',
                                        'name' => 'width',
                                        'type' => 'text',
                                        'wrapper' => [
                                            'width' => '20',
                                        ]
                                    ],
                                ]
                            ]
                        ],
                    ],
                    [
                        'label' => 'Mobile',
                        'name' => 'mobile',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Logos',
                                'name' => 'logos',
                                'type' => 'repeater',
                                'layout' => 'table',
                                'button_label' => 'Add Logo',
                                'sub_fields' => [
                                    [
                                        'label' => 'Line Break?',
                                        'name' => 'line_break',
                                        'type' => 'true_false',
                                        'wrapper' => array(
                                            'width' => '15',
                                        ),
                                    ],
                                    [
                                        'label' => 'Retina Image',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'preview_size' => 'full',
                                    ],
                                    [
                                        'label' => 'Width (px)',
                                        'name' => 'width',
                                        'type' => 'text',
                                        'wrapper' => [
                                            'width' => '20',
                                        ]
                                    ],
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'label' => 'Video Overlay Image',
                'name' => 'video_overlay_image',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => '',
                'max_size' => 4,
                'mime_types' => 'gif,jpg,jpeg,png'
            ],
            [
                'label' => 'Video File',
                'name' => 'video_file',
                'type' => 'file',
                'library' => 'all',
            ]
        ]
    ];
}
