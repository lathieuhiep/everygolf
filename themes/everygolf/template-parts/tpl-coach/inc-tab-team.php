<?php
if ( empty( $args['prefix_cmb'] ) ) return;

$prefix_cmb = $args['prefix_cmb'];

$title = get_post_meta(get_the_ID(), $prefix_cmb . 'title', true);

// query
$query = everygolf_cmb_get_query($prefix_cmb, 'everygolf_coach');
?>
<section class="section sec-HLVCGia pt-0">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h2 class="title-title uppercase fz-72 title-effect-1 wow">
                    <?php echo esc_html( $title ); ?>
                </h2>

                <?php if ( $query->have_posts() ) : ?>
                    <div class="accordion">
                        <?php
                        $stt_loop_query = 1;
                        while ( $query->have_posts() ) : $query->the_post();
                            $position = get_post_meta(get_the_ID(), PREFIX_CMB_CPT_COACH . 'position', true);
                            $certificates = get_post_meta(get_the_ID(), PREFIX_CMB_CPT_COACH . 'certificates', true);
                            $galleries = get_post_meta(get_the_ID(), PREFIX_CMB_CPT_COACH . 'gallery_images', true);
                        ?>
                            <div class="accordion__panel wow fadeInUp<?php echo esc_attr( $stt_loop_query == 1 ? ' active show' : '' ); ?>">
                                <div class="accordion__title" data-cursor-text="<?php esc_attr_e('View', 'everygolf'); ?>">
                                    <div class="f-group">
                                        <p class="f-sub"><?php echo esc_html( $position ); ?></p>

                                        <h3 class="f-title uppercase">
                                            <span>
                                                <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/acc-up.svg' ) ) ?>" alt="" width="45" height="45">
                                                <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/acc-down.svg' ) ) ?>" alt="" width="45" height="45">
                                            </span>
                                            <?php the_title(); ?>
                                        </h3>

                                        <span class="f-num"><?php echo esc_html(str_pad(($stt_loop_query), 2, '0', STR_PAD_LEFT)); ?></span>
                                    </div>
                                </div>

                                <div class="accordion__content">
                                    <div class="accordion__body">
                                        <div class="row">
                                            <div class="col-10 col-md-5 col-xl-5">
                                                <div class="t-body">
                                                    <div class="t-head">
                                                        <p class="f-sub"><?php echo esc_html( $position ); ?></p>

                                                        <h3 class="f-title uppercase">
                                                            <?php the_title(); ?>
                                                        </h3>

                                                        <div class="f-text">
                                                            <?php the_content(); ?>
                                                        </div>
                                                    </div>

                                                    <div class="t-chungchi">
                                                        <strong><?php esc_html_e( 'Chứng chỉ', 'everygolf' ); ?></strong>

                                                        <?php if ( $certificates ) : ?>
                                                            <ul class="list-style-none">
                                                                <?php foreach ($certificates as $certificate) : ?>
                                                                <li>
                                                                    <?php echo esc_html( $certificate ); ?>
                                                                </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-7 col-xl-6 offset-xl-1">
                                                <div class="t-imgWrap">
                                                    <div class="t-img">
                                                        <?php the_post_thumbnail('large'); ?>
                                                    </div>

                                                    <?php if ( $galleries ) : ?>
                                                        <div class="t-listCC">
                                                            <div class="swiper">
                                                                <div class="swiper-wrapper">
                                                                    <?php foreach ( $galleries as $attachment_id => $attachment_url  ) : ?>
                                                                        <div class="swiper-slide">
                                                                            <a href="<?php echo esc_url( $attachment_url ) ?>" data-fancybox="<?php esc_attr_e( 'chung-chi-', 'everygolf' ); echo esc_attr( $stt_loop_query ); ?>">
                                                                                <?php echo wp_get_attachment_image($attachment_id, 'medium'); ?>
                                                                            </a>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <span class="f-num d-none d-xl-block"><?php echo esc_html(str_pad(($stt_loop_query), 2, '0', STR_PAD_LEFT)); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $stt_loop_query++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
