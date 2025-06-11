<?php
$title = get_post_meta( get_the_ID(), PREFIX_CMB_PAGE_HOME_ABOUT_INFO . 'title', true );
$desc = get_post_meta( get_the_ID(), PREFIX_CMB_PAGE_HOME_ABOUT_INFO . 'desc', true );

$text_hyperlinks = get_post_meta( get_the_ID(), PREFIX_CMB_PAGE_HOME_ABOUT_INFO . 'text_hyperlinks', true );
$page_id = get_post_meta( get_the_ID(), PREFIX_CMB_PAGE_HOME_ABOUT_INFO . 'page_link', true );
?>
<section class="section sec-aboutInfo">
    <div class="item-wrap">
        <div class="item-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xl-4 offset-xl-1">
                        <div class="title-wrap">
                            <h2 class="title-title fz-42 uppercase title-effect-1 wow fadeInUp">
                                <?php echo wp_kses_post( $title ); ?>
                            </h2>

                            <div class="title-text wow fadeInUp">
                                <?php echo wpautop( $desc ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="item-content">
            <div class="item-bg">
                <img class="d-none d-xl-block" src="<?php echo esc_url(get_theme_file_uri('/assets/images/aboutinfo-bg-pc.webp')) ?>"
                     alt="<?php echo esc_attr(get_bloginfo('title')); ?>" width="1920" height="400">

                <img class="d-xl-none" src="<?php echo esc_url(get_theme_file_uri('/assets/images/aboutinfo-bg-mb.webp')) ?>"
                     alt="<?php echo esc_attr(get_bloginfo('title')); ?>" width="1920" height="400">
            </div>

            <div class="item-circle wow zoomIn">
                <svg width="100%" viewBox="0 0 944 944" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="472" cy="472" r="467" stroke="white" stroke-opacity="0.55" stroke-width="2" stroke-dasharray="5 5" />
                    <circle class="dot-1" cx="472" cy="472" r="468" stroke="#DCFC5A" stroke-width="8" stroke-linecap="round" />
                    <circle cx="472.5" cy="471.5" r="241.5" stroke="white" stroke-opacity="0.55" stroke-width="2" stroke-dasharray="5 5" />
                    <circle class="dot-2" cx="472.5" cy="471.5" r="242.5" stroke="#DCFC5A" stroke-width="8" stroke-linecap="round" />
                </svg>

                <?php
                if ( $page_id ) :
                    $page_url = get_permalink( $page_id );
                ?>
                    <div class="f-btn">
                        <div class="wow fadeInUp">
                            <a href="<?php echo esc_url( $page_url ) ?>" class="btn btn-icon-right">
                                <?php echo esc_html( $text_hyperlinks ); ?>
                                <span><i class="icon-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>