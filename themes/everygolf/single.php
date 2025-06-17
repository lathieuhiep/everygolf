<?php
get_header();

    if ( have_posts() ) :
?>
    <section class="section sec-tintucDetail">
        <div class="container">
            <div class="row">
                <?php
                while (have_posts()) : the_post();
                    $categories = get_the_category();
                ?>
                    <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2">
                        <div class="item-head wow fadeInUp">
                            <?php if ( !empty( $categories ) ) : ?>
                                <div class="cat-list">
                                    <?php foreach ( $categories as $category ) : ?>
                                        <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="postBox__cat">
                                            <?php echo esc_html( $category->name ); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <h1 class="postBox__title">
                                <?php the_title() ?>
                            </h1>

                            <p class="postBox__text">
                                <?php echo get_the_excerpt(); ?>
                            </p>
                        </div>

                        <div class="item-img wow fadeInUp">
                            <?php the_post_thumbnail( 'full' ); ?>
                        </div>

                        <div class="item-entry wow fadeInUp">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php get_template_part( 'template-parts/components/inc', 'related-post' ); ?>
        </div>
    </section>
<?php
    endif;

get_footer();