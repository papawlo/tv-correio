<?php

require_once(get_template_directory() . "/theme_customizer.php");

function correio_image_full_quality($arg) {
    return (int) 100;
}

add_filter('jpeg_quality', 'correio_image_full_quality');
add_filter('wp_editor_set_quality', 'correio_image_full_quality');

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="lt-load-more-link"';
}

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

add_filter('wpcf7_form_class_attr', 'your_custom_form_class_attr');

function your_custom_form_class_attr($class) {
    $class .= ' contact-form lt-form';
    return $class;
}

function geral_theme_setup() {

    // Add Thumbnail Theme Support
    // Desktop
    add_theme_support('post-thumbnails');
    add_image_size('thumb-375x270', 375, 270, true);
    add_image_size('thumb-375x310', 375, 310, true);
    add_image_size('thumb-234x145', 234, 145, true);
    add_image_size('thumb-750x400', 750, 400, true);              // Home - Slider
    add_image_size('thumb-186x114', 186, 114, true);              // Home - Slider Thumb
    add_image_size('thumb-360x229', 360, 229, true);              // Home, Noticias, Videos - Imagem do video e da noticia 
    add_image_size('thumb-245x154', 245, 154, true);              // Programação - Imagem do programa    
    add_image_size('thumb-1140x450', 1140, 450, true);            // Comercial - Imagem do video de comercial
    add_image_size('thumb-170', 170, 170, true);              // Sidebar - Imagem do programa    
    add_image_size('thumb-106x132', 106, 132, true);
    add_image_size('thumb-165x132', 165, 132, true);            //listagem de noticias
    // Mobile
    add_image_size('thumb-129x132', 129, 132, true);              // Home Videos - Listagem mini
    add_image_size('thumb-120', 120, 120, true);                  // Home Slider
    //add_image_size('thumb-375x310', 375, 310, true);              // Archive Receitas - main
    add_image_size('thumb-129x220', 129, 220, true);              // Archive Receitas - mini
    add_image_size('thumb-375x400', 375, 400, true);              // Single  Receitas slides Big
    add_image_size('thumb-106x115', 106, 115, true);              // Single Receitas slides mini
    add_image_size('thumb-90x64', 90, 64, true);              // Resultado de Busca [page-busca.php]
    //
//    require_once 'includes/post-types.php';
}

add_action('after_setup_theme', 'geral_theme_setup');

function load_scripts() {
    if (!is_admin()) {
//    wp_enqueue_script('jquery');
//    wp_enqueue_script('jquery-ui-core');
//    wp_enqueue_script('jquery-ui-widget');
//    wp_enqueue_script('jquery-ui-position');
//    wp_enqueue_script('jquery-ui-menu');
        wp_enqueue_script('jquery-ui-selectmenu');
        wp_enqueue_script('jquery-ui-datepicker');

// Enqueue the modernizr script file and specify that it should be placed in the <head>
        wp_enqueue_script('modernizr', get_template_directory_uri() . '/public/vendor/modernizr/modernizr.js', array(), '2.8.3', false);

        wp_register_script('cycle2', get_template_directory_uri() . '/public/vendor/jquery.cycle2.min/index.js', array('jquery'), null, true);
        wp_register_script('sharrre', get_template_directory_uri() . '/public/vendor/Sharrre/jquery.sharrre.min.js', array('jquery'), null, true);
        //wp_register_script( 'ias', 'http://infiniteajaxscroll.com/vendor/jquery-ias/dist/jquery-ias.min.js', array('jquery'), null, true );
        wp_register_script('jscroll', get_template_directory_uri() . '/public/vendor/jscroll/jquery.jscroll.js', array('jquery'), null, true);
        wp_register_script('jquery.svg', get_template_directory_uri() . '/public/js/jquery.svg.min.js', array('jquery'), null, true);


        wp_enqueue_style('jquery-ui-style', '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css');
        wp_register_style('correio-main-style', get_template_directory_uri() . '/public/css/main.css');
        wp_enqueue_style('correio-main-style');
    }
}

