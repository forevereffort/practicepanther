<?php

namespace Flynt\Components\StartFreeTrialModal;

use Flynt\Utils\Asset;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=StartFreeTrialModal', function ($data) {
    $data['modal_content'] = Options::getGlobal('Start Free Trial Modal Settings', 'modal_content');
    $data['modal_gravity_grom_shortcode'] = Options::getGlobal('Start Free Trial Modal Settings', 'modal_gravity_grom_shortcode');
    $data['modal_form_description'] = Options::getGlobal('Start Free Trial Modal Settings', 'modal_form_description');
    $data['modal_image'] = Options::getGlobal('Start Free Trial Modal Settings', 'modal_image');
    $data['modal_retina_image'] = Options::getGlobal('Start Free Trial Modal Settings', 'modal_retina_image');
    $data['display_pages'] = Options::getGlobal('Start Free Trial Modal Settings', 'display_pages');

    $data['show_modal'] = false;

    global $post;

    if (in_array($post->ID, $data['display_pages'])) {
        $data['show_modal'] = true;
    }

    $data['logo'] = [
        'src' => Asset::requireUrl('Components/SiteHeader/Assets/logo.png'),
        'alt' => get_bloginfo('name')
    ];

    // get gravity form id from shortcode string
    preg_match_all('/' . get_shortcode_regex() . '/s', $data['modal_gravity_grom_shortcode'], $matches);
    $out = [];
    if (isset($matches[2])) {
        foreach ((array) $matches[2] as $key => $value) {
            if ($value === 'gravityform') {
                $out[] = shortcode_parse_atts($matches[3][$key]);
            }
        }
    }

    $data['modal_form_id'] = $out[0]['id'];

    return $data;
});
