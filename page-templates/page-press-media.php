<?php

/**
 * Template Name: Press & Media Page
 */

use Timber\Timber;
use Timber\Post;

$context = Timber::get_context();
$context['post'] = new Post();

Timber::render('templates/page-press-media.twig', $context);