add_action('wp_enqueue_scripts', 'load_scripts');

function _get_attachment_id($url) {
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$url'";
    $id = $wpdb->get_var($query);
    return $id;
}

function get_the_term($id = 0, $tax, $obj = false) {
    $terms = get_the_terms($id, $tax);
    $term = array_shift($terms);
    return ($obj == true) ? $term : $term->name;
}

function get_load_more_posts_link($label = null, $max_page = 0, $page = null) {
    global $paged, $wp_query;

    if (!$max_page)
        $max_page = $wp_query->max_num_pages;

    if (!$paged)
        $paged = 1;

    $nextpage = intval($paged) + 1;

    if (null === $label)
        $label = __('Next Page &raquo;');

    if (!is_single() && ( $nextpage <= $max_page )) {
        $attr = apply_filters('next_posts_link_attributes', '');
        $result = '<a href="' . next_posts($max_page, false) . "\" $attr>" . preg_replace('/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label) . '</a>';

        if ($page) {
            $result = str_replace(get_site_url(), get_site_url() . "/" . $page, $result);
        } else {
            $result = str_replace("global-posts/correio/", '', $result);
        }

        return $result;
    }
}

function _wp_get_sites($args = array()) {
    global $wpdb;

    if (wp_is_large_network())
        return array();

    $defaults = array(
        'network_id' => $wpdb->siteid,
        'public' => null,
        'archived' => null,
        'mature' => null,
        'spam' => null,
        'deleted' => null,
        'limit' => 100,
        'offset' => 0,
        'orderby' => 'blog_id ASC',
    );

    $args = wp_parse_args($args, $defaults);

    $query = "SELECT * FROM $wpdb->blogs WHERE 1=1 ";

    if (isset($args['network_id']) && ( is_array($args['network_id']) || is_numeric($args['network_id']) )) {
        $network_ids = implode(',', wp_parse_id_list($args['network_id']));
        $query .= "AND site_id IN ($network_ids) ";
    }

    if (isset($args['public']))
        $query .= $wpdb->prepare("AND public = %d ", $args['public']);

    if (isset($args['archived']))
        $query .= $wpdb->prepare("AND archived = %d ", $args['archived']);

    if (isset($args['mature']))
        $query .= $wpdb->prepare("AND mature = %d ", $args['mature']);

    if (isset($args['spam']))
        $query .= $wpdb->prepare("AND spam = %d ", $args['spam']);

    if (isset($args['deleted']))
        $query .= $wpdb->prepare("AND deleted = %d ", $args['deleted']);

    if (isset($args['orderby'])) {
        $query .= "ORDER BY {$args['orderby']} ";
    }

    if (isset($args['limit']) && $args['limit']) {
        if (isset($args['offset']) && $args['offset'])
            $query .= $wpdb->prepare("LIMIT %d , %d ", $args['offset'], $args['limit']);
        else
            $query .= $wpdb->prepare("LIMIT %d ", $args['limit']);
    }

    $site_results = $wpdb->get_results($query, ARRAY_A);

    return $site_results;
}

function get_ms_option($option, $default = '', $site_id) {
    switch_to_blog($site_id);
    $value = get_option($option, $default);
    restore_current_blog();
    return $value;
}

function get_ms_theme_mod($option, $default = '', $site_id) {
    switch_to_blog($site_id);
    $value = get_theme_mod($option, $default);
    restore_current_blog();
    return $value;
}

function get_all_most_popular() {
    Global $wpdb;
    $now = current_time('mysql');
    $query = "SELECT ID, blogid, pageviews FROM (SELECT p.*, 1 as blogid, s.last_viewed, IFNULL(SUM(s.pageviews), 0) AS pageviews, s.postid FROM wp_popularpostssummary AS s LEFT JOIN wp_posts p ON p.ID = s.postid WHERE s.last_viewed > DATE_SUB('{$now}', INTERVAL 1 WEEK) GROUP BY s.postid";
//    $list = _wp_get_sites(array('public' => '1', 'orderby' => 'domain ASC, path ASC', 'offset' => '1'));
    $sites_args = array(
        'network_id' => $wpdb->siteid,
        'public' => true,
        'archived' => false,
        'mature' => null,
        'spam' => null,
        'deleted' => false,
        'limit' => 100,
        'offset' => 0,
    );
    $list = wp_get_sites($sites_args);
    foreach ($list as $blog) {
        $query .= " UNION SELECT p.*, {$blog['blog_id']} as blogid, s.last_viewed, IFNULL(SUM(s.pageviews), 0) AS pageviews, s.postid FROM wp_{$blog['blog_id']}_popularpostssummary AS s LEFT JOIN wp_{$blog['blog_id']}_posts p ON p.ID = s.postid WHERE s.last_viewed > DATE_SUB('{$now}', INTERVAL 1 WEEK) GROUP BY s.postid";
    }
    $query .= ") as v WHERE post_type = 'post' AND post_password = '' AND post_status = 'publish' ORDER BY pageviews DESC LIMIT 5";
    $posts = $wpdb->get_results($query, OBJECT);
    return $posts;
}

function get_all_most_popular_videos() {
    Global $wpdb;
    $now = current_time('mysql');
    $query = "SELECT ID, blogid, pageviews \n"
            . "FROM (\n";
//                . "SELECT p.*, 1 as blogid, s.last_viewed, IFNULL(SUM(s.pageviews), 0) AS pageviews, s.postid \n"
//                . "FROM wp_popularpostssummary AS s \n"
//                . "LEFT JOIN wp_posts p ON p.ID = s.postid \n"
//                . "WHERE s.last_viewed > DATE_SUB('{$now}', INTERVAL 1 WEEK) \n"
//            . "GROUP BY s.postid\n";


    $sites_args = array(
        'network_id' => $wpdb->siteid,
        'public' => true,
        'archived' => false,
        'mature' => null,
        'spam' => null,
        'deleted' => false,
        'limit' => 100,
        'offset' => 0,
    );
    $list = wp_get_sites($sites_args);

    $i = 0;
    foreach ($list as $blog) {
        if ($i !== 0) {
            $query .= " UNION SELECT p.*, {$blog['blog_id']} as blogid, s.last_viewed, IFNULL(SUM(s.pageviews), 0) AS pageviews, s.postid FROM wp_{$blog['blog_id']}_popularpostssummary AS s LEFT JOIN wp_{$blog['blog_id']}_posts p ON p.ID = s.postid WHERE s.last_viewed > DATE_SUB('{$now}', INTERVAL 1 WEEK) GROUP BY s.postid\n";
        } else {
            $query .= " SELECT p.*, {$blog['blog_id']} as blogid, s.last_viewed, IFNULL(SUM(s.pageviews), 0) AS pageviews, s.postid FROM wp_{$blog['blog_id']}_popularpostssummary AS s LEFT JOIN wp_{$blog['blog_id']}_posts p ON p.ID = s.postid WHERE s.last_viewed > DATE_SUB('{$now}', INTERVAL 1 WEEK) GROUP BY s.postid\n";
        }
        $i++;
    }
    $query .= ") as v WHERE post_type = 'video' AND post_password = '' AND post_status = 'publish' ORDER BY pageviews DESC LIMIT 5";
//    echo $query;
//    $list = _wp_get_sites(array('public' => '1', 'orderby' => 'domain ASC, path ASC', 'offset' => '1'));
//    print_r($list);
//    exit();
    $posts = $wpdb->get_results($query, OBJECT);
    return $posts;
}

function get_all_most_popular_videos_by_program() {
    global $wpdb;


    $now = current_time('mysql');


    $query = "SELECT p.ID AS 'id', p.post_title AS 'title', p.post_date AS 'date', p.post_author AS 'uid', v.pageviews AS 'pageviews' \n"
            . "FROM (\n"
            . "SELECT postid, IFNULL(SUM(pageviews), 0) AS pageviews \n"
            . "FROM " . $wpdb->prefix . "popularpostssummary WHERE last_viewed > DATE_SUB('{$now}', INTERVAL 1 WEEK) \n"
            . "GROUP BY postid \n"
            . "ORDER BY pageviews DESC\n"
            . ") v \n"
            . "LEFT JOIN " . $wpdb->prefix . "posts p ON v.postid = p.ID \n"
            . "WHERE  p.post_type = 'video' \n"
            . "AND p.post_password = '' "
            . "AND p.post_status = 'publish' \n"
            . "LIMIT 5;";


    $posts = $wpdb->get_results($query, OBJECT);
    return $posts;
}

function get_all_most_popular_posts_by_program() {
    global $wpdb;

    $now = current_time('mysql');

    $query = "SELECT p.ID AS 'id', p.post_title AS 'title', p.post_date AS 'date', p.post_author AS 'uid', v.pageviews AS 'pageviews' \n"
            . "FROM (\n"
            . "SELECT postid, IFNULL(SUM(pageviews), 0) AS pageviews \n"
            . "FROM " . $wpdb->prefix . "popularpostssummary WHERE last_viewed > DATE_SUB('{$now}', INTERVAL 1 WEEK) \n"
            . "GROUP BY postid \n"
            . "ORDER BY pageviews DESC\n"
            . ") v \n"
            . "LEFT JOIN " . $wpdb->prefix . "posts p ON v.postid = p.ID \n"
            . "WHERE  p.post_type = 'post' \n"
            . "AND p.post_password = '' "
            . "AND p.post_status = 'publish' \n"
            . "LIMIT 5;";


    $posts = $wpdb->get_results($query, OBJECT);
    return $posts;
}

//contabiliza visita no singloe video
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page();
}

