<?php

namespace Flynt\Components\PressTestimonialListSection;

use Timber;
use Flynt\Utils\TimberDynamicResize;

add_image_size('avatar_69_69', 69, 69, true);

add_filter('Flynt/addComponentData?name=PressTestimonialListSection', function ($data) {
    $posts_per_page = wp_is_mobile() ? 3 : 6;
    $testimonial_counts = wp_count_posts('press-testimonial')->publish;
    $total_pages = round($testimonial_counts / $posts_per_page + 0.45);

    $args = [
        'post_type' => 'press-testimonial',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $posts_per_page,
        'offset' => 0,
    ];

    $data['testimonials'] = Timber::get_posts($args);
    $data['posts_per_page'] = $posts_per_page;
    $data['total_pages'] = $total_pages;
    $data['nonce'] = wp_create_nonce('get_more_press_testimonials_nonce');

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'pressTestimonialListSection',
        'label' => 'Press Testimonial List Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '',
            ]
        ]
    ];
}

add_action('wp_ajax_get_more_press_testimonials', 'get_more_press_testimonials');
add_action('wp_ajax_nopriv_get_more_press_testimonials', function () {
    if (!wp_verify_nonce($_REQUEST['nonce'], 'get_more_press_testimonials_nonce')) {
        exit('No naughty business please');
    }

    $result = [];
    $page = intval($_REQUEST['page']);
    $posts_per_page = intval($_REQUEST['postsPerPage']);
    
    $result['tesimonials'] = [];
    $args = [
        'post_type' => 'press-testimonial',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $posts_per_page,
        'offset' => ($page - 1) * $posts_per_page
    ];
    $testimonials = Timber::get_posts($args);

    $timberDynamicResize = new TimberDynamicResize();

    foreach ($testimonials as $testimonial) {
        $company_logo = get_field('company_logo_retina_image', $testimonial->ID);

        $result['tesimonials'][] = [
            'title' => $testimonial->title,
            'content' => get_field('content', $testimonial->ID),
            'testimonial_date' => get_field('testimonial_date', $testimonial->ID),
            'company_logo' => [
                'url' => $timberDynamicResize->resizeDynamic($company_logo->src, $company_logo->width / 2),
                'retina_url' => $timberDynamicResize->resizeDynamic($company_logo->src, $company_logo->width),
                'alt' => $company_logo->alt
            ],
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
});
