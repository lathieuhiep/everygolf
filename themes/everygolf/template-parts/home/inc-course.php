<?php
$courseList = get_post_meta( get_the_ID(), PREFIX_CMB_PAGE_HOME_COURSE . 'list', true );

if ( empty( $courseList ) ) return false;
?>
<section class="section sec-homeKhoaHoc">
    <div class="item-wrap">
        <div class="item-sticky">
            <div class="swiper swiper-content">
                <div class="swiper-wrapper">
                    <?php foreach ( $courseList as $key => $item) : ?>
                        <div class="swiper-slide" data-index="<?php echo esc_attr( $key ); ?>">
                            <div class="bg" data-bg-pc="<?php echo esc_url( $item['bg_pc'] ) ?>" data-bg-mb="<?php echo esc_url( $item['bg_mb'] ) ?>">
                                <span></span>
                            </div>

                            <div class="item-content">
                                <div class="row">
                                    <div class="col-md-7 offset-md-4 col-xl-4 offset-xl-7">
                                        <div class="title-wrap wow fadeInUp">
                                            <p class="title-sub"><?php echo esc_html( $item['title'] ); ?></p>

                                            <h2 class="title-title fz-42 uppercase"><?php echo esc_html( $item['desc'] ); ?></h2>

                                            <div class="title-btn">
                                                <a href="#" class="btn btn-fixLink btn-icon-right">
                                                    <?php esc_html_e('Đăng ký', 'everygolf'); ?>
                                                    <span><i class="icon-arrow-right"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-pagination d-md-none"></div>
            </div>

            <div class="item-thumb d-none d-md-block wow fadeInUp">
                <div class="swiper swiper-thumb">
                    <div class="swiper-wrapper">
                        <?php foreach ( $courseList as $key => $item) : ?>
                            <div class="swiper-slide" data-index="<?php echo esc_attr( $key ); ?>">
                                <span class="f-num"><?php echo esc_html(str_pad(($key + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                                <div class="f-line"><span></span></div>
                                <h3 class="f-title"><?php echo esc_html( $item['title'] ); ?></h3>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="marker-content d-none d-md-block">
            <div class="item-marker"></div>
            <div class="item-marker"></div>
            <div class="item-marker"></div>
        </div>
</section>