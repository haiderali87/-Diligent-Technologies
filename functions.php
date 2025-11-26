<?php
/**
 * Functions file for Diligent Technologies Theme
 *
 * @package diligent-technologies-theme
 */

// -----------------------------------------------------------------------------
// 1. Load Text Domain for Translations
// -----------------------------------------------------------------------------
function dt_theme_load_textdomain() {
    load_theme_textdomain( 'diligent-technologies-theme', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'dt_theme_load_textdomain' );


// -----------------------------------------------------------------------------
// 2. Theme Supports
// -----------------------------------------------------------------------------
function dt_theme_setup() {

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage document title
    add_theme_support( 'title-tag' );

    // Enable featured images
    add_theme_support( 'post-thumbnails' );

    // HTML5 markup support
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

    // Enable wide alignment options for Gutenberg
    add_theme_support( 'align-wide' );

    // Add custom logo support
    add_theme_support( 'custom-logo' );

    // Register navigation menus
    register_nav_menus( array(
        'primary_menu'   => __( 'Primary Menu', 'diligent-technologies-theme' ),
        'footer_menu'    => __( 'Footer Menu', 'diligent-technologies-theme' ),
    ) );

}
add_action( 'after_setup_theme', 'dt_theme_setup' );


// -----------------------------------------------------------------------------
// 3. Enqueue Theme Styles & Scripts
// -----------------------------------------------------------------------------
function dt_theme_enqueue_scripts() {

    // CSS
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), '5.3.2' );
    wp_enqueue_style( 'dt-style', get_stylesheet_uri(), array('bootstrap-css'), filemtime( get_template_directory() . '/style.css' ) );

    // JS
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.2', true );

}
add_action( 'wp_enqueue_scripts', 'dt_theme_enqueue_scripts' );


// -----------------------------------------------------------------------------
// 4. Include Theme Files (CPT, Taxonomies, Widgets, Shortcodes, Options)
// -----------------------------------------------------------------------------
define( 'DT_THEME_DIR', get_template_directory() );

require_once DT_THEME_DIR . '/inc/post-types.php';
require_once DT_THEME_DIR . '/inc/taxonomies.php';
require_once DT_THEME_DIR . '/inc/shortcodes.php';
require_once DT_THEME_DIR . '/inc/theme-options.php';
require_once DT_THEME_DIR . '/inc/widgets.php';


// -----------------------------------------------------------------------------
// 5. Clean Up the Head Section (optional but professional)
// -----------------------------------------------------------------------------
remove_action( 'wp_head', 'wp_generator' ); 
remove_action( 'wp_head', 'rsd_link' ); 
remove_action( 'wp_head', 'wlwmanifest_link' );


// -----------------------------------------------------------------------------
// 6. Disable Gutenberg on Widgets (for cleaner widget management)
// -----------------------------------------------------------------------------
add_filter( 'use_widgets_block_editor', '__return_false' );

