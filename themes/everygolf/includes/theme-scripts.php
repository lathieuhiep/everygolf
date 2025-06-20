<?php
if (!defined('ABSPATH')) {
    exit;
}

// Remove jquery migrate
add_action('wp_default_scripts', 'everygolf_remove_jquery_migrate');
function everygolf_remove_jquery_migrate($scripts): void
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) {
            $script->deps = array_diff($script->deps, array('jquery-migrate'));
        }
    }
}

// Remove WordPress block library CSS from loading on the front-end
function everygolf_remove_wp_block_library_css(): void
{
    // remove style gutenberg
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('classic-theme-styles');

    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('storefront-gutenberg-blocks');
}

add_action('wp_enqueue_scripts', 'everygolf_remove_wp_block_library_css', 100);

function custom_enqueue_jquery_first() {
    if ( ! is_admin() ) {
        // deregister the default jQuery
        wp_deregister_script( 'jquery' );

        // register and enqueue the jQuery script
        wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.min.js' ), array(), null, true );
        wp_enqueue_script( 'jquery' );
    }
}
add_action( 'wp_enqueue_scripts', 'custom_enqueue_jquery_first', 1 );


// Enqueue scripts and styles
function everygolf_enqueue_scripts(): void
{
    // enqueue swiper
    wp_enqueue_style('swiper', get_theme_file_uri('/assets/libs/swiper/swiper.min.css'), array(), wp_get_theme()->get('Version'));
    wp_enqueue_script('swiper', get_theme_file_uri('/assets/libs/swiper/swiper.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // enqueue slimselect
    wp_enqueue_style('slimselect', get_theme_file_uri('/assets/libs/slimselect/slimselect.css'), array(), wp_get_theme()->get('Version'));
    wp_enqueue_script('slimselect', get_theme_file_uri('/assets/libs/slimselect/slimselect.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // enqueue fancyBox
    wp_enqueue_style('fancyBox', get_theme_file_uri('/assets/libs/fancyBox/fancybox.css'), array(), wp_get_theme()->get('Version'));
    wp_enqueue_script('fancyBox', get_theme_file_uri('/assets/libs/fancyBox/fancybox.umd.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // enqueue style main
    wp_enqueue_style('main', get_theme_file_uri('/assets/css/main.min.css'), array(), wp_get_theme()->get('Version'));

    // enqueue style page 404
    if (is_404()) {
        wp_enqueue_style('page-404', get_theme_file_uri('/assets/css/page-templates/page-404.min.css'), array(), wp_get_theme()->get('Version'));
    }

    // enqueue lenis
    wp_enqueue_script('lenis', get_theme_file_uri('/assets/libs/lenis/lenis.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // enqueue wow.js
    wp_enqueue_script('wow', get_theme_file_uri('/assets/libs/wow/wow.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // enqueue greensock
    wp_enqueue_script('GSAP', get_theme_file_uri('/assets/libs/greensock/GSAP.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);
    wp_enqueue_script('ScrollTrigger', get_theme_file_uri('/assets/libs/greensock/ScrollTrigger.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);
    wp_enqueue_script('SplitText', get_theme_file_uri('/assets/libs/greensock/SplitText.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);
    wp_enqueue_script('TextPlugin', get_theme_file_uri('/assets/libs/greensock/TextPlugin.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // enqueue headroom
    wp_enqueue_script('headroom', get_theme_file_uri('/assets/libs/headroom/headroom.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // enqueue mouse-follower
    wp_enqueue_script('mouse-follower', get_theme_file_uri('/assets/libs/mouse-follower/mouse-follower.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // enqueue main script
    wp_enqueue_script('functions-script', get_theme_file_uri('/assets/js/functions.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // Enqueue comment-reply script if needed
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'everygolf_enqueue_scripts');