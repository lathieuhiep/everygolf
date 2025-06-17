<?php
/*
Template Name: Học & Luyện tập
*/

get_header();

get_template_part( 'template-parts/tpl-learn-practice/inc', 'learn-course', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_LEARN_PRACTICE_HERO,
) );

get_template_part( 'template-parts/tpl-learn-practice/inc', 'course-list', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_LEARN_PRACTICE_COURSE,
) );

get_footer();