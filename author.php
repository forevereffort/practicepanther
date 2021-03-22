<?php

use Timber\Timber;
use Timber\PostQuery;
use Timber\Term;
use Timber\User;

$context = Timber::get_context();
$context['posts'] = new PostQuery();

$author = new User($wp_query->query_vars['author']);
$context['page_title'] = "Blog Posts by " . $author->name();
$context['posts_count'] = $context['posts']->found_posts;
$context['page_url'] = get_author_posts_url($author->id()) . 'page/';
$context['page_url_param'] = '';

Timber::render('templates/search.twig', $context);
