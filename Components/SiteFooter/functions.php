<?php

namespace Flynt\Components\SiteFooter;

use Timber;
use Flynt\Utils\Asset;

add_action('init', function () {
    register_nav_menus([
        'footer_menu' => __('Footer Main', 'flynt')
    ]);
});

add_action('widgets_init', function () {
    register_widget('Flynt\Widgets\WPMobileAppNavMenuWidget');
    register_widget('Flynt\Widgets\WPSocialMediaNavMenuWidget');

    $shared_args = array(
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
        'after_widget'  => '</div></div>',
    );
    
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __('Footer #1', 'twentytwenty'),
                'id'          => 'sidebar-1',
                'description' => __('Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty'),
            )
        )
    );

    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __('Footer #2', 'twentytwenty'),
                'id'          => 'sidebar-2',
                'description' => __('Widgets in this area will be displayed in the second column in the footer.', 'twentytwenty'),
            )
        )
    );
    
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __('Footer #3', 'twentytwenty'),
                'id'          => 'sidebar-3',
                'description' => __('Widgets in this area will be displayed in the third column in the footer.', 'twentytwenty'),
            )
        )
    );
    
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name'        => __('Footer #4', 'twentytwenty'),
                'id'          => 'sidebar-4',
                'description' => __('Widgets in this area will be displayed in the fourth column in the footer.', 'twentytwenty'),
            )
        )
    );
    
    register_sidebar(
        array_merge(
            $shared_args,
            array(
                'name' => __('Footer #5', 'twentytwenty'),
                'id'          => 'sidebar-5',
                'description' => __('Widgets in this area will be displayed in the fifth column in the footer.', 'twentytwenty'),
            )
        )
    );
});

add_filter('Flynt/addComponentData?name=SiteFooter', function ($data) {
    $data['footer_menu'] = new Timber\Menu('footer_menu');

    $data['footer_widget_1'] = Timber::get_widgets('sidebar-1');
    $data['footer_widget_2'] = Timber::get_widgets('sidebar-2');
    $data['footer_widget_3'] = Timber::get_widgets('sidebar-3');
    $data['footer_widget_4'] = Timber::get_widgets('sidebar-4');
    $data['footer_widget_5'] = Timber::get_widgets('sidebar-5');

    $data['footer_logo'] = [
        'src' => Asset::requireUrl('Components/SiteFooter/Assets/footer-logo.png'),
        'alt' => get_bloginfo('name')
    ];

    return $data;
});
