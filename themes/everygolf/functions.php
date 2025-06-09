<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


// Required: Plugin Activation
require get_parent_theme_file_path( '/includes/class-tgm-plugin-activation.php' );
require get_parent_theme_file_path( '/includes/plugin-activation.php' );

// Required: Theme functions
require get_parent_theme_file_path( '/includes/theme-setup.php' );
require get_parent_theme_file_path( '/includes/theme-scripts.php' );
require get_parent_theme_file_path( '/includes/theme-hooks.php' );
require get_parent_theme_file_path( '/includes/theme-sidebar.php' );
require get_parent_theme_file_path( '/includes/theme-functions.php' );

require get_parent_theme_file_path( '/includes/meta-boxes/page-mb.php' );