<?php

use Timber\Timber;

$context = Timber::get_context();
$context['page_404'] = true;

Timber::render('templates/404.twig', $context);
