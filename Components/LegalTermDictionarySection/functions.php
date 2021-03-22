<?php

namespace Flynt\Components\LegalTermDictionarySection;

use Timber;

add_filter('Flynt/addComponentData?name=LegalTermDictionarySection', function ($data) {
    $args = [
        'post_type' => 'legal-term',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'offset' => 0,
    ];

    $sorted_legal_terms_list = Timber::get_posts($args);
    $data['sorted_legal_terms_list'] = [];

    foreach ($sorted_legal_terms_list as $item) {
        $first_letter = strtolower(substr($item->post_title, 0, 1));

        $data['sorted_legal_terms_list'][$first_letter][] = $item;
    }

    return $data;
});
