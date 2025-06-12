<?php
/*
Template Name: Học viện
*/

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();

    endwhile;
    the_posts_pagination();
endif;

get_footer();