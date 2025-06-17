<?php
// get meta box
$title = get_post_meta(get_the_ID(), PREFIX_CMB_PAGE_HOME_INDOOR_SPACE . 'title', true);
$indoor_list = get_post_meta(get_the_ID(), PREFIX_CMB_PAGE_HOME_INDOOR_SPACE . 'list', true);

// get page template
$page_id = get_post_meta( get_the_ID(), PREFIX_CMB_PAGE_HOME_INDOOR_SPACE . 'page_link', true );
$page_url = $page_id ? get_permalink( $page_id ) : '#';
?>
<section class="section sec-indoorSpace pb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-9 offset-md-3 col-xl-5 offset-xl-6">
                <div class="title-wrap">
                    <h2 class="title-title uppercase fz-60 title-effect-1 wow"><?php echo esc_html( $title ); ?></h2>
                </div>
            </div>
        </div>
        <div class="item-content">
            <div class="row">
                <?php foreach ( $indoor_list as $index => $item ) : ?>
                    <div class="col-item col-11 col-md-6<?php echo esc_attr( $index % 2 == 0 ? ' offset-1 offset-md-0' : '' ) ?>">
                        <div class="item-box wow fadeInUp"
                             data-md-wow-delay="<?php echo esc_attr( $index > 0 ? '.' : '' ) . esc_attr( 2 * $index) ?>s"
                             data-xl-wow-delay="<?php echo esc_attr( $index > 0 ? '.' : '' ) . esc_attr( 2 * $index) ?>s"
                        >
                            <a href="<?php echo esc_url( $page_url ); ?>" target="_blank" class="f-img">
                                <?php echo wp_get_attachment_image( $item['img_id'], 'large' ); ?>
                            </a>

                            <div class="f-body">
                                <h3 class="f-title uppercase">
                                    <a href="<?php echo esc_url( $page_url ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
                                </h3>

                                <p class="f-sub title-sub"><?php echo esc_html( $item['sub_title'] ); ?></p>

                                <a href="<?php echo esc_url( $page_url ) ?>" target="_blank" class="f-btn"><i class="icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>