<?php

use Timber\Timber;
use Timber\PostQuery;
use Timber\Term;

$context = Timber::get_context();
$context['posts'] = new PostQuery();
$context['page_title'] = single_cat_title('', false);
$context['posts_count'] = $context['posts']->found_posts;
$context['page_url'] = get_category_link(get_query_var('cat')) . 'page/';
$context['page_url_param'] = '';

Timber::render('templates/search.twig', $context);
