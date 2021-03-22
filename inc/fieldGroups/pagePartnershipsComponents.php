<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pagePartnershipsComponents',
        'title' => 'Page Partnerships Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pagePartnershipsComponents',
                'label' => 'Page Partnerships Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\SoftwareHeroSection\getACFLayout(),
                    Components\BlockFitImageTitle\getACFLayout(),
                    Components\YoutubeVideoSection\getACFLayout(),
                    Components\FaqSection\getACFLayout(),
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
                    'value' => 'page-templates/page-partnerships.php'
                ]
            ]
        ]
    ]);
});
