<?php
if ( empty( $args ) ) return;

$paged = $args["paged"] ?? get_query_var('paged', 1);
$is_blog_home = $args["is_blog_home"] ?? false;
$current_object = $args["current_object"] ?? null;
$current_cat_id = ( isset($current_object->term_id) ) ? $current_object->term_id : 0;

if ( $paged == 1 && ( is_home() || is_archive() || is_post_type_archive('post') ) ) :
    $featured_args = [
        'posts_per_page' => 1,
        'post_type' => 'post',
        'ignore_sticky_posts' => true,
        'tax_query' => [],
    ];

    if (is_tax() || is_category() || is_tag()) {
        $featured_args['tax_query'][] = [
            'taxonomy' => $current_object->taxonomy,
            'field' => 'term_id',
            'terms' => $current_cat_id,
        ];
    }

    $featured_query = new WP_Query($featured_args);
?>

<div class="container">
    <div class="row">
        <div class="col-xl-10 offset-xl-1">
            <?php if ( $featured_query->have_posts() ) : ?>
                <div class="postFeatured">
                    <?php
                    while ( $featured_query->have_posts() ) : $featured_query->the_post();
                        $categories = get_the_category();
                        $cate = !empty($categories) ? $categories[0] : null;
                    ?>
                        <div class="row">
                            <div class="col-xl-7">
                                <a href="<?php the_permalink(); ?>" class="postBox__img wow fadeInUp">
                                    <?php the_post_thumbnail('full'); ?>
                                </a>
                            </div>

                            <div class="col-xl-5">
                                <div class="postBox__body wow fadeInUp" data-xl-wow-delay=".2s">
                                    <?php if ( $cate ) : ?>
                                        <a class="postBox__cat d-md-none"
                                           href="<?php echo esc_url(get_category_link($cate->term_id)); ?>"
                                        >
                                            <?php echo esc_html($cate->name); ?>
                                        </a>
                                    <?php endif; ?>

                                    <h3 class="postBox__title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>

                                    <p class="postBox__text">
                                        <?php echo esc_html( get_the_excerpt() ); ?>
                                    </p>

                                    <div class="postBox__grow"></div>

                                    <div class="postBox__foot">
                                        <?php if ( $cate ) : ?>
                                            <a class="postBox__cat d-none d-md-inline-flex"
                                               href="<?php echo esc_url(get_category_link($cate->term_id)); ?>"
                                            >
                                                <?php echo esc_html($cate->name); ?>
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
                    <?php endwhile; ?>
                </div>
            <?php
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

<?php
endif;