<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function everygolf_setup(): void
{
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'main_menu' => esc_html__( 'Menu chính', 'everygolf' ),
            'main_mobile_menu' => esc_html__( 'Menu chính (Mobile)', 'everygolf' ),
            'footer_menu' => esc_html__( 'Menu chân trang', 'everygolf' )
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Load textdomain
    load_theme_textdomain( 'everygolf', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'everygolf_setup' );