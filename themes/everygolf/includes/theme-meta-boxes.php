<?php
// require mb helpers
require get_theme_file_path( '/includes/meta-boxes/mb-helpers.php' );

// require block CMB
require get_theme_file_path( '/includes/meta-boxes/blocks/block-about-hero.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-about-history.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-about-info.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-banner-hero.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-count-up.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-course.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-img-grid.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-indoor-space.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-partner.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-query.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-slide.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-contact-info.php' );

// require fields base
require get_theme_file_path( '/includes/meta-boxes/cmb-field-base.php' );

// Register custom meta boxes cpt
require get_theme_file_path( '/includes/meta-boxes/cpt-coach-mb.php' );
require get_theme_file_path( '/includes/meta-boxes/cpt-facility-mb.php' );
require get_theme_file_path( '/includes/meta-boxes/cpt-setup-space-mb.php' );

// Register custom meta boxes page
require get_theme_file_path( '/includes/meta-boxes/page-mb.php' );
require get_theme_file_path( '/includes/meta-boxes/page-home-mb.php' );
require get_theme_file_path( '/includes/meta-boxes/page-about-us-mb.php' );
require get_theme_file_path( '/includes/meta-boxes/page-academy-mb.php' );
require get_theme_file_path( '/includes/meta-boxes/page-coach-mb.php' );
require get_theme_file_path( '/includes/meta-boxes/page-learn-practice-mb.php' );
require get_theme_file_path( '/includes/meta-boxes/page-setup-space-mb.php' );
require get_theme_file_path( '/includes/meta-boxes/page-contact-mb.php' );