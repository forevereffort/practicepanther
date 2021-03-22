<?php

namespace Flynt\Components\ChoosePricePlanSection;

function getACFLayout()
{
    return [
        'name' => 'choosePricePlanSection',
        'label' => 'Price: Choose Price Plan Section',
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
                'label' => 'Save Amount',
                'name' => 'save_amount',
                'type' => 'text',
                'instructions' => 'By using Annually',
                'default_value' => '',
            ],
            [
                'label' => 'Plans',
                'name' => 'plans',
                'type' => 'group',
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'label' => 'Solo',
                        'name' => 'solo',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Monthly Price',
                                'name' => 'monthly_price',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Annually Price',
                                'name' => 'annually_price',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Features',
                                'name' => 'features',
                                'type' => 'wysiwyg',
                                'toolbar' => 'basic',
                                'media_upload' => 0,
                                'delay' => 1,
                            ],
                            [
                                'label' => 'Link',
                                'name' => 'link',
                                'type' => 'link',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Essential',
                        'name' => 'essential',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Monthly Price',
                                'name' => 'monthly_price',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Annually Price',
                                'name' => 'annually_price',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Features',
                                'name' => 'features',
                                'type' => 'wysiwyg',
                                'toolbar' => 'basic',
                                'media_upload' => 0,
                                'delay' => 1,
                            ],
                            [
                                'label' => 'Link',
                                'name' => 'link',
                                'type' => 'link',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Business',
                        'name' => 'business',
                        'type' => 'group',
                        'sub_fields' => [
                            [
                                'label' => 'Monthly Price',
                                'name' => 'monthly_price',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Annually Price',
                                'name' => 'annually_price',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Features',
                                'name' => 'features',
                                'type' => 'wysiwyg',
                                'toolbar' => 'basic',
                                'media_upload' => 0,
                                'delay' => 1,
                            ],
                            [
                                'label' => 'Link',
                                'name' => 'link',
                                'type' => 'link',
                            ],
                        ],
                    ],
                ],
            ],
        ]
    ];
}
