<?php

namespace Flynt\Components\SiteHeader;

use Timber;
use Flynt\Utils\Asset;

add_action('init', function () {
    register_nav_menus([
        'header_menu' => __('Header Main', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=SiteHeader', function ($data) {
    $data['menu'] = new Timber\Menu('header_menu');
    $data['logo'] = [
        'src' => Asset::requireUrl('Components/SiteHeader/Assets/logo.png'),
        'alt' => get_bloginfo('name')
    ];

    return $data;
});



if (function_exists('acf_add_local_field_group')) :
    acf_add_local_field_group(array(
        'key' => 'group_5eb577e1a6421',
        'title' => 'Mega Menu Items',
        'fields' => array(
            array(
                'key' => 'field_5eb577f122cff',
                'label' => 'Menu Description',
                'name' => 'header_menu_description',
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
                'placeholder' => 'Item description',
                'prepend' => '',
                'append' => '',
                'maxlength' => 35,
            ),
            array(
                'key' => 'field_5eb5784722d00',
                'label' => 'Icon',
                'name' => 'icon',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'preview_size' => 'full',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => 'png, svg',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'nav_menu_item',
                    'operator' => '==',
                    'value' => 'all',
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
