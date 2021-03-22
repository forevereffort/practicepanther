<?php

namespace Flynt\Acf;

use Flynt\Utils\Options;

add_filter('pre_http_request', function ($preempt, $args, $url) {
    if (strpos($url, 'https://www.youtube.com/oembed') !== false || strpos($url, 'https://vimeo.com/api/oembed') !== false) {
        $response = wp_cache_get($url, 'oembedCache');
        if (!empty($response)) {
            return $response;
        }
    }
    return false;
}, 10, 3);

add_filter('http_response', function ($response, $args, $url) {
    if (strpos($url, 'https://www.youtube.com/oembed') !== false || strpos($url, 'https://vimeo.com/api/oembed') !== false) {
        wp_cache_set($url, $response, 'oembedCache');
    }
    return $response;
}, 10, 3);

// Website global settings
Options::addGlobal('Website Settings', [
    [
        'label' => 'Website Scripts',
        'name' => 'website_scripts',
        'type' => 'group',
        'layout' => 'row',
        'sub_fields' => [
            [
                'label' => 'Run tracking scripts?',
                'name' => 'run_tracking_scripts',
                'type' => 'true_false',
                'ui' => true,
                'ui_on_text' => 'Yes',
                'ui_off_text' => 'No',
            ],
            [
                'label' => 'Before head closing tag',
                'name' => 'before_head_closing_tag',
                'type' => 'textarea',
                'default_value' => '',
            ],
            [
                'label' => 'After body opening tag',
                'name' => 'after_body_opening_tag',
                'type' => 'textarea',
                'default_value' => '',
            ],
            [
                'label' => 'Before body closing tag',
                'name' => 'begore_body_closing_tag',
                'type' => 'textarea',
                'default_value' => '',
            ],
        ]
    ],
]);

Options::addGlobal('Search Page Settings', [
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
    ]
]);

Options::addGlobal('Post Settings', [
    [
        [
            'label' => 'Post Subscribe Form Content',
            'name' => 'post_subscribe_form_content',
            'type' => 'wysiwyg',
            'delay' => 1,
            'media_upload' => 0,
            'wrapper' => [
                'class' => 'autosize',
            ],
        ],
        [
            'label' => 'Post Subscribe Gravity From Shortcode',
            'name' => 'post_subscribe_gravity_grom_shortcode',
            'type' => 'text',
            'default_value' => '',
        ],
        [
            'label' => 'Post Footer Desktop Image',
            'name' => 'post_footer_desktop_image',
            'type' => 'image',
            'preview_size' => 'medium',
            'instructions' => '',
            'max_size' => 4,
            'mime_types' => 'gif,jpg,jpeg,png'
        ],
        [
            'label' => 'Post Footer mobile Image',
            'name' => 'post_footer_mobile_image',
            'type' => 'image',
            'preview_size' => 'medium',
            'instructions' => '',
            'max_size' => 4,
            'mime_types' => 'gif,jpg,jpeg,png'
        ],
        [
            'label' => 'Post Footer Image Link URL',
            'name' => 'post_footer_image_link_url',
            'type' => 'text',
            'default_value' => '',
        ],
        [
            'label' => 'Post Footer All Blog Posts Link URL',
            'name' => 'post_footer_all_blog_posts_link_url',
            'type' => 'text',
            'default_value' => '',
        ],
        [
            'label' => 'Post Footer Form Content',
            'name' => 'post_footer_form_content',
            'type' => 'wysiwyg',
            'delay' => 1,
            'media_upload' => 0,
            'wrapper' => [
                'class' => 'autosize',
            ],
        ],
        [
            'label' => 'Post Footer Gravity From Shortcode',
            'name' => 'post_footer_gravity_grom_shortcode',
            'type' => 'text',
            'default_value' => '',
        ]
    ]
]);

Options::addGlobal('Integration Settings', [
    [
        [
            'label' => 'See All Integrations Link Url',
            'name' => 'see_all_integrations_link_url',
            'type' => 'text',
            'default_value' => '',
        ],
        [
            'label' => 'Integration Footer Form Content',
            'name' => 'integration_footer_form_content',
            'type' => 'wysiwyg',
            'delay' => 1,
            'media_upload' => 0,
            'wrapper' => [
                'class' => 'autosize',
            ],
        ],
        [
            'label' => 'Integration Footer Gravity From Shortcode',
            'name' => 'integration_footer_gravity_grom_shortcode',
            'type' => 'text',
            'default_value' => '',
        ]
    ]
]);

Options::addGlobal('Legal Term Settings', [
    [
        [
            'label' => 'Legal Term Search Page',
            'name' => 'legal_term_search_page',
            'type' => 'post_object',
            'post_type' => array(
                0 => 'page',
            ),
            'return_format' => 'object',
            'ui' => 1,
        ],
        [
            'label' => 'Legal Term Search Form Background',
            'name' => 'legal_term_search_form_background',
            'type' => 'image',
            'preview_size' => 'medium',
            'instructions' => '',
            'max_size' => 4,
            'mime_types' => 'gif,jpg,jpeg,png'
        ],
        [
            'label' => 'Legal Term Search Form Content',
            'name' => 'legal_term_search_form_content',
            'type' => 'wysiwyg',
            'delay' => 1,
            'media_upload' => 0,
            'wrapper' => [
                'class' => 'autosize',
            ],
        ],
        [
            'label' => 'Legal Term Footer Form Content',
            'name' => 'legal_term_footer_form_content',
            'type' => 'wysiwyg',
            'delay' => 1,
            'media_upload' => 0,
            'wrapper' => [
                'class' => 'autosize',
            ],
        ],
        [
            'label' => 'Legal Term Footer Gravity From Shortcode',
            'name' => 'legal_term_footer_gravity_grom_shortcode',
            'type' => 'text',
            'default_value' => '',
        ]
    ]
]);

Options::addGlobal('Start Free Trial Modal Settings', [
    [
        [
            'label' => 'Modal Content',
            'name' => 'modal_content',
            'type' => 'wysiwyg',
            'delay' => 1,
            'media_upload' => 0,
            'wrapper' => [
                'class' => 'autosize',
            ],
        ],
        [
            'label' => 'Modal Gravity From Shortcode',
            'name' => 'modal_gravity_grom_shortcode',
            'type' => 'text',
            'default_value' => '',
        ],
        [
            'label' => 'Modal Form Description',
            'name' => 'modal_form_description',
            'type' => 'wysiwyg',
            'delay' => 1,
            'media_upload' => 0,
            'wrapper' => [
                'class' => 'autosize',
            ],
        ],
        [
            'label' => 'Modal Image',
            'name' => 'modal_image',
            'type' => 'image',
            'preview_size' => 'medium',
            'instructions' => '',
            'max_size' => 4,
            'mime_types' => 'gif,jpg,jpeg,png',
            'wrapper' => [
                'width' => '50'
            ]
        ],
        [
            'label' => 'Modal Retina Image',
            'name' => 'modal_retina_image',
            'type' => 'image',
            'preview_size' => 'medium',
            'instructions' => '',
            'max_size' => 4,
            'mime_types' => 'gif,jpg,jpeg,png',
            'wrapper' => [
                'width' => '50'
            ]
        ],
        [
            'label' => 'Display Pages',
            'name' => 'display_pages',
            'type' => 'post_object',
            'post_type' => [
                0 => 'page',
            ],
            'taxonomy' => '',
            'allow_null' => 0,
            'multiple' => 1,
            'return_format' => 'id',
            'ui' => 1,
        ],
    ]
]);
