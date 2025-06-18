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

// Enqueue scripts and styles
function everygolf_enqueue_scripts(): void
{
    // enqueue icon every-golf
    wp_enqueue_style('everygolf-style', get_theme_file_uri('/assets/fonts/everygolf-v1.0/style.css'), array(), wp_get_theme()->get('Version'));

    // enqueue style libs
    wp_enqueue_style('swiper-style', get_theme_file_uri('/assets/lib/swiper/swiper.min.css'), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('slimselect-style', get_theme_file_uri('/assets/lib/slimselect/slimselect.css'), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style('fancybox-style', get_theme_file_uri('/assets/lib/fancyBox/fancybox.css'), array(), wp_get_theme()->get('Version'));

    // enqueue style
    wp_enqueue_style('main-style', get_theme_file_uri('/assets/css/main.min.css'), array(), wp_get_theme()->get('Version'));

    // enqueue style page 404
    if (is_404()) {
        wp_enqueue_style('page-404', get_theme_file_uri('/assets/css/page-templates/page-404.min.css'), array(), wp_get_theme()->get('Version'));
    }

    // enqueue script libs
    wp_enqueue_script('lenis-script', get_theme_file_uri('/assets/lib/lenis/lenis.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    wp_enqueue_script('wow-script', get_theme_file_uri('/assets/lib/wow/wow.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    wp_enqueue_script('slimselect-script', get_theme_file_uri('/assets/lib/slimselect/slimselect.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    wp_enqueue_script('greensock-script', get_theme_file_uri('/assets/lib/greensock/GSAP.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);
    wp_enqueue_script('ScrollTrigger-script', get_theme_file_uri('/assets/lib/greensock/ScrollTrigger.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);
    wp_enqueue_script('TextPlugin-script', get_theme_file_uri('/assets/lib/greensock/TextPlugin.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);
    wp_enqueue_script('SplitText-script', get_theme_file_uri('/assets/lib/greensock/SplitText.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    wp_enqueue_script('headroom-script', get_theme_file_uri('/assets/lib/headroom/headroom.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    wp_enqueue_script('swiper-script', get_theme_file_uri('/assets/lib/swiper/swiper.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    wp_enqueue_script('fancyBox-script', get_theme_file_uri('/assets/lib/fancyBox/fancybox.umd.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    wp_enqueue_script('mouse-follower-script', get_theme_file_uri('/assets/lib/mouse-follower/mouse-follower.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // enqueue main script
    wp_enqueue_script('functions-script', get_theme_file_uri('/assets/js/functions.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // Enqueue comment-reply script if needed
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'everygolf_enqueue_scripts');