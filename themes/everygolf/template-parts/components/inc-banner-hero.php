<?php
if ( empty( $args['prefix_cmb'] ) ) return;
$prefix_cmb = $args['prefix_cmb'];

$text_list = get_post_meta( get_the_ID(), $prefix_cmb . 'text_list', true );
$desc = get_post_meta( get_the_ID(), $prefix_cmb . 'desc', true );
$img_pc = get_post_meta( get_the_ID(), $prefix_cmb . 'img_pc', true );
$img_mb = get_post_meta( get_the_ID(), $prefix_cmb . 'img_mb', true );
?>
<section class="section sec-HVHero">
    <div class="item-wrap">
        <div class="item-bg wow bgZoomIn"
             data-bg-pc="<?php echo esc_url( $img_pc ); ?>"
             data-bg-mb="<?php echo esc_url( $img_mb ); ?>"
        >
            <div class="f-sharp"
                 data-bg-pc="<?php echo esc_url( get_theme_file_uri( '/assets/images/hvhero-sharp-pc.webp' ) ); ?>"
                 data-bg-mb="<?php echo esc_url( get_theme_file_uri( '/assets/images/hvhero-sharp-mb.webp' ) ); ?>"></div>
        </div>

        <div class="item-content">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-md-5 col-xl-4 offset-xl-1">
                        <?php if ( !empty( $text_list ) ) : ?>
                            <div class="item-titleWrap wow fadeInUp">
                                <?php foreach ( $text_list as $key => $text) : ?>
                                    <div class="item-title title-effect-2<?php echo esc_attr( $key > 0 ? ' style-effect' : '' ); ?>">
                                        <?php echo esc_html( $text ); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-7 col-xl-5 offset-xl-1">
                        <div class="item-text wow fadeInUp">
                            <?php echo wpautop( $desc ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>