<?php
/*
Template Name: Về chúng tôi
*/

get_header();
?>

    <main class="page-content">
        <?php if ( have_posts() ) :

            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/home/inc', 'main-slider' );
            endwhile;

            the_posts_pagination();
        endif;
        ?>
    </main>

<?php
get_footer();