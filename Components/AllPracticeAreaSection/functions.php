<?php

namespace Flynt\Components\AllPracticeAreaSection;

use Timber;

add_filter('Flynt/addComponentData?name=AllPracticeAreaSection', function ($data) {
    global $post;
    
    $args = [
        'post_type' => 'practice-area',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'offset' => 0,
    ];
    
    $data['blogs'] = Timber::get_posts($args);
    $data['blogs_per_page'] = 6;
    $data['blog_counts'] = wp_count_posts('practice-area')->publish;

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'allPracticeAreaSection',
        'label' => 'All Practice Area Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'default_value' => 'All Practice Areas',
            ],
            
        ]
    ];
}
