<?php

namespace Flynt\Components\PaymentTableSection;

use Flynt\Utils\Asset;

add_filter('Flynt/addComponentData?name=PaymentTableSection', function ($data) {
    $data['panther_payments_image'] = [
        'src' => Asset::requireUrl('Components/PaymentTableSection/Assets/panther-payments.png'),
        'alt' => 'panther-payments'
    ];

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'paymentTableSection',
        'label' => 'Payment: Table Section',
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
                            ]
                        ],
                    ],
                    [
                        'label' => 'Other Legal Processors',
                        'name' => 'other_legal_processors',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => [
                            [
                                'label' => 'Type',
                                'name' => 'type',
                                'type' => 'select',
                                'choices' => [
                                    'text' => 'Text',
                                    'yes' => 'Yes',
                                    'no' => 'No',
                                ],
                                'default_value' => [
                                    0 => 'text',
                                ],
                            ],
                            [
                                'label' => 'Info',
                                'name' => 'info',
                                'type' => 'text',
                            ]
                        ],
                    ],
                    [
                        'label' => 'Panther Payments',
                        'name' => 'panther_payments',
                        'type' => 'group',
                        'layout' => 'block',
                        'sub_fields' => [
                            [
                                'label' => 'Type',
                                'name' => 'type',
                                'type' => 'select',
                                'choices' => [
                                    'text' => 'Text',
                                    'yes' => 'Yes',
                                    'no' => 'No',
                                ],
                                'default_value' => [
                                    0 => 'text',
                                ],
                            ],
                            [
                                'label' => 'Info',
                                'name' => 'info',
                                'type' => 'text',
                            ]
                        ],
                    ],
                ],
            ]
        ]
    ];
}
