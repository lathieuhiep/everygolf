<?php
if ( empty( $args['prefix_cmb'] ) ) return;

$prefix_cmb = $args['prefix_cmb'];

$course_list = get_post_meta( get_the_ID(), $prefix_cmb . 'list', true );

if ( empty( $course_list ) ) return;
?>
<section class="section sec-khoahocList">
    <div class="item-wrap">
        <div class="item-head" data-stickyFix=".item-wrap">
            <div class="container">
                <div class="item-head__inner wow fadeInUp">
                    <div class="ul-menu onePageNav">
                        <ul>
                            <?php
                            foreach ( $course_list as $key => $item ) :
                                if ( !empty( $item['heading'] ) ) :
                            ?>
                                <li>
                                    <a href="#nav-id-<?php echo esc_attr( $key + 1 ); ?>"
                                       class="scroll-link<?php echo esc_attr( $key == 0 ? ' current' : '' ) ?>"
                                    >
                                        <span><?php echo esc_html( $item['heading'] ); ?></span>
                                    </a>
                                </li>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="item-list">
                <?php
                foreach ( $course_list as $key => $item ) :
                    $term_ids = $item['tax_course'];
                    $limit = $item['limit'] ?? 4;
                    $order_by = $item['order_by'] ?? 'ID';
                    $order = $item['order'] ?? 'ASC';
                ?>
                    <div class="khoahocBox" id="nav-id-<?php echo esc_attr( $key + 1 ); ?>">
                        <div class="khoahocBox__head wow fadeInUp">
                            <div class="f-left">
                                <span class="f-left__num"><?php echo esc_html(str_pad(($key + 1), 2, '0', STR_PAD_LEFT)); ?></span>
                                <h3 class="f-left__title uppercase">
                                    <?php
                                    if ( !empty( $item['heading'] ) ) :
                                        echo esc_html( $item['heading'] );
                                    endif;
                                    ?>
                                </h3>
                            </div>

                            <div class="f-img">
                                <?php echo wp_get_attachment_image( $item['img_banner_id'], 'full' ); ?>
                            </div>
                        </div>

                        <?php if ( !empty( $term_ids ) ) :?>
                            <div class="khoahocBox__content">
                                <?php
                                foreach ( $term_ids as $index => $term_id ) :
                                    $term = get_term($term_id, 'eg_course_cat');

                                    $args = array(
                                        'post_type' => 'eg_course',
                                        'posts_per_page' => $limit,
                                        'orderby' => $order_by,
                                        'order' => $order,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'eg_course_cat',
                                                'field' => 'term_id',
                                                'terms' => $term_id,
                                            )
                                        )
                                    );

                                    $query = new WP_Query($args);
                                ?>
                                    <div class="kh-item">
                                        <div class="row">
                                            <div class="col-md-10 offset-md-2 col-xl-4 offset-xl-1">
                                                <div class="kh-item__title wow fadeInUp">
                                                    <span class="t-num"><small><?php echo esc_html(str_pad(($index + 1), 2, '0', STR_PAD_LEFT)); ?></small></span>

                                                    <h3 class="t-title">
                                                        <?php echo esc_html( $term->name ); ?>
                                                    </h3>

                                                    <div class="t-text">
                                                        <p><?php echo esc_html( $term->description ) ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-10 offset-md-2 col-xl-5 offset-xl-2">
                                                <?php if ( $query->have_posts() ) : ?>
                                                    <div class="kh-item__list">
                                                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                                            <div class="l-item wow fadeInUp">
                                                                <h3 class="l-title">
                                                                    <?php the_title(); ?>
                                                                </h3>

                                                                <div class="l-group">
                                                                    <div class="l-text">
                                                                        <?php the_content(); ?>
                                                                    </div>

                                                                    <div class="l-btn">
                                                                        <a href="<?php echo esc_url( everygolf_get_url_tpl_contact() ); ?>">
                                                                            <?php esc_html_e( 'Đăng ký', 'everygolf' ); ?>
                                                                            <span><i class="icon-arrow-right"></i></span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        endwhile;
                                                        wp_reset_postdata();
                                                        ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>