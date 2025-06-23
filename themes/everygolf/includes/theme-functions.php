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

// Get Contact Form 7
function everygolf_get_form_cf7(): array {
    $options = array();

    if ( function_exists( 'wpcf7' ) ) {
        $wpcf7_form_list = get_posts( array(
            'post_type'   => 'wpcf7_contact_form',
            'numberposts' => - 1,
        ) );

        $options[0] = esc_html__( 'Chọn contact form', 'everygolf' );

        if ( ! empty( $wpcf7_form_list ) && ! is_wp_error( $wpcf7_form_list ) ) :
            foreach ( $wpcf7_form_list as $item ) :
                $options[ $item->ID ] = $item->post_title;
            endforeach;
        else :
            $options[0] = esc_html__( 'Tạo form CF7', 'everygolf' );
        endif;
    }

    return $options;
}

// check spam cf7
if ( function_exists('wpcf7') ) {
    function everygolf_check_spam_form_cf7($html): string {
        ob_start();
    ?>
        <div class="d-none">
            <input class="wpcf7-form-control wpcf7-text" aria-invalid="false" value="" type="text" name="spam-email" aria-label="">
        </div>
    <?php
        $content = ob_get_contents();
        ob_end_clean();
        return $html . $content;
    }
    add_filter('wpcf7_form_elements', 'everygolf_check_spam_form_cf7');

    function everygolf_check_spam_form_cf7_valid($posted_data) {
        $submission = WPCF7_Submission::get_instance();
        $note_text = esc_html__('Đã có lỗi xảy ra', 'everygolf');

        if ( !empty($posted_data['spam-email']) || !isset($_POST['spam-email'])) {
            $submission->set_status( 'spam' );
            $submission->set_response( $note_text );
        }
        unset($posted_data['spam-email']);
        return $posted_data;
    }
    add_action('wpcf7_posted_data', 'everygolf_check_spam_form_cf7_valid');
}