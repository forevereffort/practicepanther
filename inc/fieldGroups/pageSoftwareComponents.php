<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageSoftwareComponents',
        'title' => 'Page Software Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageSoftwareComponents',
                'label' => 'Page Software Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\HomeHeroSection\getACFLayout(),
                    Components\SoftwareHeroSection\getACFLayout(),
                    Components\BlockFullImageText\getACFLayout(),
                    Components\BlockFullImageTitle\getACFLayout(),
                    Components\BlockFitImageText\getACFLayout(),
                    Components\BlockFitImageTitle\getACFLayout(),
                    Components\BlockImage3ColText\getACFLayout(),
                    Components\SingleTestimonialSection\getACFLayout(),
                    Components\OurPlansSection\getACFLayout(),
                    Components\PaymentTableSection\getACFLayout(),
                    Components\QuestionAnswerSection\getACFLayout(),
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
                    'value' => 'page-templates/page-software.php'
                ]
            ],
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'practice-area',
                ]
            ]
        ]
    ]);
});
