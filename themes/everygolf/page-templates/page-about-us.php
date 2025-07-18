<?php
/*
Template Name: Về chúng tôi
*/

get_header();

get_template_part( 'template-parts/about-us/inc', 'hero' );

get_template_part( 'template-parts/components/inc', 'count-up', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_ABOUT_US_NUMBERS,
    'class' => 'style-2'
) );

get_template_part( 'template-parts/components/inc', 'about-info', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_ABOUT_US_INFO
) );

get_template_part( 'template-parts/about-us/inc', 'about-history' );

get_template_part( 'template-parts/components/inc', 'block-partner', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_ABOUT_US_PARTNER
) );

get_template_part( 'template-parts/components/inc', 'course', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_ABOUT_US_COURSE
) );

get_template_part( 'template-parts/components/inc', 'team-slider', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_ABOUT_US_COACH
) );

get_footer();