<?php get_header(); ?>

<main class="page-content">
    <?php
    $elementor_edit_mode = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

    if ( $elementor_edit_mode ) {
        get_template_part( 'template-parts/page/content', 'page-elementor' );
    } else {
        get_template_part( 'template-parts/page/content', 'page' );
    }
    ?>
</main>

<?php get_footer(); ?>