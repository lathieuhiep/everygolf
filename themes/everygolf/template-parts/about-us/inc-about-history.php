<?php
$histories = get_post_meta( get_the_ID(), PREFIX_CMB_PAGE_ABOUT_US_HISTORY . 'list', true );

if ( empty( $histories ) ) return false;

ob_start();

foreach ( $histories as $index => $history ) :
?>
    <div class="h-imgMarker" data-index="<?php echo esc_attr( $index ) ?>" data-year="<?php echo esc_attr( $history['timeline'] ); ?>">
        <div class="h-img1">
            <?php echo wp_get_attachment_image( $history['img_id'], 'large' ); ?>
        </div>

        <?php if ( !empty($history['img_thumbnail_id']) ) : ?>
            <div class="h-img2">
                <?php echo wp_get_attachment_image( $history['img_thumbnail_id'] ); ?>
            </div>
        <?php endif; ?>
    </div>
<?php
endforeach;

$history_images_html = ob_get_clean();
?>
<section class="section sec-aboutHistory">
    <div class="item-wrap">
        <div class="item-contentCenter">
            <div class="item-head d-none d-md-block wow fadeInUp">
                <div class="container">
                    <div class="swiper swiper-content">
                        <div class="swiper-wrapper">
                            <?php foreach ( $histories as $index => $history) : ?>
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-md-10 col-xl-5 offset-xl-1">
                                            <span class="title-num"><?php echo esc_html(str_pad(($index + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10 col-xl-5 offset-xl-1">
                                            <h3 class="uppercase fz-42 title-title">
                                                <?php echo wp_kses_post( $history['title'] ); ?>
                                            </h3>
                                        </div>

                                        <div class="col-md-10 col-xl-5">
                                            <div class="title-text">
                                                <?php echo wpautop( $history['desc'] ); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-horizontal d-none d-md-block wow fadeInUp">
                <div class="h-scroll">
                    <div class="h-item h-item-clone">
                        <?php echo $history_images_html; ?>
                    </div>

                    <div class="h-item h-item-center">
                        <?php echo $history_images_html; ?>
                    </div>

                    <div class="h-item h-item-clone">
                        <?php echo $history_images_html; ?>
                    </div>
                </div>
            </div>

            <div class="item-mobileSlide d-md-none wow fadeInUp">
                <div class="container">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ( $histories as $index => $history) : ?>
                                <div class="swiper-slide" data-index="<?php echo esc_attr( $index ) ?>" data-date="<?php echo esc_attr( $history['timeline'] ); ?>">
                                    <span class="f-num"><?php echo esc_html(str_pad(($index + 1), 2, '0', STR_PAD_LEFT)); ?></span>

                                    <h3 class="title-title uppercase">
                                        <?php echo wp_kses_post( $history['title'] ); ?>
                                    </h3>

                                    <div class="f-img">
                                        <?php echo wp_get_attachment_image( $history['img_id'], 'medium_large' ); ?>
                                    </div>

                                    <div class="f-text">
                                        <?php echo wpautop( $history['desc'] ); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-timeline wow fadeInUp">
                <p class="f-year"><?php echo esc_html( $histories[0]['timeline'] ); ?></p>

                <div class="f-line">
                    <span class="f-lineCenter"></span>
                    <div class="f-lineImg">
                        <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/vector/aboutHistory-timeline.svg' ) ) ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>