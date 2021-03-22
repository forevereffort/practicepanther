<?php

/**
 * Template Name: Contact Us Page
 */

use Timber\Timber;
use Timber\Post;

$context = Timber::get_context();
$context['post'] = new Post();

Timber::render('templates/page-contact-us.twig', $context);
