<?php

namespace Flynt\Components\TeamMembersSection;

function getACFLayout()
{
    return [
        'name' => 'teamMembersSection',
        'label' => 'Team Members Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
            ],
            [
                'label' => 'Team Members',
                'name' => 'team',
                'type' => 'repeater',
                'layout' => 'table',
                'button_label' => 'Add team member',
                'sub_fields' => [
                    [
                        'label' => 'Team Member',
                        'name' => 'team_member',
                        'type' => 'post_object',
                        'post_type' => 'team',
                        'return_format' => 'object',
                        'ui' => 1,
                    ]
                ]
            ]
        ]
    ];
}
