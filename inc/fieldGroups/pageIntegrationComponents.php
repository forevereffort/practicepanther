<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageIntegrationComponents',
        'title' => 'Page Integration Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageIntegrationComponents',
                'label' => 'Page Integration Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\SoftwareHeroSection\getACFLayout(),
                    Components\IntegrationListSection\getACFLayout(),
                    Components\YoutubeVideoSection\getACFLayout(),
                    Components\ContactFormSection\getACFLayout(),
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
                    'value' => 'page-templates/page-integration.php'
                ]
            ]
        ]
    ]);
});
