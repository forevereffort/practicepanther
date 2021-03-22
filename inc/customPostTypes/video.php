<?php

namespace Flynt\CustomPostTypes;

function registerVideoPostType()
{
    $labels = array(
        'name'                  => _x('Videos', 'Video General Name', 'flynt'),
        'singular_name'         => _x('Video', 'Video Singular Name', 'flynt'),
        'menu_name'             => __('Videos', 'flynt'),
        'name_admin_bar'        => __('Video', 'flynt'),
        'all_items'             => __('All Videos', 'flynt'),
        'add_new_item'          => __('Add New Video', 'flynt'),
        'add_new'               => __('Add New', 'flynt'),
        'new_item'              => __('New Video', 'flynt'),
        'edit_item'             => __('Edit Video', 'flynt'),
        'update_item'           => __('Update Video', 'flynt'),
        'view_item'             => __('View Video', 'flynt'),
        'view_items'            => __('View Videos', 'flynt'),
        'search_items'          => __('Search Video', 'flynt'),
    );

    $args = array(
        'label'                 => __('Video', 'flynt'),
        'description'           => __('Video Description', 'flynt'),
        'labels'                => $labels,
        'supports'              => array('title'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => false,
        'rewrite'               => array( 'slug' => 'video', 'with_front' => false ),
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-format-video',
    );

    register_post_type('video', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerVideoPostType');

function set_custom_edit_video_columns($columns)
{
    return [
        'cb' => $columns['cb'],
        'title' => $columns['title'],
        'taxonomy-video-category' => $columns['taxonomy-video-category'],
        'video' => 'Video',
        'date' => $columns['date'],
    ];
}

add_filter('manage_video_posts_columns', '\\Flynt\\CustomPostTypes\\set_custom_edit_video_columns');

function custom_video_column($column, $post_id)
{
    if ($column == 'video') {
        $video_overlay_image = get_field('video_overlay_image', $post_id);
        echo '<img src="' . $video_overlay_image->src . '" alt="' . $video_overlay_image->alt . '" style="width: 200px;"/>';
    }
}

add_action('manage_video_posts_custom_column', '\\Flynt\\CustomPostTypes\\custom_video_column', 10, 2);

if (function_exists('acf_add_local_field_group')) :
    acf_add_local_field_group(array(
    'key' => 'group_5f17c0fe8b497',
    'title' => 'Video Metabox',
    'fields' => array(
        array(
            'key' => 'field_5f17c492451d0',
            'label' => 'Video Overlay Image',
            'name' => 'video_overlay_image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
        array(
            'key' => 'field_5f17c107d3cc3',
            'label' => 'Video File',
            'name' => 'video_file',
            'type' => 'file',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'array',
            'library' => 'all',
            'min_size' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'video',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    ));
endif;
