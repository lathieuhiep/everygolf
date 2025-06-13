<?php
// require mb helpers
require get_theme_file_path( '/includes/meta-boxes/mb-helpers.php' );

// require block CMB
require get_theme_file_path( '/includes/meta-boxes/blocks/block-about-hero.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-about-history.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-about-info.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-banner-hero.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-coach.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-count-up.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-course.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-indoor-space.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-partner.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-slide.php' );

// Register custom meta boxes for coach
require get_theme_file_path( '/includes/meta-boxes/cpt-coach-mb.php' );

// Register custom meta boxes for academy
require get_theme_file_path( '/includes/meta-boxes/cpt-academy-mb.php' );

// Register custom meta boxes page
require get_theme_file_path( '/includes/meta-boxes/page-mb.php' );

// Register custom meta boxes tpl home
require get_theme_file_path( '/includes/meta-boxes/page-home-mb.php' );

// Register custom meta boxes tpl about us
require get_theme_file_path( '/includes/meta-boxes/page-about-us-mb.php' );

// Register custom meta boxes tpl academy
require get_theme_file_path( '/includes/meta-boxes/page-academy-mb.php' );