//remove [shortcod] dos excerpts
function remove_shortcode_from_get_the_excerpt($the_excerpt) {

    $the_excerpt = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $the_excerpt);  # strip shortcodes, keep shortcode content
    return $the_excerpt;
}

add_filter('get_the_excerpt', 'remove_shortcode_from_get_the_excerpt');

/* Pull apart OEmbed video link to get thumbnails out */

function get_video_thumbnail_uri($video_uri, $size = 'large', $removeHttp = false) {

    $thumbnail_uri = '';

    // determine the type of video and the video id
    $video = parse_video_uri($video_uri);


    // get youtube thumbnail
    if ($video['type'] == 'youtube')
        $thumbnail_uri = get_youtube_thumbnail_uri($video['id'], $size);

    // get vimeo thumbnail
    if ($video['type'] == 'vimeo')
        $thumbnail_uri = get_vimeo_thumbnail_uri($video['id'], $size);
    // get wistia thumbnail
    if ($video['type'] == 'wistia')
        $thumbnail_uri = get_wistia_thumbnail_uri($video_uri, $size);
    // get wistia thumbnail
    if ($video['type'] == 'dailymotion')
        $thumbnail_uri = get_dailymotion_thumbnail_uri($video['id'], $size);
    // get default/placeholder thumbnail
    if (empty($thumbnail_uri) || is_wp_error($thumbnail_uri))
        $thumbnail_uri = '';

    if ($removeHttp) {
        $thumbnail_uri = preg_replace("(^https?://)", "", $thumbnail_uri);
    }
    //return thumbnail uri
    return $thumbnail_uri;
}

