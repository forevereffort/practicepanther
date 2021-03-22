<?php

namespace Flynt\Components\AllBlogSection;

use Timber;
use Flynt\ZebraPagination;
use Flynt\Utils\TimberDynamicResize;

add_filter('Flynt/addComponentData?name=AllBlogSection', function ($data) {
    global $post;

    $posts_per_page = 5;
    $data['posts_per_page'] = $posts_per_page;
    $data['post_id'] = $post->ID;
    
    // $args = [
        //     'post_type' => 'post',
        //     'orderby' => 'date',
        //     'order' => 'DESC',
    //     'posts_per_page' => $posts_per_page,
    //     'offset' => 0,
    // ];
    
    // $data['blogs'] = Timber::get_posts($args);
    
    // $pagination = new ZebraPagination();
    
    // $post_counts = wp_count_posts('post')->publish;
    // $pagination->records($post_counts);
    // $pagination->recordsPerPage($posts_per_page);
    // $pagination->padding(false);

    // $data['page_nav_html'] = $pagination->render(true);

    $data['nonce'] = wp_create_nonce('get_all_blog_posts_nonce');

    return $data;
});

function getACFLayout()
{
    return [
        'name' => 'allBlogSection',
        'label' => 'All Blog Section',
        'sub_fields' => [
            [
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'default_value' => '',
            ],
            [
                'label' => 'Banner AD',
                'name' => 'banner_ad',
                'type' => 'group',
                'layout' => 'table',
                'sub_fields' => [
                    [
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'instructions' => '',
                        'max_size' => 4,
                        'mime_types' => 'gif,jpg,jpeg,png'
                    ],
                    [
                        'label' => 'Link URL',
                        'name' => 'link_url',
                        'type' => 'text',
                        'default_value' => '',
                    ]
                ]
            ],
            [
                'label' => 'Link Title',
                'name' => 'link_title',
                'type' => 'text',
                'default_value' => 'See more blog posts',
            ],
            [
                'label' => 'Link URL',
                'name' => 'link_url',
                'type' => 'text',
                'default_value' => site_url('?s='),
            ]
        ]
    ];
}

add_action('wp_ajax_get_all_blog_posts', 'Flynt\Components\AllBlogSection\getAllBlogPostsFunc');
add_action('wp_ajax_nopriv_get_all_blog_posts', 'Flynt\Components\AllBlogSection\getAllBlogPostsFunc');

function getAllBlogPostsFunc()
{
    if (!wp_verify_nonce($_REQUEST['nonce'], 'get_all_blog_posts_nonce')) {
        exit('No naughty business please');
    }

    $result = [];
    $result['type'] = 'success';

    $page = intval($_REQUEST['page']);
    $posts_per_page = intval($_REQUEST['postsPerPage']);
    $banner_image_url = $_REQUEST['bannerImageUrl'];
    $banner_link_url = $_REQUEST['bannerLinkUrl'];
    $displayed_posts = $_REQUEST['displayedPosts'];

    $args = [
        'post_type' => 'post',
        'post__not_in' => $displayed_posts,
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
        'post_type' => 'post',
        'post__not_in' => $displayed_posts,
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
            <div class=\"all-blog-item blog-card\">
                <a href=\"{$blog->link}\">
                    <div class=\"inner\">
                        <div class=\"blog-image\" {$blog_image_style}></div>
                        <div class=\"blog-info\">
                            <div class=\"blog-category {$blog->category->slug}\">{$blog->category}</div>
                            <h3>{$blog->post_title}</h3>
                            <p>{$excerpt}...</p>
                        </div>
                    </div>
                </a>
            </div>
        ";

        if ($index == 2) {
            $result['blog_html'] .= "
                <div class=\"all-blog-item blog-card mobile-hide\">
                <a href=\"{$banner_link_url}\"><div class=\"inner inner-image\" style=\"background-image: url('{$banner_image_url}');\"></div></a>
                </div>
            ";
        }
    }

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    die();
}
