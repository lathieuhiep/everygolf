<?php
/*
Template Name: Trang chủ
*/

get_header();

get_template_part( 'template-parts/home/inc', 'hero' );

get_template_part( 'template-parts/components/inc', 'about-info', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_HOME_ABOUT_INFO
) );

get_template_part( 'template-parts/components/inc', 'course', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_HOME_COURSE
) );

get_template_part( 'template-parts/components/inc', 'count-up', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_HOME_NUMBERS
) );

get_template_part( 'template-parts/home/inc', 'coach' );

get_template_part( 'template-parts/home/inc', 'indoor-space' );

get_footer();