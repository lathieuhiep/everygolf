<?php
if ( empty( $args['prefix_cmb'] ) ) return;
$prefix_cmb = $args['prefix_cmb'];

$numbers = get_post_meta( get_the_ID(), $prefix_cmb . 'list', true );

if ( empty( $numbers ) ) return false;

$class = $args['class'] ? ' ' . $args['class'] : '';
?>
<section class="section sec-homeNumber<?php echo esc_attr( $class ); ?>">
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