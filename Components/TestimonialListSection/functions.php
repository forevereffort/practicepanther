<?php

namespace Flynt\Components\TestimonialListSection;

use Timber;
use Flynt\Utils\TimberDynamicResize;

add_image_size('avatar_69_69', 69, 69, true);

add_filter('Flynt/addComponentData?name=TestimonialListSection', function ($data) {
    $posts_per_page = wp_is_mobile() ? 3 : 6;
    $testimonial_counts = wp_count_posts('testimonial')->publish;
    $total_pages = round($testimonial_counts / $posts_per_page + 0.45);

    $args = [
        'post_type' => 'testimonial',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $posts_per_page,
        'offset' => 0,
    ];

    $data['testimonials'] = Timber::get_posts($args);
    $data['posts_per_page'] = $posts_per_page;
    $data['total_pages'] = $total_pages;
    $data['nonce'] = wp_create_nonce('get_more_testimonials_nonce');

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'testimonialListSection',
        'label' => 'Testimonial List Section',
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

add_action('wp_ajax_get_more_testimonials', 'Flynt\Components\TestimonialListSection\get_more_testimonials');
add_action('wp_ajax_nopriv_get_more_testimonials', 'Flynt\Components\TestimonialListSection\get_more_testimonials');
function get_more_testimonials () {
    if (!wp_verify_nonce($_REQUEST['nonce'], 'get_more_testimonials_nonce')) {
        exit('No naughty business please');
    }

    $result = [];
    $page = intval($_REQUEST['page']);
    $posts_per_page = intval($_REQUEST['postsPerPage']);
    
    $result['tesimonials'] = [];
    $args = [
        'post_type' => 'testimonial',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $posts_per_page,
        'offset' => ($page - 1) * $posts_per_page
    ];
    $testimonials = Timber::get_posts($args);

    $timberDynamicResize = new TimberDynamicResize();

    foreach ($testimonials as $testimonial) {
        $avatar = get_field('user_avatar', $testimonial->ID);
        $company_logo = get_field('company_logo', $testimonial->ID);

        $result['tesimonials'][] = [
            'title' => $testimonial->title,
            'content' => get_field('content', $testimonial->ID),
            'role' => get_field('role', $testimonial->ID),
            'avatar' => [
                'url' => $timberDynamicResize->resizeDynamic($avatar->src, 69),
                'retina_url' => $timberDynamicResize->resizeDynamic($avatar->src, 138),
                'alt' => $avatar->alt
            ],
            'company_logo' => [
                'url' => $timberDynamicResize->resizeDynamic($company_logo->src, $company_logo->width / 2),
                'retina_url' => $timberDynamicResize->resizeDynamic($company_logo->src, $company_logo->width),
                'alt' => $company_logo->alt
            ],
            'link_title' => get_field('link_title', $testimonial->ID),
            'link_url' => get_field('link_url', $testimonial->ID),
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
