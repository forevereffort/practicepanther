<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageTestimonialsComponents',
        'title' => 'Page Testimonials Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageTestimonialsComponents',
                'label' => 'Page Testimonials Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\TestimonialHeroSection\getACFLayout(),
                    Components\TestimonialListSection\getACFLayout(),
                    Components\LearnAboutSection\getACFLayout(),
                    Components\OurPlansSection\getACFLayout(),
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
                    'value' => 'page-templates/page-testimonials.php'
                ]
            ]
        ]
    ]);
});
