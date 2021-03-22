<?php

namespace Flynt\CustomPostTypes;

function registerIntegrationPostType()
{
    $labels = array(
        'name'                  => _x('Integrations', 'Integration General Name', 'flynt'),
        'singular_name'         => _x('Integration', 'Integration Singular Name', 'flynt'),
        'menu_name'             => __('Integrations', 'flynt'),
        'name_admin_bar'        => __('Integration', 'flynt'),
        'all_items'             => __('All Integrations', 'flynt'),
        'add_new_item'          => __('Add New Integration', 'flynt'),
        'add_new'               => __('Add New', 'flynt'),
        'new_item'              => __('New Integration', 'flynt'),
        'edit_item'             => __('Edit Integration', 'flynt'),
        'update_item'           => __('Update Integration', 'flynt'),
        'view_item'             => __('View Integration', 'flynt'),
        'view_items'            => __('View Integrations', 'flynt'),
        'search_items'          => __('Search Integration', 'flynt'),
    );

    $args = array(
        'label'                 => __('Integration', 'flynt'),
        'description'           => __('Integration Description', 'flynt'),
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
        'rewrite'               => array( 'slug' => 'integration', 'with_front' => false ),
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-rest-api',
    );

    register_post_type('integration', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerIntegrationPostType');

function set_custom_edit_integration_columns($columns)
{
    return [
        'cb' => $columns['cb'],
        'title' => $columns['title'],
        'icon' => 'Icon',
        'taxonomy-integration-category' => $columns['taxonomy-integration-category'],
        'date' => $columns['date'],
    ];
}

add_filter('manage_integration_posts_columns', '\\Flynt\\CustomPostTypes\\set_custom_edit_integration_columns');

function custom_integration_column($column, $post_id)
{
    if ($column == 'icon') {
        $icon_image = get_field('icon_image', $post_id);
        if (!empty($icon_image)) {
            echo '<img src="' . $icon_image->src() . '" alt="' . $icon_image->alt . '"/>';
        }
    }
}

add_action('manage_integration_posts_custom_column', '\\Flynt\\CustomPostTypes\\custom_integration_column', 10, 2);

if (function_exists('acf_add_local_field_group')) :
    acf_add_local_field_group(array(
    'key' => 'group_5ee9846ac232f',
    'title' => 'Integration Metabox',
    'fields' => array(
        array(
            'key' => 'field_5ee9847776ac0',
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
            'key' => 'field_5ee98508f32e1',
            'label' => 'Integration Excerpt',
            'name' => 'integration_excerpt',
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
                'value' => 'integration',
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
