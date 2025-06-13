<?php
if ( empty( $args ) ) return;
$prefix_cmb = $args['prefix_cmb'];

$title = get_post_meta( get_the_ID(), $prefix_cmb . 'title', true );
$galleries = get_post_meta( get_the_ID(), $prefix_cmb . 'gallery_images', true );
?>
<section class="section sec-aboutDoitac">
    <div class="container">
        <div class="text-center">
            <h2 class="title-title fz-42 uppercase title-effect-1 wow fadeInUp">
                <?php echo wp_kses_post( $title ); ?>
            </h2>
        </div>
    </div>

    <div class="item-list">
        <?php
        if ( empty( $galleries ) ) return;

        ob_start();

        $stt_partner = 1;
        foreach ( $galleries as $attachment_id => $attachment_url ) :
        ?>
            <div class="f-img f-img-<?php echo esc_attr( $stt_partner ) ?> wow fadeInUp">
                <div class="f-inner">
                    <?php echo wp_get_attachment_image($attachment_id, 'medium'); ?>
                </div>
            </div>
        <?php
            $stt_partner++;
        endforeach;

        $partner_list_html = ob_get_clean();

        for ($i = 0; $i < 3; $i++) :
            ?>
            <div class="item item-<?php echo esc_attr( $i + 1 ) ?>">
                <div class="f-scroll">
                    <?php echo $partner_list_html; ?>
                </div>

                <div class="f-scroll clone">
                    <?php echo $partner_list_html; ?>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</section>