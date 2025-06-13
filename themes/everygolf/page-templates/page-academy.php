<?php
/*
Template Name: Học viện
*/

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part( 'template-parts/components/inc', 'banner-hero', array(
            'prefix_cmb' => PREFIX_CMB_PAGE_ACADEMY['hero']
        ) );
    endwhile;
    the_posts_pagination();
endif;

get_footer();