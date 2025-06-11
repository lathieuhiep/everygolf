<?php
// link template coach
$coach_page = everygolf_get_page_link_info_by_template_file( 'page-templates/page-coach.php' );

// option query
$title = get_post_meta(get_the_ID(), PREFIX_CMB_PAGE_HOME_COACH . 'title', true);
$limit = intval(get_post_meta(get_the_ID(), PREFIX_CMB_PAGE_HOME_COACH . 'limit', true));
$order_by = get_post_meta(get_the_ID(), PREFIX_CMB_PAGE_HOME_COACH . 'order_by', true);
$order = get_post_meta(get_the_ID(), PREFIX_CMB_PAGE_HOME_COACH . 'order', true);
$ids = get_post_meta(get_the_ID(), PREFIX_CMB_PAGE_HOME_COACH . 'select_coaches', true);

$args = array(
    'post_type' => 'everygolf_coach',
    'ignore_sticky_posts' => true,
);

if (!empty($ids) && is_array($ids)) {
    $args['post__in'] = $ids;
    $args['orderby'] = 'post__in';
    $args['posts_per_page'] = -1;
} else {
    $args['posts_per_page'] = $limit > 0 ? $limit : 4;
    $args['orderby'] = $order_by ?: 'ID';
    $args['order'] = $order ?: 'ASC';
}

$query = new WP_Query( $args );
?>
<section class="section sec-homeDoiNgu">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 offset-xl-1">
                <div class="title-wrap">
                    <h2 class="title-title uppercase fz-60 title-effect-1 wow"><?php echo wp_kses_post($title); ?></h2>
                </div>
            </div>
        </div>

        <div class="item-wrap">
            <div class="row">
                <div class="col-xl-11 offset-xl-1">
                    <?php if ( $query->have_posts() ) : ?>
                        <?php if ( !wp_is_mobile() ) : ?>
                            <div class="item-slidePc d-none d-xl-flex">
                                <div class="item-scroll wow fadeInUp" data-xl-wow-delay=".4s">
                                    <?php $itemSlidePc = 0; while ( $query->have_posts() ) : $query->the_post(); ?>

                                        <div class="item item-<?php echo esc_attr( $itemSlidePc + 1 ) . esc_attr( $itemSlidePc == 0 ? ' item-first' : '' ); ?>"
                                             data-index="<?php echo esc_attr( $itemSlidePc ); ?>"
                                        >
                                            <div class="item__inner">
                                                <div class="item-img">
                                                    <?php the_post_thumbnail('large'); ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php $itemSlidePc++; endwhile; wp_reset_postdata(); ?>
                                </div>

                                <div class="item-content wow fadeInUp">
                                    <div class="row">
                                        <div class="col-xl-5 offset-xl-7">
                                            <div class="swiper">
                                                <div class="swiper-wrapper">
                                                    <?php
                                                    while ( $query->have_posts() ) : $query->the_post();
                                                        $position = get_post_meta(get_the_ID(), PREFIX_CMB_CPT_COACH . 'position', true);
                                                    ?>

                                                        <div class="swiper-slide">
                                                            <p class="title-sub"><?php echo esc_html( $position ) ?></p>

                                                            <h3 class="title-titleFix fz-42 uppercase"><?php the_title() ?></h3>

                                                            <div class="title-text">
                                                                <?php the_content(); ?>
                                                            </div>

                                                            <?php if ( $coach_page ) : ?>
                                                                <div class="title-btn">
                                                                    <a href="<?php echo esc_url( $coach_page['url'] ) ?>" class="btn btn-icon-right btn-fixLink">
                                                                        <?php esc_html_e('Tìm hiểu thêm', 'everygolf'); ?>
                                                                        <span><i class="icon-arrow-right"></i></span>
                                                                    </a>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>

                                                    <?php endwhile; wp_reset_postdata(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="item-btn">
                                    <span class="item-btn-prev"><i class="icon-arrow-left"></i></span>
                                    <span class="item-btn-next"><i class="icon-arrow-right"></i></span>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( wp_is_mobile() ) : ?>
                            <div class="item-slideMb d-xl-none wow fadeInUp">
                                <div class="row">
                                    <div class="col-md-8 col-xl-12">
                                        <div class="swiper">
                                            <div class="swiper-wrapper">
                                                <?php
                                                while ( $query->have_posts() ) : $query->the_post();
                                                    $position = get_post_meta(get_the_ID(), PREFIX_CMB_CPT_COACH . 'position', true);
                                                ?>

                                                    <div class="swiper-slide">
                                                        <div class="item-img">
                                                            <?php the_post_thumbnail('medium_large'); ?>
                                                        </div>

                                                        <div class="item-content">
                                                            <p class="title-sub"><?php echo esc_html( $position ) ?></p>

                                                            <h3 class="title-titleFix fz-42 uppercase"><?php the_title() ?></h3>

                                                            <div class="title-text">
                                                                <?php the_content(); ?>
                                                            </div>

                                                            <?php if ( $coach_page ) : ?>
                                                                <div class="title-btn">
                                                                    <a href="<?php echo esc_url( $coach_page['url'] ) ?>" class="btn btn-icon-right btn-fixLink">
                                                                        <?php esc_html_e('Tìm hiểu thêm', 'everygolf'); ?>
                                                                        <span><i class="icon-arrow-right"></i></span>
                                                                    </a>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                <?php endwhile; wp_reset_postdata(); ?>
                                            </div>

                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?><!-- End .item-slideMb -->

                    <?php endif; ?><!-- End if you have posts -->
                </div>
            </div>
        </div>
    </div>
</section>