<?php
if ( empty( $args['prefix_cmb'] ) ) return;
$prefix_cmb = $args['prefix_cmb'];

$title = get_post_meta( get_the_ID(), $prefix_cmb . 'title', true );
$facilities = get_post_meta( get_the_ID(), $prefix_cmb . 'list', true );
$page_id = get_post_meta( get_the_ID(), $prefix_cmb . 'page_link', true );
$page_url = $page_id ? get_permalink( $page_id ) : '#';
?>
<section class="section sec-indoorSpace style-2">
    <div class="container">
        <div class="title-wrap2">
            <h2 class="title-2 uppercase fz-60 wow fadeInUp">
                <?php echo esc_html( $title ); ?>
            </h2>
        </div>

        <div class="item-content">
            <div class="row">
                <?php foreach ( $facilities as $index => $facility) : ?>
                    <div class="col-11 col-md-6<?php echo esc_attr( ( $index + 1 ) % 2 == 0 ? ' offset-1 offset-md-0' : '' ) ?>">
                        <div class="item-box wow fadeInUp">
                            <a href="<?php echo esc_url( $page_url ) ?>" target="_blank" class="f-img">
                                <?php echo wp_get_attachment_image( $facility['img_id'], 'large' ); ?>
                            </a>

                            <div class="f-body wow fadeInUp">
                                <h3 class="f-title uppercase">
                                    <a href="<?php echo esc_url( $page_url ) ?>" target="_blank">
                                        <?php echo esc_html( $facility['title'] ); ?>
                                    </a>
                                </h3>

                                <p class="f-sub title-sub">
                                    <?php echo esc_html( $facility['sub_title'] ); ?>
                                </p>

                                <a href="<?php echo esc_url( $page_url ) ?>" class="f-btn"><i class="icon-arrow-right"></i></a>
                            </div>
                        </div>

                        <p class="item-box-info wow fadeInUp d-none d-md-block">
                            <small><?php esc_html_e('Địa chỉ', 'everygolf'); ?></small>

                            <a href="<?php echo esc_url( $page_url ) ?>" target="_blank">
                                <?php echo esc_html( $facility['address'] ); ?>
                            </a>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>