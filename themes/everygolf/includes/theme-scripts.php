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
    // enqueue style
    wp_enqueue_style('bundle-style', get_theme_file_uri('/assets/css/bundle.min.css'), array(), wp_get_theme()->get('Version'));

    // enqueue style page 404
    if (is_404()) {
        wp_enqueue_style('page-404', get_theme_file_uri('/assets/css/page-templates/page-404.min.css'), array(), wp_get_theme()->get('Version'));
    }

    // enqueue main script
    wp_enqueue_script('bundle-script', get_theme_file_uri('/assets/js/bundle.min.js'), array('jquery'), wp_get_theme()->get('Version'), true);

    // Enqueue comment-reply script if needed
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'everygolf_enqueue_scripts');