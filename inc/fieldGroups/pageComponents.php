<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageComponents',
        'title' => 'Page Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageComponents',
                'label' => 'Page Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                ]
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page'
                ],
                [
                    'param' => 'page_type',
                    'operator' => '!=',
                    'value' => 'posts_page'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-home.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-price.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-software.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-testimonials.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-firm-size.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-blog.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-all-components.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-integration.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-partnerships.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-practice-areas.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-support.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-press-media.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-affiliates.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-about-us.php'
                ],
                [
                    'param' => 'page_template',
                    'operator' => '!=',
                    'value' => 'page-templates/page-contact-us.php'
                ]
            ]
        ]
    ]);
});
