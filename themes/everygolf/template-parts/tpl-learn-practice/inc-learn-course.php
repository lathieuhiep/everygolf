<?php
if ( empty( $args['prefix_cmb'] ) ) return;

$prefix_cmb = $args['prefix_cmb'];

// get values cmb
$heading = get_post_meta( get_the_ID(), $prefix_cmb . 'heading', true );
$sub_heading = get_post_meta( get_the_ID(), $prefix_cmb . 'sub_heading', true );
?>
<section class="section sec-HTHero">
    <div class="item-circle">
        <div class="wow zoomIn">
            <svg width="100%" viewBox="0 0 944 944" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="472" cy="472" r="467" stroke="white" stroke-opacity="0.55" stroke-width="2" stroke-dasharray="5 5"></circle>
                <circle class="dot-1" cx="472" cy="472" r="468" stroke="#DCFC5A" stroke-width="8" stroke-linecap="round"></circle>
                <circle cx="472.5" cy="471.5" r="241.5" stroke="white" stroke-opacity="0.55" stroke-width="2" stroke-dasharray="5 5"></circle>
                <circle class="dot-2" cx="472.5" cy="471.5" r="242.5" stroke="#DCFC5A" stroke-width="8" stroke-linecap="round"></circle>
            </svg>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-end">
            <div class="col-md-8 col-xl-5 offset-md-2 offset-xl-4 order-md-2">
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

            <div class="col-md-2 col-xl-3 order-md-1">
                <h2 class="title-title uppercase fz-72 wow fadeInUp">
                    <?php echo wp_kses_post( $sub_heading ); ?>
                </h2>
            </div>
        </div>
    </div>
</section>