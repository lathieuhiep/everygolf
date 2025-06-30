<?php if ( ! is_active_sidebar( 'sidebar-cta' ) ) return; ?>

<section class="section sec-homeCTA">
    <div class="item-wrap">
        <div class="item-bg">
            <video src="<?php echo esc_url( get_theme_file_uri( '/assets/videos/bg_loop_2.mp4' ) ) ?>" autoplay loop muted playsinline></video>
        </div>

        <div class="item-content">
            <div class="container">
                <?php dynamic_sidebar( 'sidebar-cta' ); ?>
            </div>
        </div>
    </div>
</section>