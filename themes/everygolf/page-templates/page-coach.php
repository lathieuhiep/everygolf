<?php
/*
Template Name: Đội ngũ
*/

get_header();
?>
<main class="page-content">
    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post();

        endwhile;
        the_posts_pagination();
    endif;
    ?>
</main>
<?php
get_footer();