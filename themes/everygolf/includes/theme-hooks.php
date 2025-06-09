<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
 * Action
 * */

// optimize WordPress
add_action('init', 'blank_wp_optimize_wordpress');
function blank_wp_optimize_wordpress(): void {
    // Disable WordPress Emoji
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'blank_wp_disable_emojis_tinymce' );

    // Disable WordPress REST API links
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('template_redirect', 'rest_output_link_header', 11);

    // Disable RSD link and WLW manifest link
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');

    // Disable WordPress version
    remove_action('wp_head', 'wp_generator');
}

function blank_wp_disable_emojis_tinymce( $plugins ): array {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/*
 * Filter
 * */

// disable WordPress xmlrpc
add_filter('xmlrpc_enabled', '__return_false');

// disable gutenberg editor
add_filter("use_block_editor_for_post_type", "blank_wp_disable_gutenberg_editor");
function blank_wp_disable_gutenberg_editor(): bool {
    return false;
}

// disable gutenberg widgets
add_filter('use_widgets_block_editor', '__return_false');