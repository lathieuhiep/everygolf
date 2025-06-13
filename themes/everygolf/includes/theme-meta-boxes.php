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

// require block CMB
require get_theme_file_path( '/includes/meta-boxes/blocks/block-about-hero.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-about-history.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-about-info.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-coach.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-count-up.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-course.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-indoor-space.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-partner.php' );
require get_theme_file_path( '/includes/meta-boxes/blocks/block-slide.php' );

// Register custom meta boxes for coach
const PREFIX_CMB_CPT_COACH = 'cmb_cpt_coach_';

require get_theme_file_path( '/includes/meta-boxes/cpt-coach-mb.php' );

// Register custom meta boxes tpl home
const template_home = 'page-templates/page-home.php';
const PREFIX_CMB_PAGE_HOME_HERO = 'cmb_page_home_hero_';
const PREFIX_CMB_PAGE_HOME_ABOUT_INFO = 'cmb_page_home_about_info_';
const PREFIX_CMB_PAGE_HOME_COURSE = 'cmb_page_home_course_';
const PREFIX_CMB_PAGE_HOME_NUMBERS = 'cmb_page_home_numbers_';
const PREFIX_CMB_PAGE_HOME_COACH = 'cmb_page_home_coach_';
const PREFIX_CMB_PAGE_HOME_INDOOR_SPACE = 'cmb_page_home_indoor_space_';

require get_theme_file_path( '/includes/meta-boxes/page-home-mb.php' );

// Register custom meta boxes tpl about us
const template_about_us = 'page-templates/page-about-us.php';
const PREFIX_CMB_PAGE_ABOUT_US_HERO = 'cmb_page_about_us_hero_';
const PREFIX_CMB_PAGE_ABOUT_US_NUMBERS = 'cmb_page_about_us_numbers_';
const PREFIX_CMB_PAGE_ABOUT_US_INFO = 'cmb_page_about_us_info_';
const PREFIX_CMB_PAGE_ABOUT_US_HISTORY = 'cmb_page_about_us_history_';
const PREFIX_CMB_PAGE_ABOUT_US_PARTNER = 'cmb_page_about_us_partner_';
const PREFIX_CMB_PAGE_ABOUT_US_COURSE = 'cmb_page_about_us_course_';
const PREFIX_CMB_PAGE_ABOUT_US_COACH = 'cmb_page_about_us_coach_';

require get_theme_file_path( '/includes/meta-boxes/page-about-us-mb.php' );