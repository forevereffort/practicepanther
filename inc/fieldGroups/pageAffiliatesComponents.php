<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageAffiliatesComponents',
        'title' => 'Page Affiliates Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageAffiliatesComponents',
                'label' => 'Page Affiliates Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\AffiliateHeroSection\getACFLayout(),
                    Components\ThreeColNumberInfoSection\getACFLayout(),
                    Components\ThreeColAffiliateInfoSection\getACFLayout(),
                    Components\TwoColListSection\getACFLayout(),
                    Components\HomeTestimonialsSection\getACFLayout(),
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
                    'value' => 'page-templates/page-affiliates.php'
                ]
            ]
        ]
    ]);
});
