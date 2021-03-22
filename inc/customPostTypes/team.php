<?php

namespace Flynt\CustomPostTypes;

function registerTeamPostType()
{
    $labels = array(
        'name'                  => _x('Team Members', 'Team Member General Name', 'flynt'),
        'singular_name'         => _x('Team Member', 'Team Member Singular Name', 'flynt'),
        'menu_name'             => __('Team', 'flynt'),
        'name_admin_bar'        => __('Team', 'flynt'),
        'all_items'             => __('All Team Members', 'flynt'),
        'add_new_item'          => __('Add New Team Member', 'flynt'),
        'add_new'               => __('Add New', 'flynt'),
        'new_item'              => __('New Team Member', 'flynt'),
        'edit_item'             => __('Edit Team Member', 'flynt'),
        'update_item'           => __('Update Team Member', 'flynt'),
        'view_item'             => __('View Team Member', 'flynt'),
        'view_items'            => __('View Team Members', 'flynt'),
        'search_items'          => __('Search Team Member', 'flynt'),
    );

    $args = array(
        'label'                 => __('Team Member', 'flynt'),
        'description'           => __('Team Members custom post type', 'flynt'),
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
        'rewrite'               => array( 'slug' => 'team', 'with_front' => false ),
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-groups',
    );

    register_post_type('team', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerTeamPostType');

function set_custom_edit_team_columns($columns)
{

    return [
        'cb' => $columns['cb'],
        'title' => 'Title',
        'team_member_image' => 'Image',
        'name' => 'Name',
        'position' => 'Position',
        'date' => $columns['date'],
    ];
}

add_filter('manage_team_posts_columns', '\\Flynt\\CustomPostTypes\\set_custom_edit_team_columns');

function custom_team_column($column, $post_id)
{
    if ($column == 'team_member_image') {
        $image = get_field('team_member_image', $post_id);
        if (!empty($image)) {
            echo '<img src="' . $image->src('avatar_52_52') . '" alt="' . $image->alt . '"/>';
        }
    } else if ($column == 'name') {
        echo get_field('name', $post_id);
    } else if ($column == 'position') {
        echo get_field('position', $post_id);
    }
}

add_action('manage_team_posts_custom_column', '\\Flynt\\CustomPostTypes\\custom_team_column', 10, 2);

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'team_member_metabox',
    'title' => 'Team Member Metabox',
    'fields' => array(
        array(
            'key' => 'team_member_image_key',
            'label' => 'Team Member Retina Image',
            'name' => 'team_member_image',
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
            'key' => 'name_key',
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
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
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array(
            'key' => 'position_key',
            'label' => 'Position',
            'name' => 'position',
            'type' => 'text',
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
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'team',
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
};
