<?php

/**
 * Template Name: Legal Term Search Result Page
 */

use Timber\Timber;
use Timber\Post;
use Flynt\Utils\Options;

$context = Timber::get_context();
$context['post'] = new Post();
$context['legal_term_search_page'] = Options::getGlobal('Legal Term Settings', 'legal_term_search_page');
$context['legal_term_search_form_background'] = Options::getGlobal('Legal Term Settings', 'legal_term_search_form_background');
$context['legal_term_search_form_content'] = Options::getGlobal('Legal Term Settings', 'legal_term_search_form_content');
$context['legal_term_footer_form_content'] = Options::getGlobal('Legal Term Settings', 'legal_term_footer_form_content');
$context['legal_term_footer_gravity_grom_shortcode'] = Options::getGlobal('Legal Term Settings', 'legal_term_footer_gravity_grom_shortcode');

Timber::render('templates/page-legal-term-search-result.twig', $context);
