<?php

namespace Flynt\Components\BlockIntegrationContent;

use Flynt\Utils\Asset;
use Flynt\Utils\Options;
use Timber;

add_filter('Flynt/addComponentData?name=BlockIntegrationContent', function ($data) {

    $data['integration_footer_form_content'] = Options::getGlobal('Integration Settings', 'integration_footer_form_content');
    $data['integration_footer_gravity_grom_shortcode'] = Options::getGlobal('Integration Settings', 'integration_footer_gravity_grom_shortcode');
    
    $args = [
        'post_type' => 'integration',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 6,
        'offset' => 0,
    ];

    if (count($data['post']->terms('integration-category')) > 0) {
        $temp = [];

        foreach ($data['post']->terms('integration-category') as $cat) {
            $temp[] = $cat->id;
        }

        $args['tax_query'] = [
            [
                'taxonomy' => 'integration-category',
                'field' => 'term_id',
                'terms' => $temp,
            ],
        ];
    }

    $data['related_integrations'] = Timber::get_posts($args);
    $data['see_all_integrations_link_url'] = Options::getGlobal('Integration Settings', 'see_all_integrations_link_url');

    return $data;
});
