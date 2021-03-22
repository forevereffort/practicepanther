<?php

namespace Flynt;

use Flynt\Utils\FileLoader;
use Flynt\Utils\Options;

require_once __DIR__ . '/vendor/autoload.php';

if (!defined('WP_ENV')) {
    define('WP_ENV', 'production');
}

// Check if the required plugins are installed and activated.
// If they aren't, this function redirects the template rendering to use
// plugin-inactive.php instead and shows a warning in the admin backend.
if (Init::checkRequiredPlugins()) {
    FileLoader::loadPhpFiles('inc');
    add_action('after_setup_theme', ['Flynt\Init', 'initTheme']);
    add_action('after_setup_theme', ['Flynt\Init', 'loadComponents'], 101);
}

// Remove the admin-bar inline-CSS as it isn't compatible with the sticky footer CSS.
// This prevents unintended scrolling on pages with few content, when logged in.
add_theme_support('admin-bar', array('callback' => '__return_false'));

// Add global settings to timber context
add_filter('timber/context', function ($context) {
    $context['website_scripts'] = Options::getGlobal('Website Scripts', 'website_scripts');
    
    return $context;
});

// prevent page from scrolling up after gravity form submit
add_filter('gform_confirmation_anchor', '__return_false');

// Hide update notifications
add_filter('pre_site_transient_update_core','remove_core_updates'); // Hide updates for WordPress itself
add_filter('pre_site_transient_update_plugins','remove_core_updates'); // Hide updates for all plugins
add_filter('pre_site_transient_update_themes','remove_core_updates'); // Hide updates for all themes

/**
 * Scripts
 * GTM dataLayer
 */
add_action('wp_head', function () {
    $page_scripts_textarea = get_field('page_scripts_textarea');
    echo $page_scripts_textarea;
});
