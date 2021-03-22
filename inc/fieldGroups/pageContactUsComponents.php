<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageContactUsComponents',
        'title' => 'Page Contact Us Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageContactUsComponents',
                'label' => 'Page Contact Us Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\ContactUsHeroSection\getACFLayout(),
                    Components\ContactFormSection\getACFLayout(),
                    Components\ThreeColContactInfoSection\getACFLayout(),
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
                    'value' => 'page-templates/page-contact-us.php'
                ]
            ]
        ]
    ]);
});
