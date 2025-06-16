<?php
/*
Template Name: Học & Luyện tập
*/

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part( 'template-parts/tpl-learn-practice/inc', 'learn-course', array(
            'prefix_cmb' => PREFIX_CMB_PAGE_LEARN_PRACTICE_HERO,
        ) );

        get_template_part( 'template-parts/tpl-learn-practice/inc', 'course-list', array(
            'prefix_cmb' => PREFIX_CMB_PAGE_LEARN_PRACTICE_COURSE_LIST,
        ) );
    endwhile;
    the_posts_pagination();
endif;

get_footer();