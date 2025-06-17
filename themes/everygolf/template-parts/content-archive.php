<?php
// get current page number
$paged = max(1, get_query_var('paged'));

// get the current blog page ID
$blog_page_id = get_option('page_for_posts');

// get the current category ID
$current_object = get_queried_object();
$current_cat_id = ( isset($current_object->term_id) ) ? $current_object->term_id : 0;

// check if the current page is the blog home or a post type archive
$is_blog_home = is_home() || ( is_archive() && is_post_type_archive('post') );

// get categories
$categories = get_categories( array(
    'hide_empty' => true,
) );
?>

<section class="section sec-tintucPage">
    <?php
    get_template_part('template-parts/components/inc', 'post-featured', array(
        'paged' => $paged,
        'is_blog_home' => $is_blog_home,
        'current_object' => $current_object
    ));
    ?>

    <div class="item-content">
        <?php if ( $categories ) : ?>
            <div class="item-head" data-stickyFix=".item-content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="item-head__inner wow fadeInUp">
                                <div class="ul-menu onePageNav">
                                    <ul>
                                        <li>
                                            <a href="<?php echo esc_url(get_permalink($blog_page_id)); ?>"
                                               class="<?php echo ($is_blog_home && !$current_cat_id) ? 'current' : ''; ?>"
                                            >
                                                <span><?php esc_html_e('Tất cả'); ?></span>
                                            </a>
                                        </li>

                                        <?php foreach ( $categories as $category ) : ?>
                                            <li>
                                                <a href="<?php echo esc_url(get_category_link($category->term_id)) ?>"
                                                   class="<?php echo ($current_cat_id == $category->term_id) ? 'current' : ''; ?>"
                                                >
                                                    <span><?php echo esc_html($category->name); ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <?php
                    get_template_part('template-parts/components/inc', 'post-list' , array(
                        'current_object' => $current_object
                    ));
                    ?>

                    <?php
                    $contact_email = everygolf_get_option('opt_general_contact_email');

                    if ( $contact_email ) :
                    ?>
                        <div class="item-mail wow fadeInUp">
                            <a href="mailto:<?php echo esc_attr( $contact_email ) ?>">
                               <?php esc_html_e('MỌI NHU CẦU XUẤT BẢN VUI LÒNG LIÊN HỆ email', 'everygolf'); ?>

                               <?php echo esc_html( $contact_email ) ;?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>