/* Parse the video uri/url to determine the video type/source and the video id */

function parse_video_uri($url) {

    // Parse the url 
    $parse = parse_url($url);
//    print_r($parse);
//    var_dump($parse);
//    exit();
    // Set blank variables
    $video_type = '';
    $video_id = '';

    // Url is http://youtu.be/xxxx
    if ($parse['host'] == 'youtu.be') {

        $video_type = 'youtube';

        $video_id = ltrim($parse['path'], '/');
    }

    // Url is http://www.youtube.com/watch?v=xxxx 
    // or http://www.youtube.com/watch?feature=player_embedded&v=xxx
    // or http://www.youtube.com/embed/xxxx
    if (( $parse['host'] == 'youtube.com' ) || ( $parse['host'] == 'www.youtube.com' )) {

        $video_type = 'youtube';

        parse_str($parse['query']);

        $video_id = $v;

        if (!empty($feature))
            $video_id = end(explode('v=', $parse['query']));

        if (strpos($parse['path'], 'embed') == 1)
            $video_id = end(explode('/', $parse['path']));
    }

    // Url is http://www.vimeo.com
    if (( $parse['host'] == 'vimeo.com' ) || ( $parse['host'] == 'www.vimeo.com' )) {

        $video_type = 'vimeo';

        $video_id = ltrim($parse['path'], '/');
    }
    // Url is http://www.dailymotion.com
    if (( $parse['host'] == 'dailymotion.com' ) || ( $parse['host'] == 'www.dailymotion.com' )) {

        $video_type = 'dailymotion';

        $video_id = get_dailymotion_video_id($url);
    }
    $host_names = explode(".", $parse['host']);
    $rebuild = (!empty($host_names[1]) ? $host_names[1] : '') . '.' . (!empty($host_names[2]) ? $host_names[2] : '');
    // Url is an oembed url wistia.com
    if (( $rebuild == 'wistia.com' ) || ( $rebuild == 'wi.st.com' )) {

        $video_type = 'wistia';

        if (strpos($parse['path'], 'medias') == 1)
            $video_id = end(explode('/', $parse['path']));
    }

    // If recognised type return video array
    if (!empty($video_type)) {

        $video_array = array(
            'type' => $video_type,
            'id' => $video_id
        );

        return $video_array;
    } else {

        return false;
    }
}

