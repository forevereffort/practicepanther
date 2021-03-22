<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageBlogComponents',
        'title' => 'Page Blog Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageBlogComponents',
                'label' => 'Page Blog Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\BlogSearchSection\getACFLayout(),
                    Components\ThreePostsColumnByCategorySection\getACFLayout(),
                    Components\ThreePostsRowByCategorySection\getACFLayout(),
                    Components\AllBlogSection\getACFLayout(),
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
                    'value' => 'page-templates/page-blog.php'
                ]
            ]
        ]
    ]);
});
