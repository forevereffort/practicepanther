<?php

namespace Flynt\CustomPostTypes;

function registerPressReleasePostType()
{
    $labels = array(
        'name'                  => _x('Press Releases', 'Press Release General Name', 'flynt'),
        'singular_name'         => _x('Press Release', 'Press Release Singular Name', 'flynt'),
        'menu_name'             => __('Press Releases', 'flynt'),
        'name_admin_bar'        => __('Press Release', 'flynt'),
        'all_items'             => __('All Press Releases', 'flynt'),
        'add_new_item'          => __('Add New Press Release', 'flynt'),
        'add_new'               => __('Add New', 'flynt'),
        'new_item'              => __('New Press Release', 'flynt'),
        'edit_item'             => __('Edit Press Release', 'flynt'),
        'update_item'           => __('Update Press Release', 'flynt'),
        'view_item'             => __('View Press Release', 'flynt'),
        'view_items'            => __('View Press Releases', 'flynt'),
        'search_items'          => __('Search Press Release', 'flynt'),
    );

    $args = array(
        'label'                 => __('Press Release', 'flynt'),
        'description'           => __('Press Release Description', 'flynt'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
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
        'rewrite'               => array( 'slug' => 'press-release', 'with_front' => false ),
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-megaphone',
    );

    register_post_type('press-release', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerPressReleasePostType');
