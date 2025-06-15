<?php
if ( empty( $args['prefix_cmb'] ) ) return;

$prefix_cmb = $args['prefix_cmb'];

$desc = get_post_meta( get_the_ID(), $prefix_cmb . 'desc', true );
$title_slogan_1 = get_post_meta( get_the_ID(), $prefix_cmb . 'title_slogan_1', true );
$img_slogan_1 = get_post_meta( get_the_ID(), $prefix_cmb . 'img_slogan_1_id', true );

$title_slogan_2 = get_post_meta( get_the_ID(), $prefix_cmb . 'title_slogan_2', true );
$img_slogan_2 = get_post_meta( get_the_ID(), $prefix_cmb . 'img_slogan_2_id', true );

$title_slogan_3 = get_post_meta( get_the_ID(), $prefix_cmb . 'title_slogan_3', true );
$img_slogan_3 = get_post_meta( get_the_ID(), $prefix_cmb . 'img_slogan_3_id', true );
?>
<section class="section sec-HVImgGrid style-revest pt-0">
    <div class="container">
        <div class="item-content">
            <div class="row">
                <div class="col-md-6 col-xl-5 offset-md-6">
                    <div class="title-text wow fadeInUp">
                        <?php echo wpautop( $desc ); ?>
                    </div>
                </div>
            </div>

            <div class="item-grid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="f-box-1 wow fadeInUp">
                            <div class="f-img">
                                <?php echo wp_get_attachment_image($img_slogan_1, 'large'); ?>
                                <span class="f-text"><?php echo esc_html( $title_slogan_1 ); ?></span>
                            </div>

                            <div class="f-sharp-1">
                                <svg width="100%" viewBox="0 0 159 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="159" height="22" transform="matrix(-1 0 0 1 159 10)" fill="#070507"/>
                                    <rect width="110" height="10" transform="matrix(-1 0 0 1 110 0)" fill="#070507"/>
                                </svg>
                            </div>

                            <div class="f-sharp-4 d-none d-md-block">
                                <svg width="100%" viewBox="0 0 326 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="267" height="43" transform="matrix(-1 0 0 1 326 0)" fill="#070507"/>
                                    <rect width="267" height="17" transform="matrix(-1 0 0 1 267 67)" fill="#070507"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="f-box-2 wow fadeInUp">
                            <div class="f-img">
                                <?php echo wp_get_attachment_image($img_slogan_2, 'large'); ?>
                                <span class="f-text"><?php echo esc_html( $title_slogan_2 ); ?></span>
                            </div>

                            <div class="f-sharp-2">
                                <svg width="100%"viewBox="0 0 161 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="161" height="22" transform="matrix(-1 0 0 1 161 0)" fill="#070507"/>
                                    <rect width="74" height="10" transform="matrix(-1 0 0 1 161 22)" fill="#070507"/>
                                </svg>
                            </div>
                        </div>

                        <div class="f-box-3 wow fadeInUp">
                            <div class="f-img">
                                <?php echo wp_get_attachment_image($img_slogan_3, 'large'); ?>
                                <span class="f-text"><?php echo esc_html( $title_slogan_3 ); ?></span>
                            </div>

                            <div class="f-sharp-3">
                                <svg width="100%" viewBox="0 0 327 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="267" height="22" transform="matrix(-1 0 0 1 267 10)" fill="#070507"/>
                                    <rect width="120" height="10" transform="matrix(-1 0 0 1 327 0)" fill="#070507"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
