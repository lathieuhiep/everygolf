<?php
/*
Template Name: Trang chủ
*/

get_header();
?>

<main class="page-content">
    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/home/inc', 'hero' );
            get_template_part( 'template-parts/home/inc', 'about-info' );
        endwhile;
        the_posts_pagination();
    endif;
    ?>
</main>

<?php
get_footer();