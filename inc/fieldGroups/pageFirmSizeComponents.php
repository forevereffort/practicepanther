<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageFirmSizeComponents',
        'title' => 'Page Firm Size Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageFirmSizeComponents',
                'label' => 'Page Firm Size Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\FirmHeroSection\getACFLayout(),
                    Components\BlockFullImageText\getACFLayout(),
                    Components\BlockImage3ColText\getACFLayout(),
                    Components\BlockFitImageTitle\getACFLayout(),
                    Components\SingleTestimonialSection\getACFLayout(),
                    Components\SelectedThreePostsColumnSection\getACFLayout(),
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
                    'value' => 'page-templates/page-firm-size.php'
                ]
            ]
        ]
    ]);
});
