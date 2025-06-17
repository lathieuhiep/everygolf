<?php
$term_ids  = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'ids' ) );

if ( !empty( $term_ids ) ) :
    $args = array(
        'post_type' => 'post',
        'cat' => $term_ids,
        'post__not_in' => array(get_the_ID()),
        'posts_per_page' => 3,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
?>
    <div class="col-xl-10 offset-xl-1">
        <div class="item-ralate">
            <h3 class="f-title fz-42 uppercase wow fadeInUp">
                <?php esc_html_e( 'Thông tin gần đây', 'everygolf' ); ?>
            </h3>

            <div class="postBox-list">
                <?php
                while ($query->have_posts()) : $query->the_post();
                    $categories = get_the_category();
                ?>
                    <div class="postBox wow fadeInUp">
                        <div class="row">
                            <div class="col-md-5 col-xl-5">
                                <a href="<?php the_permalink(); ?>" class="postBox__img">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            </div>

                            <div class="col-md-7 col-xl-7">
                                <div class="postBox__body">
                                    <h3 class="postBox__title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title() ?>
                                        </a>
                                    </h3>

                                    <p class="postBox__text">
                                        <?php echo get_the_excerpt() ?>
                                    </p>

                                    <div class="postBox__grow"></div>

                                    <div class="postBox__foot">
                                        <?php if ( !empty( $categories ) ) : ?>
                                            <div class="cat-list">
                                                <?php foreach ( $categories as $category ) : ?>
                                                    <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="postBox__cat">
                                                        <?php echo esc_html( $category->name ); ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>

                                        <a href="<?php the_permalink(); ?>" class="btn btn-fixLink btn-icon-right">
                                            <?php esc_html_e( 'Đọc thêm', 'everygolf' ); ?>
                                            <span><i class="icon-arrow-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php
    endif;
    wp_reset_postdata();
endif;