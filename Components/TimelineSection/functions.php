<?php

namespace Flynt\Components\TimelineSection;

function getACFLayout()
{
    return [
    'name' => 'timelineSection',
    'label' => 'Timeline Section',
    'sub_fields' => [
      [
        'label' => 'Title',
        'name' => 'title',
        'type' => 'text',
      ],
      [
        'label' => 'Milestones',
        'name' => 'milestones',
        'type' => 'repeater',
        'layout' => 'table',
        'button_label' => 'Add Milestone',
        'sub_fields' => [
            [
                'label' => 'Year',
                'name' => 'year',
                'type' => 'text',
            ],
            [
                'label' => 'Description',
                'name' => 'description',
                'type' => 'text',
            ],
        ]
      ],
    ]
    ];
}
