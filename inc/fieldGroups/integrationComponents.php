<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'integrationComponents',
        'title' => 'Integration Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'integrationComponents',
                'label' => 'Integration Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\SingleIntegrationHeroSection\getACFLayout(),
                    Components\BlockImageText\getACFLayout(),
                    Components\BlockFullImageTitle\getACFLayout(),
                    Components\TextSection\getACFLayout(),
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'integration',
                ],
            ],
        ],
    ]);
});
