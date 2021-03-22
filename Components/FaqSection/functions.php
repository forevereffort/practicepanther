<?php

namespace Flynt\Components\FaqSection;

use Flynt\FieldVariables;

function getACFLayout()
{
    return [
        'name' => 'faqSection',
        'label' => 'FAQ Section',
        'sub_fields' => [
            [
                'label' => 'Is Small Width',
                'name' => 'is_small_width',
                'type' => 'true_false',
            ],
            [
                'label' => 'Section Title',
                'name' => 'section_title',
                'type' => 'text',
                'default_value' => 'Frequently Asked Questions',
            ],
            [
                'label' => 'FAQs',
                'name' => 'faqs',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add FAQ',
                'layout' => 'row',
                'sub_fields' => [
                    [
                        'label' => 'Question',
                        'name' => 'question',
                        'type' => 'text',
                    ],
                    [
                        'label' => 'Answer',
                        'name' => 'answer',
                        'type' => 'wysiwyg',
                        'delay' => 1,
                        'media_upload' => 0,
                        'wrapper' => [
                            'class' => 'autosize',
                        ],
                        'toolbar' => 'basic',
                    ]
                ]
            ]
        ]
    ];
}
