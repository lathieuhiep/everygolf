<?php
/*
Template Name: Tin tức
*/

get_header();

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
<?php
    endwhile;
    the_posts_pagination();
endif;

get_footer();