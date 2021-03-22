<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pagePriceComponents',
        'title' => 'Page Price Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pagePriceComponents',
                'label' => 'Page Price Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\ChoosePricePlanSection\getACFLayout(),
                    Components\HomeFeaturedSection\getACFLayout(),
                    Components\OurPlansSection\getACFLayout(),
                    Components\PriceTableSection\getACFLayout(),
                    Components\First30Section\getACFLayout(),
                    Components\HomeTestimonialsSection\getACFLayout(),
                    Components\FaqSection\getACFLayout(),
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
                    'value' => 'page-templates/page-price.php'
                ]
            ]
        ]
    ]);
});
