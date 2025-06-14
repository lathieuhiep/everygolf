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

// Required: Post Types
require get_parent_theme_file_path( '/includes/cpt/cpt-coach.php' );
require get_parent_theme_file_path( '/includes/cpt/cpt-academy.php' );
require get_parent_theme_file_path( '/includes/cpt/cpt-facility.php' );

// Required: Theme Options
require get_theme_file_path( '/includes/theme-options.php' );

// Required: Theme Meta Boxes
require get_parent_theme_file_path( '/includes/theme-meta-boxes.php' );