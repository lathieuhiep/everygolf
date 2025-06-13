<?php
// check if CMB2 is loaded
function everygolf_cmb2_show_if_page_template_in( array $template_files ): Closure
{
    return function( $cmb ) use ( $template_files ) {
        if ( ! isset( $_GET['post'] ) ) return false;

        $template = get_page_template_slug( $_GET['post'] );
        return in_array( $template, $template_files );
    };
}

function everygolf_cmb_get_query($prefix_cmb, $post_type): WP_Query
{
    // option query
    $limit = intval(get_post_meta(get_the_ID(), $prefix_cmb . 'limit', true));
    $order_by = get_post_meta(get_the_ID(), $prefix_cmb . 'order_by', true);
    $order = get_post_meta(get_the_ID(), $prefix_cmb . 'order', true);
    $ids = get_post_meta(get_the_ID(), $prefix_cmb . 'select_coaches', true);

    $args = array(
        'post_type' => $post_type,
        'ignore_sticky_posts' => true,
    );

    if (!empty($ids) && is_array($ids)) {
        $args['post__in'] = $ids;
        $args['orderby'] = 'post__in';
        $args['posts_per_page'] = -1;
    } else {
        $args['posts_per_page'] = $limit > 0 ? $limit : 4;
        $args['orderby'] = $order_by ?: 'ID';
        $args['order'] = $order ?: 'ASC';
    }

    return new WP_Query( $args );
}