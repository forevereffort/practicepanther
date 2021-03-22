<?php

namespace Flynt\Components\PriceTableSection;

function getACFLayout()
{
    return [
        'name' => 'priceTableSection',
        'label' => 'Price: Table Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'label' => 'Header',
                'name' => 'header',
                'type' => 'group',
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'label' => 'Save (By using Annually)',
                        'name' => 'save',
                        'type' => 'text',
                        'wrapper' => array(
                            'width' => '12',
                        ),
                    ],
                    [
                        'label' => 'Solo Price',
                        'name' => 'solo_price',
                        'type' => 'group',
                        'layout' => 'row',
                        'sub_fields' => [
                            [
                                'label' => 'Monthly',
                                'name' => 'monthly',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Annually',
                                'name' => 'annually',
                                'type' => 'text',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Essential Price',
                        'name' => 'essential_price',
                        'type' => 'group',
                        'layout' => 'row',
                        'sub_fields' => [
                            [
                                'label' => 'Monthly',
                                'name' => 'monthly',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Annually',
                                'name' => 'annually',
                                'type' => 'text',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Business Price',
                        'name' => 'business_price',
                        'type' => 'group',
                        'layout' => 'row',
                        'sub_fields' => [
                            [
                                'label' => 'Monthly',
                                'name' => 'monthly',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Annually',
                                'name' => 'annually',
                                'type' => 'text',
                            ],
                        ],
                    ]
                ]
            ],
            [
                'label' => 'Table List',
                'name' => 'table_list',
                'type' => 'flexible_content',
                'layouts' => [
                    [
                        'name' => 'check_type',
                        'label' => 'Check Type',
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'label' => 'Title',
                                'name' => 'title',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Rows',
                                'name' => 'rows',
                                'type' => 'repeater',
                                'layout' => 'table',
                                'button_label' => 'Add New Row',
                                'sub_fields' => [
                                    [
                                        'label' => 'Title',
                                        'name' => 'title',
                                        'type' => 'text',
                                    ],
                                    [
                                        'label' => 'Content',
                                        'name' => 'content',
                                        'type' => 'textarea',
                                        'rows' => 3,
                                    ],
                                    [
                                        'label' => 'Solo',
                                        'name' => 'solo',
                                        'type' => 'true_false',
                                        'wrapper' => array(
                                            'width' => '5',
                                        ),
                                    ],
                                    [
                                        'label' => 'Essential',
                                        'name' => 'essential',
                                        'type' => 'true_false',
                                        'wrapper' => array(
                                            'width' => '5',
                                        ),
                                    ],
                                    [
                                        'label' => 'Business',
                                        'name' => 'business',
                                        'type' => 'true_false',
                                        'wrapper' => array(
                                            'width' => '5',
                                        ),
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'content_type',
                        'label' => 'Content Type',
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'label' => 'Title',
                                'name' => 'title',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Rows',
                                'name' => 'rows',
                                'type' => 'repeater',
                                'layout' => 'table',
                                'button_label' => 'Add New Row',
                                'sub_fields' => [
                                    [
                                        'label' => 'Title',
                                        'name' => 'title',
                                        'type' => 'group',
                                        'layout' => 'block',
                                        'sub_fields' => [
                                            [
                                                'label' => 'Info',
                                                'name' => 'info',
                                                'type' => 'text',
                                            ],
                                            [
                                                'label' => 'Content',
                                                'name' => 'content',
                                                'type' => 'textarea',
                                                'rows' => 4,
                                            ],
                                        ],
                                    ],
                                    [
                                        'label' => 'Solo',
                                        'name' => 'solo',
                                        'type' => 'group',
                                        'layout' => 'block',
                                        'sub_fields' => [
                                            [
                                                'label' => 'Info',
                                                'name' => 'info',
                                                'type' => 'text',
                                            ],
                                            [
                                                'label' => 'Content',
                                                'name' => 'content',
                                                'type' => 'textarea',
                                                'rows' => 4,
                                            ],
                                        ],
                                    ],
                                    [
                                        'label' => 'Essential',
                                        'name' => 'essential',
                                        'type' => 'group',
                                        'layout' => 'block',
                                        'sub_fields' => [
                                            [
                                                'label' => 'Info',
                                                'name' => 'info',
                                                'type' => 'text',
                                            ],
                                            [
                                                'label' => 'Content',
                                                'name' => 'content',
                                                'type' => 'textarea',
                                                'rows' => 4,
                                            ],
                                        ],
                                    ],
                                    [
                                        'label' => 'Business',
                                        'name' => 'business',
                                        'type' => 'group',
                                        'layout' => 'block',
                                        'sub_fields' => [
                                            [
                                                'label' => 'Info',
                                                'name' => 'info',
                                                'type' => 'text',
                                            ],
                                            [
                                                'label' => 'Content',
                                                'name' => 'content',
                                                'type' => 'textarea',
                                                'rows' => 4,
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ]
                ],
                'button_label' => 'Add New Table',
            ]
        ]
    ];
}
