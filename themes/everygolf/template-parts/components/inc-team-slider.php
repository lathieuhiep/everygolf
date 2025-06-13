<?php
if ( empty( $args['prefix_cmb'] ) ) return;

$prefix_cmb = $args['prefix_cmb'];

// link template coach
$coach_page = everygolf_get_page_link_info_by_template_file( 'page-templates/page-coach.php' );
$title = get_post_meta(get_the_ID(), $prefix_cmb . 'title', true);

// query
$query = everygolf_cmb_get_query($prefix_cmb, 'everygolf_coach');
?>
<section class="section sec-aboutBLD">
    <div class="container">
        <div class="row">
            <div class="col-md-11 col-xl-9 offset-xl-1">
                <h2 class="title-title uppercase fz-60 title-effect-1 wow">
                    <?php echo esc_html( $title ); ?>
                </h2>

                <?php if ( $query->have_posts() ) : ?>
                    <div class="item-slide wow fadeInUp">
                        <div class="item-fixWrap">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <?php
                                    while ( $query->have_posts() ) : $query->the_post();
                                        $position = get_post_meta(get_the_ID(), PREFIX_CMB_CPT_COACH . 'position', true);
                                    ?>
                                        <div class="swiper-slide">
                                            <div class="f-box">
                                                <a href="<?php echo esc_url( $coach_page['url'] ?? '#' ) ?>" class="f-box__img">
                                                    <?php the_post_thumbnail('large'); ?>
                                                </a>

                                                <div class="f-box__body">
                                                    <p class="f-box__sub">
                                                        <?php echo esc_html( $position ) ?>
                                                    </p>

                                                    <h3 class="f-box__title">
                                                        <a href="<?php echo esc_url( $coach_page['url'] ?? '#' ) ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>