/* Takes a Vimeo video/clip ID and calls the Vimeo API v2 to get the large thumbnail URL. */

function get_vimeo_thumbnail_uri($clip_id, $size = "large") {

    $sizes = array(
        'large' => "thumbnail_large", //640
        'medium' => "thumbnail_medium", //200x150                
        'small' => "thumbnail_small",
    );

    $vimeo_api_uri = 'http://vimeo.com/api/v2/video/' . $clip_id . '.json';
    $vimeo_response = wp_remote_get($vimeo_api_uri);
    if (is_wp_error($vimeo_response)) {
        return $vimeo_response;
    } else {
        $vimeo_response = unserialize($vimeo_response['body']);
        return $vimeo_response[0]['thumbnail_large'];
    }
}

/* Takes a wistia oembed url and gets the video thumbnail url. */

function get_wistia_thumbnail_uri($video_uri, $size = null) {
    if (empty($video_uri))
        return false;
    $wistia_api_uri = 'http://fast.wistia.com/oembed?url=' . $video_uri;
    $wistia_response = wp_remote_get($wistia_api_uri);
    if (is_wp_error($wistia_response)) {
        return $wistia_response;
    } else {
        $wistia_response = json_decode($wistia_response['body'], true);
        return $wistia_response['thumbnail_url'];
    }
}

/* Takes a dailymotion oembed url and gets the video thumbnail url. */

function get_dailymotion_thumbnail_uri($video_id, $size = 'large') {
    $sizes = array(
        'large' => 'thumbnail_large_url',
        'medium' => 'thumbnail_medium_url', //160x120
        'small' => 'thumbnail_small_url'
    );
    $thumbnail = json_decode(file_get_contents("https://api.dailymotion.com/video/" . $video_id . "?fields=" . $sizes[$size]));
    return $thumbnail->{$sizes[$size]};
}

