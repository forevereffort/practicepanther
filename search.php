<?php

use Timber\Timber;

$context = Timber::get_context();

$args = [
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1,
    's' => get_search_query()
];

$found_posts = Timber::get_posts($args);
$context['posts_count'] = count($found_posts);

$posts_per_page = get_option('posts_per_page');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => $posts_per_page,
    's' => get_search_query(),
    'offset' => ($paged - 1) * $posts_per_page
];

$context['posts'] = Timber::get_posts($args);

$context['page_title'] = empty(get_search_query()) ? "All Blog Posts" : "Search results for “" . get_search_query() . "”";
$context['page_url'] = site_url('/page/');
$context['page_url_param'] = '?s=' . urlencode(get_search_query());

Timber::render('templates/search.twig', $context);
