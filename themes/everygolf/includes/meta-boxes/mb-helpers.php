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