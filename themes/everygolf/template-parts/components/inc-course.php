<?php
if ( empty( $args['prefix_cmb'] ) ) return;

$prefix_cmb = $args['prefix_cmb'];

$style = get_post_meta( get_the_ID(), $prefix_cmb . 'style', true );
$courseList = get_post_meta( get_the_ID(), $prefix_cmb . 'list', true );

$text_link = get_post_meta( get_the_ID(), $prefix_cmb . 'text_link', true );
$page_id = get_post_meta( get_the_ID(), $prefix_cmb . 'page_link', true );
$page_url = $page_id ? get_permalink( $page_id ) : '';

if ( empty( $courseList ) ) return false;
?>
<section class="section sec-homeKhoaHoc <?php echo esc_attr( $style ) ?>">
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

                                            <h2 class="title-title fz-42 uppercase"><?php echo esc_html( $item['sub_title'] ); ?></h2>

                                            <?php if ( !empty( $item['desc'] ) ) : ?>
                                                <div class="title-text">
                                                    <?php echo wpautop( $item['desc'] ); ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ( $page_url ) : ?>
                                                <div class="title-btn">
                                                    <a href="<?php echo esc_url( $page_url ); ?>"
                                                       class="btn btn-icon-right<?php echo esc_attr( $style == 'style-1' ? ' btn-fixLink' : '' ) ?>"
                                                    >
                                                        <?php echo esc_html( $text_link ); ?>
                                                        <span><i class="icon-arrow-right"></i></span>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
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