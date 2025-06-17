<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Link Pages
function everygolf_link_page(): void {
    wp_link_pages( array(
        'before'      => '<div class="page-links">' . esc_html__( 'Trang:', 'everygolf' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
    ) );
}

// Get Page Link Info by Template File
function everygolf_get_page_link_info_by_template_file( $template_slug ): bool|array
{
    if ( empty( $template_slug ) ) {
        return false;
    }

    $query = new WP_Query( array(
        'post_type'      => 'page',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'fields'         => 'ids',
        'meta_key'       => '_wp_page_template',
        'meta_value'     => $template_slug,
        'no_found_rows'  => true,
        'cache_results'  => true,
    ) );

    if ( ! empty( $query->posts[0] ) ) {
        $page_id = $query->posts[0];
        return array(
            'url'   => get_permalink( $page_id ),
            'title' => get_the_title( $page_id ),
        );
    }

    return false;
}

// Get URL Template Contact
function everygolf_get_url_tpl_contact(): string
{
    $page = everygolf_get_page_link_info_by_template_file( 'page-templates/page-contact.php' );

    return $page ? $page['url'] : '#';
}

// Pagination
function everygolf_pagination(): void {
    $pagination = paginate_links(array(
        'mid_size'           => 2,
        'prev_text'          => '<i class="icon-arrow-left"></i>',
        'next_text'          => '<i class="icon-arrow-right"></i>',
        'screen_reader_text' => '&nbsp;', // ẩn text screen reader
        'type'               => 'array',  // lấy về dạng mảng
    ));

    if ( is_array($pagination) ) :
    ?>
        <div class="pagination-wrap wow fadeInUp">
            <ul class="pagination">
                <?php foreach ( $pagination as $page ) : ?>
                    <li>
                        <?php echo $page; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php
    endif;
}