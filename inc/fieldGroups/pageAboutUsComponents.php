<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageAboutUsComponents',
        'title' => 'Page About Us Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageAboutUsComponents',
                'label' => 'Page About Us Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\AboutUsHeroSection\getACFLayout(),
                    Components\AboutUsAwards\getACFLayout(),
                    Components\BlockFullImageText\getACFLayout(),
                    Components\OurPlansSection\getACFLayout(),
                    Components\TimelineSection\getACFLayout(),
                    Components\HomeTestimonialsSection\getACFLayout(),
                    Components\TeamMembersSection\getACFLayout(),
                    Components\BlockImage3ColText\getACFLayout(),
                    Components\TextSection\getACFLayout(),
                ]
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/page-about-us.php'
                ]
            ]
        ]
    ]);
});
