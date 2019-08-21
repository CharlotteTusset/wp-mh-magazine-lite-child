<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
    }
    add_action('upload_mimes', 'add_file_types_to_uploads');


function mh_magazine_lite_setup() {
    load_theme_textdomain('mh-magazine-lite', get_template_directory() . '/languages');
    add_filter('use_default_gallery_style', '__return_false');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header', array('default-image' => '', 'default-text-color' => '000', 'width' => 1080, 'height' => 250, 'flex-width' => true, 'flex-height' => true));
    add_theme_support('custom-logo', array('width' => 300, 'height' => 100, 'flex-width' => true, 'flex-height' => true));
    add_theme_support('customize-selective-refresh-widgets');
    register_nav_menu('main_nav', esc_html__('Main Navigation', 'mh-magazine-lite'));
    add_editor_style();
}

function mh_magazine_lite_scripts() {
    global $mh_magazine_lite_version;
    wp_enqueue_style('mh-google-fonts', 'https://fonts.googleapis.com/css?family=Crimson+Text|Montserrat&display=swap', array(), null);
    wp_enqueue_style('mh-magazine-lite', get_stylesheet_uri(), false, $mh_magazine_lite_version);
    wp_enqueue_style('mh-font-awesome', get_template_directory_uri() . '/includes/font-awesome.min.css', array(), null);
    wp_enqueue_script('mh-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), $mh_magazine_lite_version);
    if (is_singular() && comments_open() && get_option('thread_comments') == 1) {
        wp_enqueue_script('comment-reply');
    }
}

?>