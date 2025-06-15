<?php
if ( empty( $args['prefix_cmb'] ) ) return;
$prefix_cmb = $args['prefix_cmb'];

$heading = get_post_meta( get_the_ID(), $prefix_cmb . 'heading', true );
?>
<section class="section sec-HLVHero">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-1">
                <div class="item-titleWrap wow fadeInUp">
                    <?php
                    if ( $heading ) :
                        for ( $i = 1; $i <= 2; $i++ ) :
                    ?>
                        <div class="item-title uppercase title-effect-2<?php echo esc_attr( $i == 2 ? ' style-effect' : '' ); ?>">
                            <?php echo wp_kses_post( $heading ); ?>
                        </div>
                    <?php
                        endfor;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>