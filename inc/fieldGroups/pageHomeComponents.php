<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageHomeComponents',
        'title' => 'Page Home Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageHomeComponents',
                'label' => 'Page Home Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\HomeHeroSection\getACFLayout(),
                    Components\HomeFeaturedSection\getACFLayout(),
                    Components\HomeTestimonialsSection\getACFLayout(),
                    Components\BlockTextImageText\getACFLayout(),
                    Components\HomeFavoriteSection\getACFLayout(),
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
                    'value' => 'page-templates/page-home.php'
                ]
            ]
        ]
    ]);
});