function get_dailymotion_video_id($video_uri) {
    preg_match('/^.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/', $video_uri, $matches);

    if ($matches !== null) {
        if (isset($matches[4])) {
            return $matches[4];
        }
        return $matches[2];
    }
    return null;
}

function get_youtube_thumbnail_uri($video_id, $size = 'large') {
    $sizes = array(
        'extralarge' => 'maxresdefault.jpg', //Maximum Resolution Thumbnail (1920x1080 pixels)
        'large' => 'hqdefault.jpg', //High Quality Thumbnail (480x360 pixels)
        'medium' => 'mqdefault,jpg', //Medium Quality Thumbnail (320x180 pixels)
        'standard' => 'sddefault.jpg', //Standard Definition Thumbnail (640x480 pixels)
        'small' => 'default.jpg' //Normal Quality Thumbnail (120x90 pixels)
    );
    if ($size == 'large') {
        $thumb_url = 'http://img.youtube.com/vi/' . $video_id . '/maxresdefault.jpg';

        if (@getimagesize($thumb_url)) {
            return 'http://img.youtube.com/vi/' . $video_id . '/maxresdefault.jpg';
        }
    }

    return 'http://img.youtube.com/vi/' . $video_id . '/' . $sizes[$size];
}

/*
  baseado em https://wordpress.org/support/topic/get-first-url-from-custom-field-download-and-set-as-featured-image-on-post-publ
 *  */

function set_video_thumbnail_as_featured_image($post_id, $post, $update) {
    /*
     * In production code, $slug should be set only once in the plugin,
     * preferably as a class property, rather than in each function that needs it.
     */
    $slug = 'video';

    // If this isn't a 'book' post, don't update it.
    if ($slug != $post->post_type) {
        return;
    }

    // If this is just a revision, don't send the email.
    if (wp_is_post_revision($post_id))
        return;

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // only want to do this if the post has no thumbnail
    if (!has_post_thumbnail($post_id)) {


        // get the video url
        $video_url = get_post_meta($post_id, 'video_url', true);

        if ($video_url) {
            // build the thumbnail string
            $thumb_url = get_video_thumbnail_uri($video_url, 'large');

            // next, download the URL of the youtube image
            media_sideload_image($thumb_url, $post_id, "Thumbnail do vídeo " . $post->post_tile);

            // find the most recent attachment for the given post
            $attachments = get_posts(
                    array(
                        'post_type' => 'attachment',
                        'numberposts' => 1,
                        'order' => 'ASC',
                        'post_parent' => $post_id
                    )
            );
            $attachment = $attachments[0];

            // and set it as the post thumbnail
            set_post_thumbnail($post_id, $attachment->ID);
        }
    } // end if
    else {
        delete_transient("has_post_thumbnail");
    }
}

// set_youtube_as_featured_image
//add_action('save_post', 'set_video_thumbnail_as_featured_image', 10, 3);

function set_video_thumbnail_as_featured_image_for_receitas($post_id, $post, $update) {
    /*
     * In production code, $slug should be set only once in the plugin,
     * preferably as a class property, rather than in each function that needs it.
     */
    $slug = 'receita';

    // If this isn't a 'receita' post, don't update it.
    if ($slug != $post->post_type) {
        return;
    }

    // If this is just a revision, don't send the email.
    if (wp_is_post_revision($post_id))
        return;

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // only want to do this if the post has no thumbnail
    if (!has_post_thumbnail($post_id)) {

        $first_video = first_video_url($post->post_content);
        print_r($first_video);
        exit();


        $youtube_id = get_youtube_id($post->post_content);
        $thumb_url = get_youtube_thumbnail_uri($youtube_id);
        // build the thumbnail string
//        $youtube_thumb_url = 'http://img.youtube.com/vi/' . $youtube_id . '/0.jpg';
//          print_r($thumb_url);
//        exit();

        if ($thumb_url) {

            // next, download the URL of the youtube image
            media_sideload_image($thumb_url, $post_id, "Thumbnail do vídeo " . $post->post_tile);

            // find the most recent attachment for the given post
            $attachments = get_posts(
                    array(
                        'post_type' => 'attachment',
                        'numberposts' => 1,
                        'order' => 'ASC',
                        'post_parent' => $post_id
                    )
            );
            $attachment = $attachments[0];

            // and set it as the post thumbnail
            set_post_thumbnail($post_id, $attachment->ID);
        }
    } // end if
}

