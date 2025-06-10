<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function everygolf_get_page_link_info_by_template_file( $template_slug ): bool|array
{
    if ( empty( $template_slug ) ) {
        return false;
    }

    $query = new WP_Query( array(
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'meta_key'       => '_wp_page_template',
        'meta_value'     => $template_slug,
        'no_found_rows'  => true,
        'cache_results'  => true,
    ) );

    if ( ! empty( $query->posts[0] ) ) {
        $page_id = $query->posts[0];
        return array(
            'url'   => get_permalink( $page_id ),
            'title' => get_the_title( $page_id ),
        );
    }

    return false;
}

// Link Pages
function everygolf_link_page(): void {
    wp_link_pages( array(
        'before'      => '<div class="page-links">' . esc_html__( 'Trang:', 'everygolf' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
    ) );
}