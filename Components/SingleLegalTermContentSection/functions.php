<?php

namespace Flynt\Components\SingleLegalTermContentSection;

use Timber;

add_filter('Flynt/addComponentData?name=SingleLegalTermContentSection', function ($data) {
    $args = [
        'post_type' => 'legal-term',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'offset' => 0,
    ];

    $sorted_legal_terms_list = Timber::get_posts($args);
    $data['next_legal_terms'] = [];

    /**
     * get next 3 legal terms from sorted legal terms list
     */
    $current_flag = false;
    $current_index = 0;

    foreach ($sorted_legal_terms_list as $item) {
        if ($current_flag && $current_index < 3) {
            $data['next_legal_terms'][] = $item;
            $current_index++;
        }
        
        // check current selected legal term
        if ($item->id === $data['post']->id) {
            $current_flag = true;
        }
    }

    return $data;
});
