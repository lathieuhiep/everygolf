<?php
if ( empty( $args['prefix_cmb'] ) ) return;
$prefix_cmb = $args['prefix_cmb'];

$img_pc = get_post_meta( get_the_ID(), $prefix_cmb . 'img_pc', true );
$img_mb = get_post_meta( get_the_ID(), $prefix_cmb . 'img_mb', true );
$heading = get_post_meta( get_the_ID(), $prefix_cmb . 'heading', true );
$sub_heading = get_post_meta( get_the_ID(), $prefix_cmb . 'sub_heading', true );
?>
<section class="section sec-STHero">
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
                    <div class="col-md-9 col-xl-5">
                        <div class="title-bigWrap wow fadeInUp">
                            <?php
                            if ( $heading ) :
                                for ( $i = 1; $i <= 2; $i++ ) :
                                    ?>
                                    <div class="title-big title-effect-2<?php echo esc_attr( $i == 2 ? ' style-effect' : '' ); ?>">
                                        <?php echo wp_kses_post( $heading ); ?>
                                    </div>
                                <?php
                                endfor;
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="col-md-3 col-xl-3 offset-xl-4">
                        <div class="title-num wow fadeInUp">
                            <p><?php echo wp_kses_post( $sub_heading ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>