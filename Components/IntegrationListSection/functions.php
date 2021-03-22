<?php

namespace Flynt\Components\IntegrationListSection;

use Timber;

add_filter('Flynt/addComponentData?name=IntegrationListSection', function ($data) {
    $data['results'] = [];

    $data['is_mobile'] = wp_is_mobile();

    $posts_per_page = wp_is_mobile() ? 4 : 6;

    $data['nonce'] = wp_create_nonce('get_more_integrations_with_category_id_nonce');
    $data['posts_per_page'] = $posts_per_page;
    
    foreach ($data['selected_integration_categories'] as $cat) {
        $temp = [];
        $temp['cat_name'] = $cat['integration_category']->name;
        $temp['cat_id'] = $cat['integration_category']->id;
        
        $args = [
            'post_type' => 'integration',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => $posts_per_page,
            'offset' => 0,
            'tax_query' => array(
                array(
                    'taxonomy' => 'integration-category',
                    'field'    => 'term_id',
                    'terms'    => $temp['cat_id'],
                ),
            ),
        ];
        
        $temp['integrations'] = Timber::get_posts($args);

        $args['posts_per_page'] = -1;
        $all_integrations_in_category = new Timber\PostQuery($args);
        $total_pages = round($all_integrations_in_category->found_posts / $posts_per_page + 0.45);
        $temp['total_pages'] = $total_pages;

        $data['results'][] = $temp;
    }

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'integrationListSection',
        'label' => 'Integration List Section',
        'sub_fields' => [
            [
                'label' => 'Please Choose a integration category to display',
                'name' => 'selected_integration_categories',
                'type' => 'repeater',
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'label' => 'Integration Category',
                        'name' => 'integration_category',
                        'type' => 'taxonomy',
                        'taxonomy' => 'integration-category',
                        'field_type' => 'select',
                        'return_format' => 'object',
                    ],
                ]
            ],
        ]
    ];
}

add_action('wp_ajax_get_more_integrations_with_category_id', 'Flynt\Components\IntegrationListSection\get_more_integrations_by_category_id');
add_action('wp_ajax_nopriv_get_more_integrations_with_category_id', 'Flynt\Components\IntegrationListSection\get_more_integrations_by_category_id');
function get_more_integrations_by_category_id () {
    if (!wp_verify_nonce($_REQUEST['nonce'], 'get_more_integrations_with_category_id_nonce')) {
        exit('No naughty business please');
    }

    $result = [];
    $page = intval($_REQUEST['page']);
    $posts_per_page = intval($_REQUEST['postsPerPage']);
    $cat_id = intval($_REQUEST['catID']);
    
    $result['integrations'] = [];
    $args = [
        'post_type' => 'integration',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $posts_per_page,
        'offset' => ($page - 1) * $posts_per_page,
        'tax_query' => array(
            array(
                'taxonomy' => 'integration-category',
                'field'    => 'term_id',
                'terms'    => $cat_id,
            ),
        ),
    ];
    $integrations = Timber::get_posts($args);

    foreach ($integrations as $integration) {
        $icon_image = get_field('icon_image', $integration->ID);
        $excerpt = get_field('integration_excerpt', $integration->ID);

        $result['integrations'][] = [
            'title' => $integration->title,
            'excerpt' => wp_is_mobile() ? substr($excerpt, 0, 85) : substr($excerpt, 0, 110),
            'icon_image' => [
                'url' => wp_get_attachment_image_src($icon_image->ID, 'full')[0],
                'alt' => $icon_image->_wp_attachment_image_alt
            ],
            'link' => $integration->link,
        ];
    }
    

    $result['type'] = 'success';

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    die();
};
