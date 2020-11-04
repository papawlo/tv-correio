<?php

function register_menu() {
    register_nav_menu('menu-programa', 'Menu do Programa');
     register_nav_menu('menu-principal', 'Menu Principal');
    register_nav_menu('footer-menu', 'Footer Menu');
}

add_action('init', 'register_menu');

function add_classes_to_menu_item($classes, $item = null, $args = null) {

    if (!is_null($args) && $args->theme_location === 'menu-programa')
        $classes[] = 'header-program-menu-item item';
    return $classes;
}

add_filter('nav_menu_css_class', 'add_classes_to_menu_item', 10, 3);

/**
 * Get the Menu Name of the current page
 * 
 * $loc is the location name of the nav menu
 *
 * Source:
 * http://wordpress.stackexchange.com/a/155833/1044
 *
 */
function my_get_menu_item_name($loc) {
    global $post;

    $locs = get_nav_menu_locations();

    $menu = wp_get_nav_menu_object($locs["menu-programa"]);

    $name = "";

    if ($menu) {

        $items = wp_get_nav_menu_items($menu->term_id);
        foreach ($items as $item) {
            // Check if this menu item links to the current page
            if ($item->object_id == $post->ID) {
                $name = $item->title;
                break;
            } elseif ($post->post_type == "video") {
                $name = "Vídeos";
                break;
            } elseif ($post->post_type == "post") {
                $name = "Notícias";
                break;
            } else {
                $name = "Home";
            }
        }
    }
    return $name;
}

//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


//custom query vars
add_filter('query_vars', 'custom_vars');

function custom_vars($qvars) {
    $qvars[] = 'q';
    $qvars[] = "ordena";
    $qvars[] = "nome";
    $qvars[] = "data";
    $qvars[] = "programa";
    $qvars[] = "type";
    return $qvars;
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}

add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}

/**
 * Config Plugin Sitewide  Tags
 */
//adiciona permalink para custom post type que vem do sitewide tag
add_filter('post_type_link', 'sitewide_tags_post_link', 10, 2);

//adiciona post type Video para o site mestre: noticas
function add_video_type($allowed_post_types) {

    $allowed_post_types['video'] = true;

    return $allowed_post_types;
}

add_filter('sitewide_tags_allowed_post_types', 'add_video_type');

/*
 * The site wide tags tag that we use on the explore blog 
 * will save revisions into the explore blog - we don't want that since
 * it useless data replication 
 */

add_filter('sitewide_tags_allowed_post_types', function ($post_types) {
    $post_types['revision'] = false;
    // var_dump($post_types);
    return $post_types;
}, 100);


if (is_admin()) {
    add_action('admin_init', 'psu_sitewide_tags_prevent_revision');
}

function psu_sitewide_tags_prevent_revision() {
    if (function_exists('get_sitewide_tags_option')) {

        add_filter('wp_revisions_to_keep', 'psu_sitewide_tags_no_revisions_on_tags_blog', 100);

        function psu_sitewide_tags_no_revisions_on_tags_blog($num) {
            global $blog_id;
            if ($blog_id == get_sitewide_tags_option('tags_blog_id')) {
                $num = 0;
                // no revisions on the tags blog!
            }
            return $num;
        }

// end function 
    } //end function exists
}

// end function