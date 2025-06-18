<?php
if ( empty( $args['prefix_cmb'] ) ) return;
$prefix_cmb = $args['prefix_cmb'];

$title = get_post_meta(get_the_ID(), $prefix_cmb . 'title', true);
$text_link = get_post_meta(get_the_ID(), $prefix_cmb . 'text_link', true);
$page_id = get_post_meta(get_the_ID(), $prefix_cmb . 'url', true);

// query
$query = everygolf_cmb_query_post_in($prefix_cmb, 'eg_setup_space');
?>
<section class="section sec-HVCoso">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h2 class="title-title fz-60 uppercase title-effect-1 wow">
                    <?php echo wp_kses_post( $title ); ?>
                </h2>

                <?php if ( $query->have_posts() ) : ?>
                    <div class="item-list">
                        <?php
                        $stt_item = 1;

                        while ( $query->have_posts() ) : $query->the_post();
                            $galleries = get_post_meta(get_the_ID(), PREFIX_CMB_CPT_SETUP_SPACE . 'galleries', true);
                            $info = get_post_meta(get_the_ID(), PREFIX_CMB_CPT_SETUP_SPACE . 'list', true);
                        ?>
                            <div class="item <?php echo esc_attr( $stt_item % 2 == 0 ? 'item-2' : 'item-1' ); ?>">
                                <div class="row">
                                    <div class="col-md-6 col-xl-6">
                                        <div class="roomBox__imgSlide wow fadeInUp<?php echo esc_attr( $stt_item % 2 == 0 ? ' view-4' : '' ); ?>">
                                            <div class="swiper swiper-big">
                                                <div class="swiper-wrapper">
                                                    <?php if ( has_post_thumbnail() ) : ?>
                                                        <div class="swiper-slide" data-index="0">
                                                            <?php the_post_thumbnail('large'); ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php
                                                    if ( !empty( $galleries ) ) :
                                                        $stt_index = has_post_thumbnail() ? 1 : 0;

                                                        foreach ( $galleries as $attachment_id => $attachment_url ) :
                                                    ?>
                                                        <div class="swiper-slide" data-index="<?php echo esc_attr( $stt_index ); ?>">
                                                            <?php echo wp_get_attachment_image($attachment_id, 'large'); ?>
                                                        </div>
                                                    <?php
                                                        $stt_index++;
                                                        endforeach;
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="swiper swiper-thumb">
                                                <div class="swiper-wrapper">
                                                    <?php if ( has_post_thumbnail() ) : ?>
                                                        <div class="swiper-slide current" data-index="0">
                                                            <?php the_post_thumbnail('medium_large'); ?>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php
                                                    if ( !empty( $galleries ) ) :

                                                        $stt_index = has_post_thumbnail() ? 1 : 0;

                                                        foreach ( $galleries as $attachment_id => $attachment_url ) :
                                                    ?>
                                                        <div class="swiper-slide<?php echo esc_attr( $stt_index == 0 ? ' current' : '' ) ?>"
                                                             data-index="<?php echo esc_attr( $stt_index ); ?>"
                                                        >
                                                            <?php echo wp_get_attachment_image($attachment_id, 'medium_large'); ?>
                                                        </div>
                                                    <?php
                                                        $stt_index++;
                                                        endforeach;
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xl-6">
                                        <div class="item__body">
                                            <div class="wow fadeInUp">
                                                <h3 class="item__title uppercase fz-42">
                                                    <?php the_title(); ?>
                                                </h3>

                                                <div class="item__text">
                                                    <?php the_content(); ?>
                                                </div>
                                            </div>

                                            <?php if ( !empty( $info ) ) : ?>
                                                <ul class="item__info">
                                                    <?php foreach ($info as $item) : ?>
                                                        <li class="wow fadeInUp">
                                                            <p><?php echo esc_html( $item['utilities'] ); ?></p>

                                                            <span><?php echo esc_html( $item['parameter'] ); ?></span>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>

                                            <?php
                                            if ( $page_id ) :
                                                $page_url = get_permalink( $page_id );
                                            ?>
                                                <div class="item__btn wow fadeInUp">
                                                    <a href="<?php echo esc_url( $page_url ) ?>" class="btn btn-fixLink btn-icon-right">
                                                        <?php echo esc_html( $text_link ); ?>
                                                        <span><i class="icon-arrow-right"></i></span>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $stt_item++; endwhile; wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>