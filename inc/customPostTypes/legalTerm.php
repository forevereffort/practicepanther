<?php

namespace Flynt\CustomPostTypes;

function registerLegalTermPostType()
{
    $labels = array(
        'name'                  => _x('Legal Terms', 'Legal Term General Name', 'flynt'),
        'singular_name'         => _x('Legal Term', 'Legal Term Singular Name', 'flynt'),
        'menu_name'             => __('Legal Terms', 'flynt'),
        'name_admin_bar'        => __('Legal Term', 'flynt'),
        'all_items'             => __('All Legal Terms', 'flynt'),
        'add_new_item'          => __('Add New Legal Term', 'flynt'),
        'add_new'               => __('Add New', 'flynt'),
        'new_item'              => __('New Legal Term', 'flynt'),
        'edit_item'             => __('Edit Legal Term', 'flynt'),
        'update_item'           => __('Update Legal Term', 'flynt'),
        'view_item'             => __('View Legal Term', 'flynt'),
        'view_items'            => __('View Legal Terms', 'flynt'),
        'search_items'          => __('Search Legal Term', 'flynt'),
    );

    $args = array(
        'label'                 => __('Legal Term', 'flynt'),
        'description'           => __('Legal Term Description', 'flynt'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor'),
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
        'rewrite'               => array( 'slug' => 'legal-dictionary', 'with_front' => false ),
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-shield',
    );

    register_post_type('legal-term', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerLegalTermPostType');
