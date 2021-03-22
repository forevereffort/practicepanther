<?php

namespace Flynt\Components\QuestionAnswerSection;

function getACFLayout()
{
    return [
        'name' => 'questionAnswerSection',
        'label' => 'Question Answer Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'label' => 'Category List',
                'name' => 'category_list',
                'type' => 'flexible_content',
                'layouts' => [
                    [
                        'name' => 'question_answer',
                        'label' => 'Question & Answer',
                        'display' => 'block',
                        'sub_fields' => [
                            [
                                'label' => 'Category Name',
                                'name' => 'category_name',
                                'type' => 'text',
                            ],
                            [
                                'label' => 'Rows',
                                'name' => 'rows',
                                'type' => 'repeater',
                                'layout' => 'row',
                                'button_label' => 'Add New Row',
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
                    ]
                ],
                'button_label' => 'Add New Category',
            ]
        ]
    ];
}
