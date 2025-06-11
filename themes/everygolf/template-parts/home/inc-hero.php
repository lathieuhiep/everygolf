<?php
$slides = get_post_meta( get_the_ID(), PREFIX_CMB_PAGE_HOME_HERO . 'slides', true );

if ( empty( $slides ) ) return false;
?>
<section class="section sec-hero">
    <div class="item-wrap">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach ( $slides as $key => $slide) : ?>
                    <div class="swiper-slide">
                        <div class="item-bg wow" data-bg-pc="<?php echo esc_url( $slide['bg_pc'] ) ?>" data-bg-mb="<?php echo esc_url( $slide['bg_mb'] ) ?>"></div>

                        <div class="item-title wow fadeInUp">
                            <?php
                            $raw = $slide['hero_title'];

                            if (str_contains($raw, '<svg')) {
                                echo $raw;
                            } else {
                                echo wpautop( $raw );
                            }
                            ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-pagination2"></div>
        </div>
    </div>
</section>