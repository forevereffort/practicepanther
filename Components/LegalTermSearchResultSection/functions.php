<?php

namespace Flynt\Components\LegalTermSearchResultSection;

use Timber;

add_filter('Flynt/addComponentData?name=LegalTermSearchResultSection', function ($data) {
    $data['search_key'] = get_query_var('search', '');

    $args = [
        'post_type' => 'legal-term',
        's' => $data['search_key'],
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1,
        'offset' => 0,
    ];

    $data['search_legal_terms_list'] = Timber::get_posts($args);

    $data['search_count'] = count($data['search_legal_terms_list']);

    return $data;
});
