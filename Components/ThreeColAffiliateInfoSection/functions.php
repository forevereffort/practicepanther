<?php

namespace Flynt\Components\ThreeColAffiliateInfoSection;

function getACFLayout()
{
    return [
        'name' => 'threeColAffiliateInfoSection',
        'label' => 'Three Col Affiliate Info Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text'
            ],
            [
                'label' => 'Icon 1',
                'name' => 'icon_1',
                'type' => 'image',
                'wrapper' => [
                    'width' => '30'
                ]
            ],
            [
                'label' => 'Content 1',
                'name' => 'content_1',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'wrapper' => [
                    'class' => 'autosize',
                    'width' => '70'
                ]
            ],
            [
                'label' => 'Icon 2',
                'name' => 'icon_2',
                'type' => 'image',
                'wrapper' => [
                    'width' => '30',
                ]
            ],
            [
                'label' => 'Content 2',
                'name' => 'content_2',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'wrapper' => [
                    'class' => 'autosize',
                    'width' => '70'
                ],
            ],
            [
                'label' => 'Icon 3',
                'name' => 'icon_3',
                'type' => 'image',
                'wrapper' => [
                    'width' => '30'
                ]
            ],
            [
                'label' => 'Content 3',
                'name' => 'content_3',
                'type' => 'wysiwyg',
                'delay' => 1,
                'media_upload' => 0,
                'wrapper' => [
                    'class' => 'autosize',
                    'width' => '70'
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
        ]
    ];
}
