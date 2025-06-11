<?php
$numbers = get_post_meta( get_the_ID(), PREFIX_CMB_PAGE_HOME_NUMBERS . 'list', true );

if ( empty( $numbers ) ) return false;
?>
<section class="section sec-homeNumber">
    <div class="container">
        <div class="item-content">
            <div class="row">
                <?php foreach ( $numbers as $number) : ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="item-num wow fadeInUp">
                            <div class="f-num">
                                <span class="counterJs" data-to="<?php echo esc_html(str_pad(($number['number']), 2, '0', STR_PAD_LEFT)); ?>">0</span><?php echo esc_html( $number['suffix'] ?? '' ); ?>
                            </div>

                            <p class="f-text"><?php echo esc_html( $number['title'] ); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>