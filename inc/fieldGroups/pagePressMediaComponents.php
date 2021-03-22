<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pagePressMediaComponents',
        'title' => 'Page Press Media Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pagePressMediaComponents',
                'label' => 'Page Press Media Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\PressMediaHeroSection\getACFLayout(),
                    Components\BlockFullImageTitle\getACFLayout(),
                    Components\BasicCompanyInfoSection\getACFLayout(),
                    Components\PressTestimonialListSection\getACFLayout(),
                    Components\ThreeColNumberInfoSection\getACFLayout(),
                    Components\BrandAssetsSection\getACFLayout(),
                    Components\AllPressReleasesSection\getACFLayout(),
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
                    'value' => 'page-templates/page-press-media.php'
                ]
            ]
        ]
    ]);
});
