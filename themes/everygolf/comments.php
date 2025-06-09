<?php
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php
    if ( have_comments() ) :
        echo '<h2 class="comments-title">' . get_comments_number() . ' bình luận</h2>';
        wp_list_comments( array(
            'style'      => 'ul',
            'short_ping' => true,
        ) );
        the_comments_pagination();
    endif;

    comment_form();
    ?>
</div>
