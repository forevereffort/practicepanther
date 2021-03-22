<?php

/**
 * Template Name: All Blogs Page
 */

use Timber\Timber;

$context = Timber::get_context();

$args = [
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1,
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
    'offset' => ($paged - 1) * $posts_per_page
];

$context['posts'] = Timber::get_posts($args);

$context['page_title'] = "All Blog Posts";
$context['page_url'] = get_permalink() . 'page/';
$context['page_url_param'] = '';

Timber::render('templates/search.twig', $context);
