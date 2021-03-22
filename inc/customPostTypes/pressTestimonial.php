<?php

namespace Flynt\CustomPostTypes;

function registerPressTestimonialPostType()
{
    $labels = array(
        'name'                  => _x('Press Testimonials', 'Press Testimonial General Name', 'flynt'),
        'singular_name'         => _x('Press Testimonial', 'Press Testimonial Singular Name', 'flynt'),
        'menu_name'             => __('Press Testimonials', 'flynt'),
        'name_admin_bar'        => __('Press Testimonial', 'flynt'),
        'all_items'             => __('All Press Testimonials', 'flynt'),
        'add_new_item'          => __('Add New Press Testimonial', 'flynt'),
        'add_new'               => __('Add New', 'flynt'),
        'new_item'              => __('New Press Testimonial', 'flynt'),
        'edit_item'             => __('Edit Press Testimonial', 'flynt'),
        'update_item'           => __('Update Press Testimonial', 'flynt'),
        'view_item'             => __('View Press Testimonial', 'flynt'),
        'view_items'            => __('View Press Testimonials', 'flynt'),
        'search_items'          => __('Search Press Testimonial', 'flynt'),
    );

    $args = array(
        'label'                 => __('Press Testimonial', 'flynt'),
        'description'           => __('Press Testimonial Description', 'flynt'),
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
        'rewrite'               => array( 'slug' => 'press-testimonial', 'with_front' => false ),
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-nametag',
    );

    register_post_type('press-testimonial', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerPressTestimonialPostType');

function set_custom_edit_press_testimonial_columns($columns)
{

    return [
        'cb' => $columns['cb'],
        'title' => 'User Name',
        'company' => 'Company',
        'testimonial_date' => 'Testimonial Date',
        'date' => $columns['date'],
    ];
}

add_filter('manage_press-testimonial_posts_columns', '\\Flynt\\CustomPostTypes\\set_custom_edit_press_testimonial_columns');

function custom_press_testimonial_column($column, $post_id)
{
    if ($column == 'testimonial_date') {
        echo get_field('testimonial_date', $post_id);
    } else if ($column == 'company') {
        $company_logo = get_field('company_logo_retina_image', $post_id);
        echo '<img src="' . $company_logo->src . '" alt="' . $company_logo->alt . '"/>';
    }
}

add_action('manage_press-testimonial_posts_custom_column', '\\Flynt\\CustomPostTypes\\custom_press_testimonial_column', 10, 2);

if (function_exists('acf_add_local_field_group')) :
    acf_add_local_field_group(array(
        'key' => 'group_5f88394e7daa4',
        'title' => 'Press Testimonial Metabox',
        'fields' => array(
            array(
                'key' => 'field_5f883974eb2c8',
                'label' => 'Company Logo Retina Image',
                'name' => 'company_logo_retina_image',
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
                'key' => 'field_5f88398aeb2c9',
                'label' => 'Testimonial Date',
                'name' => 'testimonial_date',
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
                'key' => 'field_5f8839e130932',
                'label' => 'Content',
                'name' => 'content',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'default',
                'media_upload' => 0,
                'delay' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'press-testimonial',
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
