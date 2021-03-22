<?php

namespace Flynt\Components\BlockPostContent;

use Flynt\Utils\Asset;
use Flynt\Utils\Options;
use Timber;

add_filter('Flynt/addComponentData?name=BlockPostContent', function ($data) {

    $data['user_avatar_url'] = '';
    
    /**
     * User Profile Picture Plugin Used for User Avatar
     * https://wordpress.org/plugins/metronet-profile-picture/
     */
    if (function_exists('mt_profile_img')) {
        $author_id = $data['post']->post_author;
        $profile_post_id = absint(get_user_option('metronet_post_id', $author_id));

        if (0 === $profile_post_id || 'mt_pp' !== get_post_type($profile_post_id)) {
            $data['user_avatar_url'] = '';
        } else {
            $post_thumbnail_id = get_post_thumbnail_id($profile_post_id);
            $data['user_avatar_url'] = wp_get_attachment_image_src($post_thumbnail_id, 'avatar_138_138')[0];
        }
    }

    if (isset($_GET['preview'])) {
        $data['popup_dialog_show'] = get_post_meta($data['post']->ID, "show", true);
        $data['popup_trigger'] = get_post_meta($data['post']->ID, "popup_trigger", true);
        $data['popup_dialog_desktop_image'] = new Timber\Image(get_post_meta($data['post']->ID, "desktop_image", true));
        $data['popup_dialog_mobile_image'] = new Timber\Image(get_post_meta($data['post']->ID, "mobile_image", true));
        $data['popup_dialog_url_link'] = get_post_meta($data['post']->ID, "url_link", true);
    } else {
        $data['popup_dialog_show'] = get_field('show');
        $data['popup_trigger'] = get_field('popup_trigger');
        $data['popup_dialog_desktop_image'] = get_field('desktop_image');
        $data['popup_dialog_mobile_image'] = get_field('mobile_image');
        $data['popup_dialog_url_link'] = get_field('url_link');
    }

    if (isset($_GET['preview'])) {
        $data['references'] = [];

        $index = 0;
        while (metadata_exists('post', $data['post']->ID, "references_{$index}_number")) {
            $data['references'][] = [
                'number' => get_post_meta($data['post']->ID, "references_{$index}_number", true),
                'content' => apply_filters('the_content', get_post_meta($data['post']->ID, "references_{$index}_content", true))
            ];

            $index++;
        }
    } else {
        $data['references'] = get_field('references');
    }

    $data['social_shring_html'] = crunchify_social_sharing_buttons($data['post']);

    $data['post_subscribe_form_content'] = Options::getGlobal('Post Settings', 'post_subscribe_form_content');
    $data['post_subscribe_gravity_grom_shortcode'] = Options::getGlobal('Post Settings', 'post_subscribe_gravity_grom_shortcode');

    $data['post_footer_desktop_image'] = Options::getGlobal('Post Settings', 'post_footer_desktop_image');
    $data['post_footer_mobile_image'] = Options::getGlobal('Post Settings', 'post_footer_mobile_image');
    $data['post_footer_image_link_url'] = Options::getGlobal('Post Settings', 'post_footer_image_link_url');

    $data['post_footer_form_content'] = Options::getGlobal('Post Settings', 'post_footer_form_content');
    $data['post_footer_gravity_grom_shortcode'] = Options::getGlobal('Post Settings', 'post_footer_gravity_grom_shortcode');
    
    $data['related_blogs'] = '';

    $args = [
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 3,
        'offset' => 0,
        'post__not_in' => [$data['post']->ID]
    ];

    if (count($data['post']->categories) > 0) {
        foreach ($data['post']->categories as $cat) {
            $args['category__in'][] = $cat->id;
        }
    }

    $data['related_blogs'] = Timber::get_posts($args);
    $data['related_blogs_link'] = Options::getGlobal('Post Settings', 'post_footer_all_blog_posts_link_url');

    return $data;
});

/**
 * Post References Metabox
 */
