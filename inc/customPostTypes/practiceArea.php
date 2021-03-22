<?php

namespace Flynt\CustomPostTypes;

function registerPracticeAreaPostType()
{
    $labels = array(
        'name'                  => _x('Practice Areas', 'Practice Area General Name', 'flynt'),
        'singular_name'         => _x('Practice Area', 'Practice Area Singular Name', 'flynt'),
        'menu_name'             => __('Practice Areas', 'flynt'),
        'name_admin_bar'        => __('Practice Area', 'flynt'),
        'all_items'             => __('All Practice Areas', 'flynt'),
        'add_new_item'          => __('Add New Practice Area', 'flynt'),
        'add_new'               => __('Add New', 'flynt'),
        'new_item'              => __('New Practice Area', 'flynt'),
        'edit_item'             => __('Edit Practice Area', 'flynt'),
        'update_item'           => __('Update Practice Area', 'flynt'),
        'view_item'             => __('View Practice Area', 'flynt'),
        'view_items'            => __('View Practice Areas', 'flynt'),
        'search_items'          => __('Search Practice Area', 'flynt'),
    );

    $args = array(
        'label'                 => __('Practice Area', 'flynt'),
        'description'           => __('Practice Area Description', 'flynt'),
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
        'publicly_queryable'    => true,
        'rewrite'               => array( 'slug' => 'practice', 'with_front' => false ),
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-book',
    );

    register_post_type('practice-area', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerPracticeAreaPostType');

function set_custom_edit_practice_area_columns($columns)
{
    return [
        'cb' => $columns['cb'],
        'title' => $columns['title'],
        'icon' => 'Icon',
        'practice_area_excerpt' => 'Excerpt',
        'date' => $columns['date'],
    ];
}

add_filter('manage_practice-area_posts_columns', '\\Flynt\\CustomPostTypes\\set_custom_edit_practice_area_columns');

function custom_practice_area_column($column, $post_id)
{
    if ($column == 'icon') {
        $icon_image = get_field('icon_image', $post_id);
        if (!empty($icon_image)) {
            echo '<img src="' . $icon_image->src() . '" alt="' . $icon_image->alt . '"/>';
        }
    } else if ($column == 'practice_area_excerpt') {
        $excerpt = get_field('practice_area_excerpt', $post_id);

        echo $excerpt;
    }
}

add_action('manage_practice-area_posts_custom_column', '\\Flynt\\CustomPostTypes\\custom_practice_area_column', 10, 2);

if (function_exists('acf_add_local_field_group')) :
    acf_add_local_field_group(array(
        'key' => 'group_5f111bc04d8b9',
        'title' => 'Practice Area Metabox',
        'fields' => array(
            array(
                'key' => 'field_5f111bdc14e9f',
                'label' => 'Icon Image',
                'name' => 'icon_image',
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
                'key' => 'field_5f111c1814ea0',
                'label' => 'Practice Area Excerpt',
                'name' => 'practice_area_excerpt',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'practice-area',
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
