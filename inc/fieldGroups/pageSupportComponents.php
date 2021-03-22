<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageSupportComponents',
        'title' => 'Page Support Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageSupportComponents',
                'label' => 'Page Support Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\HelpHeroSection\getACFLayout(),
                    Components\ThreeExternalLinkColumnSection\getACFLayout(),
                    Components\ThreeVideosColumnSection\getACFLayout(),
                    Components\BlockFullImageTitle\getACFLayout(),
                    Components\TwoTrainersColumnSection\getACFLayout(),
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
                    'value' => 'page-templates/page-support.php'
                ]
            ]
        ]
    ]);
});
