<?php

namespace Flynt\Components\ThreeColNumberInfoSection;

function getACFLayout()
{
    return [
        'name' => 'threeColNumberInfoSection',
        'label' => 'Three Col Number Info Section',
        'sub_fields' => [
            [
                'label' => 'Col 1 Title',
                'name' => 'col_1_title',
                'type' => 'text',
                'wrapper' => [
                    'width' => '33.33333'
                ]
            ],
            [
                'label' => 'Col 1 Info',
                'name' => 'col_1_info',
                'type' => 'text',
                'wrapper' => [
                    'width' => '33.33333'
                ]
            ],
            [
                'label' => 'Remove br tag on mobile',
                'name' => 'col_1_br_hide',
                'type' => 'true_false',
                'wrapper' => [
                    'width' => '33.33333'
                ]
            ],
            [
                'label' => 'Col 2 Title',
                'name' => 'col_2_title',
                'type' => 'text',
                'wrapper' => [
                    'width' => '33.33333'
                ]
            ],
            [
                'label' => 'Col 2 Info',
                'name' => 'col_2_info',
                'type' => 'text',
                'wrapper' => [
                    'width' => '33.33333'
                ]
            ],
            [
                'label' => 'Remove br tag on mobile',
                'name' => 'col_2_br_hide',
                'type' => 'true_false',
                'wrapper' => [
                    'width' => '33.33333'
                ]
            ],
            [
                'label' => 'Col 3 Title',
                'name' => 'col_3_title',
                'type' => 'text',
                'wrapper' => [
                    'width' => '33.33333'
                ]
            ],
            [
                'label' => 'Col 3 Info',
                'name' => 'col_3_info',
                'type' => 'text',
                'wrapper' => [
                    'width' => '33.33333'
                ]
            ],
            [
                'label' => 'Remove br tag on mobile',
                'name' => 'col_3_br_hide',
                'type' => 'true_false',
                'wrapper' => [
                    'width' => '33.33333'
                ]
            ],
        ]
    ];
}
