<?php
$logo = everygolf_get_option( 'opt_general_logo' );
?>

<div class="header__logo">
    <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
        <?php
        if ( ! empty( $logo['id'] ) ) :
            echo wp_get_attachment_image( $logo['id'], 'full' );
        else :
            ?>

            <img class="logo-default"
                 src="<?php echo esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ) ?>"
                 alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" width="200" height="40"/>

        <?php endif; ?>
    </a>
</div>