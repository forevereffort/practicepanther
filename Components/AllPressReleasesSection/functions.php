<?php

namespace Flynt\Components\AllPressReleasesSection;

use Timber;
use Flynt\ZebraPagination;
use Flynt\Utils\TimberDynamicResize;

add_filter('Flynt/addComponentData?name=AllPressReleasesSection', function ($data) {
    global $post;

    $posts_per_page = 6;
    $data['posts_per_page'] = $posts_per_page;
    
    // $args = [
    //     'post_type' => 'press-release',
    //     'orderby' => 'date',
    //     'order' => 'DESC',
    //     'posts_per_page' => $posts_per_page,
    //     'offset' => 0,
    // ];
    
    // $data['blogs'] = Timber::get_posts($args);
    
    // $pagination = new ZebraPagination();
    
    // $post_counts = wp_count_posts('press-release')->publish;
    // $pagination->records($post_counts);
    // $pagination->recordsPerPage($posts_per_page);
    // $pagination->padding(false);

    // $data['page_nav_html'] = $pagination->render(true);

    $data['nonce'] = wp_create_nonce('get_all_press_releases_nonce');

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'allPressReleasesSection',
        'label' => 'All Press Releases Section',
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

add_action('wp_ajax_get_all_press_releases', 'Flynt\Components\AllPressReleasesSection\getAllPressReleasesFunc');
add_action('wp_ajax_nopriv_get_all_press_releases', 'Flynt\Components\AllPressReleasesSection\getAllPressReleasesFunc');

function getAllPressReleasesFunc()
{
    if (!wp_verify_nonce($_REQUEST['nonce'], 'get_all_press_releases_nonce')) {
        exit('No naughty business please');
    }

    $result = [];
    $result['type'] = 'success';

    $page = intval($_REQUEST['page']);
    $posts_per_page = intval($_REQUEST['postsPerPage']);

    $args = [
        'post_type' => 'press-release',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => -1,
    ];
    $blogs = Timber::get_posts($args);
    $post_counts = count($blogs);
    $result['post_counts'] = $post_counts;

    $result['page_nav_html'] = '';
    if ($post_counts > 5) {
        $pagination = new ZebraPagination();

        $pagination->records($post_counts);
        $pagination->recordsPerPage($posts_per_page);
        $pagination->setPage($page);
        $pagination->padding(false);
        $pagination->isMobile(wp_is_mobile());

        $result['page_nav_html'] = $pagination->render(true);
    }

    $result['blog_html'] = '';
    
    $args = [
        'post_type' => 'press-release',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => $posts_per_page,
        'offset' => ($page - 1) * $posts_per_page,
    ];
    $blogs = Timber::get_posts($args);

    $timberDynamicResize = new TimberDynamicResize();

    foreach ($blogs as $index => $blog) {
        $excerpt = substr($blog->post_excerpt, 0, 85);

        $blog_image_style = "";
        
        if ($blog->thumbnail !== null) {
            // $blog_image_style = "style=\"background-image: url('{$blog->thumbnail->src('blog_400_200')}');\"";
            $blog_image_style = "style=\"background-image: url('" . $timberDynamicResize->resizeDynamic($blog->thumbnail->src, 400, 200) . "');\"";
        }

        $result['blog_html'] .= "
            <div class=\"all-press-release-item blog-card\">
                <a href=\"{$blog->link}\">
                    <div class=\"inner\">
                        <div class=\"blog-image\" {$blog_image_style}></div>
                        <div class=\"blog-info\">
                            <div class=\"blog-category\">{$blog->date}</div>
                            <h3>{$blog->post_title}</h3>
                            <p>{$excerpt}...</p>
                        </div>
                    </div>
                </a>
            </div>
        ";
    }

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    die();
}
