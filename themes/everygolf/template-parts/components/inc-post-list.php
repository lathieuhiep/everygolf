<?php
$current_object = $args["current_object"] ?? null;
$current_cat_name = ( isset($current_object->name) ) ? $current_object->name : '';
$current_cat_url = ( isset($current_object->term_id) ) ? get_category_link($current_object->term_id) : '';

if ( have_posts() ) :
?>

<div class="postBox-list">
    <?php
    while ( have_posts() ) : the_post();

        if ( !is_category() || !is_tag() || !is_tax() ) {
            $categories = get_the_category();

            $current_cat_name = !empty( $categories ) ? $categories[0]->name : '';
            $current_cat_url = !empty( $categories ) ? get_category_link( $categories[0]->term_id ) : '';
        }
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
                        <?php if ( $current_cat_url ) : ?>
                            <a class="postBox__cat d-md-none"
                               href="<?php echo esc_url( $current_cat_url ); ?>"
                            >
                                <?php echo esc_html( $current_cat_name ); ?>
                            </a>
                        <?php endif; ?>

                        <h3 class="postBox__title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title() ?>
                            </a>
                        </h3>

                        <p class="postBox__text">
                            <?php echo esc_html( get_the_excerpt() ) ?>
                        </p>

                        <div class="postBox__grow"></div>

                        <div class="postBox__foot">
                            <?php if ( $current_cat_url ) : ?>
                                <a class="postBox__cat d-none d-md-inline-flex"
                                   href="<?php echo esc_url( $current_cat_url ); ?>"
                                >
                                    <?php echo esc_html( $current_cat_name ); ?>
                                </a>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" class="btn btn-fixLink btn-icon-right">
                                <?php esc_html_e('Đọc thêm', 'everygolf'); ?>
                                <span><i class="icon-arrow-right"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

<?php
    everygolf_pagination();
else:
?>
    <p><?php esc_html_e('Không có bài viết nào.', 'everygolf'); ?></p>
<?php
endif;
wp_reset_postdata();