// set_youtube_as_featured_image
//add_action('save_post', 'set_video_thumbnail_as_featured_image_for_receitas', 10, 3);

function acf_set_featured_image($value, $post_id, $field) {

    if ($value != '') {
        // build the thumbnail string
        $thumb_url = get_video_thumbnail_uri($value, 'large');
        // next, download the URL of the youtube image
        media_sideload_image($thumb_url, $post_id, 'Sample video image.');

        // find the most recent attachment for the given post
        $attachments = get_posts(
                array(
                    'post_type' => 'attachment',
                    'numberposts' => 1,
                    'order' => 'ASC',
                    'post_parent' => $post_id
                )
        );
        $attachment = $attachments[0];

        // and set it as the post thumbnail
        set_post_thumbnail($post_id, $attachment->ID);
        //Add the value which is the image ID to the _thumbnail_id meta data for the current post
        add_post_meta($post_id, '_thumbnail_id', $attachment->ID);
    }

    return $value;
}

// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=video_url', 'acf_set_featured_image', 10, 3);

function get_youtube_id($content) {

    // find the youtube-based URL in the post
    $urls = array();
    preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $content, $urls);
    $youtube_url = $urls[0][0];

    // next, locate the youtube video id
    $youtube_id = '';
    if (strlen(trim($youtube_url)) > 0) {
        parse_str(parse_url($youtube_url, PHP_URL_QUERY));
        $youtube_id = $v;
    } // end if

    return $youtube_id;
}

// end get_youtube_id
// ONLY MOVIE CUSTOM TYPE POSTS
//add_filter('manage_video_posts_columns', 'ST4_columns_head_only_videos', 10);
//add_action('manage_video_posts_custom_column', 'ST4_columns_content_only_videos', 10, 2);
// 
//// CREATE TWO FUNCTIONS TO HANDLE THE COLUMN
//function ST4_columns_head_only_videos($defaults) {
//    $defaults['author'] = __('Author');
//    return $defaults;
//}
//function ST4_columns_content_only_videos($column_name, $post_id) {
//    if ($column_name == 'author') {
//       //get the page based on its post_id
//        $page = get_post($post_id);
//        if($page){
//            //get the main content area
//            $page_content = apply_filters('the_content', $page->post_content); 
//            echo $page_content;
//        }
//    }
//}

add_filter('manage_video_posts_columns', 'bs_video_table_head');

function bs_video_table_head($defaults) {
    $defaults['author'] = __('Author');
    return $defaults;
}

add_filter('manage_edit-video_sortable_columns', 'bs_video_table_sorting');

function bs_video_table_sorting($columns) {
    $columns['author'] = 'author';
    return $columns;
}

/* 
 * Faz a listagem de post de videos do ACF do site principal da correio na página home ser ordenado por data DESC (sério)
 * Editar página HOME
 * correio/wp-admin/post.php?post=102&action=edit
 * 
 */

function correio_relationship_query($args, $field, $post) {
    if (is_admin()) {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
    }
    return $args;
}

// para a selecao dos videos que vao para a HOME escolhida manualmente via edicao da pagina home do site principal
add_filter('acf/fields/relationship/query/key=field_554cc803ada11', 'correio_relationship_query', 10, 3);
// para a selecao dos posts que vao para a HOME escolhida manualmente via edicao da pagina home do site principal
add_filter('acf/fields/relationship/query/key=field_54d8c9d3b505e', 'correio_relationship_query', 10, 3);