if (function_exists('acf_add_local_field_group')) :
    acf_add_local_field_group(array(
        'key' => 'group_5ee049d016aa5',
        'title' => 'Post References Metabox',
        'fields' => array(
            array(
                'key' => 'field_5ee049e7d1e6e',
                'label' => 'References',
                'name' => 'references',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => 'Add New Reference',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5ee04a11d1e6f',
                        'label' => 'Number',
                        'name' => 'number',
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '10',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                    array(
                        'key' => 'field_5ee04a25d1e70',
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
                        'toolbar' => 'basic',
                        'media_upload' => 0,
                        'delay' => 1,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
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

/**
 * Single Post Popup Dialog Metabox
 */
if (function_exists('acf_add_local_field_group')) :
    acf_add_local_field_group(array(
    'key' => 'group_5ee84ebc36e42',
    'title' => 'Post Popup Dialog Metabox',
    'fields' => array(
        array(
            'key' => 'field_5ee84f09c6f6f',
            'label' => 'Show',
            'name' => 'show',
            'type' => 'true_false',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
        array(
            'key' => 'field_5ee87457d0f12',
            'label' => 'Popup Trigger %',
            'name' => 'popup_trigger',
            'type' => 'number',
            'instructions' => 'How much (in percentage) the user scrolls before the popup shows',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => 30,
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => '',
            'max' => '',
            'step' => '',
        ),
        array(
            'key' => 'field_5ee84f28c6f70',
            'label' => 'Desktop Image',
            'name' => 'desktop_image',
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
            'key' => 'field_5ee89079c713a',
            'label' => 'Mobile Image',
            'name' => 'mobile_image',
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
            'key' => 'field_5ee84f49c6f73',
            'label' => 'Url Link',
            'name' => 'url_link',
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
                'value' => 'post',
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

/**
 * Single Post Sharing Code
 */
function crunchify_social_sharing_buttons($post)
{
    // Get current page URL
    $URL = urlencode($post->link);
    // Get current page title
    $Title = htmlspecialchars(urlencode(html_entity_decode($post->title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/intent/tweet?text=' . $Title . '&amp;url=' . $URL;
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $URL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $URL . '&amp;title=' . $Title;
    
    $Title = htmlspecialchars(html_entity_decode($post->title, ENT_COMPAT, 'UTF-8'), ENT_COMPAT, 'UTF-8');
    $mailURL = 'mailto:?subject=' . $Title . '&amp;body=Check out this blog post from PracticePanter : ' . $URL;
    // Add sharing button at the end of page/page content
    $variable = '<ul>';
    $variable .= '<li><a class="facebook" href="' . $facebookURL . '" target="_blank"><img src="' . Asset::requireUrl('assets/images/facebook-share-icon.svg') . '" alt="facebook"/></a></li>';
    $variable .= '<li><a class="twitter" href="' . $twitterURL . '" target="_blank"><img src="' . Asset::requireUrl('assets/images/twitter-share-icon.svg') . '" alt="twitter"/></a></li>';
    $variable .= '<li><a class="linkedin" href="' . $linkedInURL . '" target="_blank"><img src="' . Asset::requireUrl('assets/images/linkedin-share-icon.svg') . '" alt="linkedin"/></a></li>';
    $variable .= '<li><a class="email" href="' . $mailURL . '" target="_blank"><img src="' . Asset::requireUrl('assets/images/mail-share-icon.svg') . '" alt="email"/></a></li>';
    $variable .= '</ul>';

    return $variable;
}


/**
 * Scripts
 * GTM dataLayer
 */
add_action('wp_head', function () {
    if (is_single() && 'post' == get_post_type()) {
        $categories = get_the_category(get_the_ID());
        $category_names = array();
        foreach ($categories as $category) {
            array_push($category_names, $category->name);
        }
        $js_array = json_encode($category_names);

        echo "
            <script>
                window.dataLayer = window.dataLayer || [];
                dataLayer.push({ blogCategories: {$js_array} });
            </script>
        ";
    }
});