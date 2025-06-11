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
            get_template_part( 'template-parts/home/inc', 'course' );
            get_template_part( 'template-parts/home/inc', 'numbers' );
            get_template_part( 'template-parts/home/inc', 'coach' );
        endwhile;
        the_posts_pagination();
    endif;
    ?>
</main>
<?php
get_footer();