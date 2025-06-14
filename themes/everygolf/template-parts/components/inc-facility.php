<?php
if ( empty( $args['prefix_cmb'] ) ) return;

$prefix_cmb = $args['prefix_cmb'];

// get cmb
$title = get_post_meta(get_the_ID(), $prefix_cmb . 'title', true);
$sub_title = get_post_meta(get_the_ID(), $prefix_cmb . 'sub_title', true);
$desc = get_post_meta(get_the_ID(), $prefix_cmb . 'desc', true);

// query
$query = everygolf_cmb_get_query($prefix_cmb, 'everygolf_facility');
?>
<section class="section sec-HVVatChat">
    <div class="container">
        <div class="item-head">
            <div class="row">
                <div class="col-xl-4 offset-xl-1">
                    <p class="title-sub uppercase wow fadeInDown"><?php echo esc_html( $title ); ?></p>
                </div>
            </div>

            <div class="row align-items-end">
                <div class="col-xl-4 offset-xl-1">
                    <h2 class="title-title fz-60 uppercase title-effect-1 wow">
                        <?php echo esc_html( $sub_title ); ?>
                    </h2>
                </div>

                <div class="col-xl-5 offset-xl-2">
                    <div class="title-text wow fadeInUp" data-wow-delay=".2s">
                        <?php echo wpautop( $desc ); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if ( $query->have_posts() ) : ?>
            <div class="item-content">
                <?php
                $stt_loop = 1;
                while ( $query->have_posts() ) :
                    $query->the_post();

                $post_sub_title = get_post_meta(get_the_ID(), PREFIX_CMB_CPT_FACILITY . 'sub_title', true);
                $post_info = get_post_meta(get_the_ID(), PREFIX_CMB_CPT_FACILITY . 'list', true);

                $check_loop = $stt_loop % 2;
                ?>
                    <div class="item item-<?php echo esc_attr( $check_loop == 0 ? '2' : '1' ); ?>">
                        <div class="row align-items-xl-center">
                            <div class="col-md-4 <?php echo esc_attr( $check_loop == 0 ? 'offset-md-1 col-xl-7 offset-xl-0' : 'col-xl-5' ); ?>">
                                <div class="item__img wow fadeInUp">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            </div>

                            <div class="col-md-7 <?php echo esc_attr( $check_loop == 0 ? 'col-xl-4 offset-xl-1' : 'offset-md-1 col-xl-5 offset-xl-2' ); ?>">
                                <div class="item__body">
                                    <?php if ( $post_sub_title ) : ?>
                                        <p class="title-sub uppercase wow fadeInUp">
                                            <?php echo esc_html( $post_sub_title ) ?>
                                        </p>
                                    <?php endif; ?>

                                    <?php if ( !empty( $post_info ) ) : ?>
                                        <div class="accordion">
                                            <?php foreach ( $post_info as $key => $item ) : ?>
                                                <div class="accordion__panel wow fadeInUp<?php echo esc_attr( $key == 0 ? 'active show' : '' ); ?>">
                                                    <h3 class="accordion__title">
                                                        <?php echo esc_html( $item['title'] ); ?>
                                                        <span>
                                                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/acc-up.svg' ) ) ?>" alt="">
                                                            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/icons/acc-down.svg' ) ) ?>" alt="">
                                                        </span>
                                                    </h3>

                                                    <div class="accordion__content">
                                                        <div class="accordion__body">
                                                            <?php echo wpautop( $item['desc'] ); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
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
        <?php endif; ?><!-- End if you have posts -->
    </div>
</section>