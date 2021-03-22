<?php

namespace Flynt\Components\ListSearchResults;

use Flynt\ZebraPagination;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=ListSearchResults', function ($data) {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $posts_per_page = get_option('posts_per_page');
    $zebraPagination = new ZebraPagination();
    
    $zebraPagination->records($data['posts_count']);
    $zebraPagination->recordsPerPage($posts_per_page);
    $zebraPagination->padding(false);
    $zebraPagination->setPage($paged);
    $zebraPagination->setPage($paged);
    $zebraPagination->isMobile(wp_is_mobile());
    
    $data['page_nav_html'] = '';
    
    if ($data['posts_count'] > $posts_per_page) {
        $data['page_nav_html'] = $zebraPagination->renderWithParam($data['page_url'], $data['page_url_param']);
    }

    $data['banner_ad'] = Options::getGlobal('Search Page Settings', 'banner_ad');

    return $data;
});
