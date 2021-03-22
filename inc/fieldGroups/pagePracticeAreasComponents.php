<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pagePracticeAreasComponents',
        'title' => 'Page Practice Areas Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pagePracticeAreasComponents',
                'label' => 'Page Practice Areas Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\SoftwareHeroSection\getACFLayout(),
                    Components\AllPracticeAreaSection\getACFLayout(),
                    Components\BlockFullImageTitle\getACFLayout(),
                    Components\HomeStartTrialSection\getACFLayout(),
                    Components\TextSection\getACFLayout(),
                ]
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/page-practice-areas.php'
                ]
            ]
        ]
    ]);
});
