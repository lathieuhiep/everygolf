<?php
if ( empty( $args['prefix_cmb'] ) ) return;
$prefix_cmb = $args['prefix_cmb'];

$ids = get_post_meta( get_the_ID(), $prefix_cmb . 'select_cpt', true );

if ( empty( $ids ) ) return;

$args = array(
    'post_type' => 'eg_setup_space',
    'ignore_sticky_posts' => true,
    'post__in' => $ids,
);

// query
$query = new WP_Query( $args );
?>
<section class="section sec-roomSetup">
    <div class="item-wrap tabbox">
        <div class="item-head" data-stickyFix=".item-wrap">
            <div class="container">
                <div class="item-head__inner wow fadeInUp">
                    <div class="ul-menu onePageNav tabbox__list">
                        <ul>
                            <?php foreach ( $ids as $index => $id ) : ?>
                                <li>
                                    <a href="#nav-id-<?php echo esc_attr( $index + 1 ); ?>"
                                       class="scroll-link<?php echo esc_attr( $index == 0 ? ' current' : '' ) ?>"
                                    >
                                        <span><?php echo get_the_title( $id ); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php if ( $query->have_posts() ) : ?>
            <div class="container">
                <div class="item-list">
                    <?php
                    $stt_loop = 1;
                    while ( $query->have_posts() ) : $query->the_post();

                    $subtitle = get_post_meta( get_the_ID(), PREFIX_CMB_CPT_SETUP_SPACE . 'subtitle', true );
                    $galleries = get_post_meta( get_the_ID(), PREFIX_CMB_CPT_SETUP_SPACE . 'galleries', true );
                    $room_list = get_post_meta( get_the_ID(), PREFIX_CMB_CPT_SETUP_SPACE . 'list', true );
                    ?>
                        <div class="roomBox" id="nav-id-<?php echo esc_attr( $stt_loop ); ?>">
                            <div class="roomBox__head wow fadeInUp">
                                <span class="roomBox__num">
                                    <small><?php echo esc_html(str_pad(($stt_loop), 2, '0', STR_PAD_LEFT)); ?></small>
                                </span>

                                <h2 class="roomBox__title"><?php the_title(); ?></h2>

                                <p class="roomBox__text"><?php echo esc_html( $subtitle ); ?></p>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="roomBox__body">
                                        <?php if ( $room_list ) : ?>
                                            <ul class="roomBox__list">
                                                <?php foreach ( $room_list as $item ) : ?>
                                                    <li class="wow fadeInUp">
                                                        <p><?php echo esc_html( $item['utilities'] ); ?></p>
                                                        <span><?php echo esc_html( $item['parameter'] ); ?></span>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>

                                        <div class="roomBox__btn wow fadeInUp">
                                            <a href="#" class="btn btn-fixLink btn-icon-right">
                                                <?php esc_html_e( 'Đăng ký', 'everygolf' ); ?>
                                                <span><i class="icon-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="roomBox__imgSlide wow fadeInUp">
                                        <div class="swiper swiper-big">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide" data-index="0">
                                                    <img src="assets/img/roomSetup-img-1.jpg" alt="">
                                                </div>
                                                <div class="swiper-slide" data-index="1">
                                                    <img src="assets/img/roomSetup-img-2.jpg" alt="">
                                                </div>
                                                <div class="swiper-slide" data-index="2">
                                                    <img src="assets/img/roomSetup-img-3.jpg" alt="">
                                                </div>
                                                <div class="swiper-slide" data-index="3">
                                                    <img src="assets/img/roomSetup-img-4.jpg" alt="">
                                                </div>
                                                <div class="swiper-slide" data-index="4">
                                                    <img src="assets/img/roomSetup-img-3.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper swiper-thumb">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide current" data-index="0">
                                                    <img src="assets/img/roomSetup-img-2.jpg" alt="">
                                                </div>
                                                <div class="swiper-slide" data-index="1">
                                                    <img src="assets/img/roomSetup-img-3.jpg" alt="">
                                                </div>
                                                <div class="swiper-slide" data-index="2">
                                                    <img src="assets/img/roomSetup-img-4.jpg" alt="">
                                                </div>
                                                <div class="swiper-slide" data-index="3">
                                                    <img src="assets/img/roomSetup-img-3.jpg" alt="">
                                                </div>
                                                <div class="swiper-slide" data-index="4">
                                                    <img src="assets/img/roomSetup-img-2.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $stt_loop++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>