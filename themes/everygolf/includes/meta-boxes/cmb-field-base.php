<?php

// options page link
function everygolf_cmb_set_page_link($prefix): array
{
    return [
        [
            'name' => esc_html__('Phần: Liên kết', 'everygolf'),
            'type' => 'title',
            'id'   => $prefix . 'section_link',
        ],
        [
            'name' => esc_html__('Tiêu đề liên kết', 'everygolf'),
            'id'   => $prefix . 'text_link',
            'type' => 'text',
            'default' => esc_html__('Đăng ký', 'everygolf'),
            'attributes' => array(
                'placeholder' => esc_html__('Nhập tiêu đề liên kết', 'everygolf'),
            ),
        ],
        [
            'name'    => esc_html__('Liên kết đến trang', 'everygolf'),
            'id'      => $prefix . 'url',
            'type'    => 'select',
            'options' => array( '' => esc_html__('— Không chọn —', 'everygolf') ) + wp_list_pluck( get_pages(), 'post_title', 'ID' ),
            'placeholder' => esc_html__('Chọn một trang...', 'everygolf'),
        ]
    ];
}

// options page image
function everygolf_cmb_option_image($prefix): array
{
    return [
        'name' => esc_html__('Ảnh', 'everygolf'),
        'id' => $prefix . 'img',
        'type' => 'file',
        'preview_size' => array(300, 300),
        'options' => array(
            'url' => false,
        ),
        'text' => array(
            'add_upload_file_text' => esc_html__('Chọn ảnh', 'everygolf'),
        ),
        'query_args' => array(
            'type' => array('image/jpg', 'image/jpeg', 'image/png', 'image/webp'),
        ),
    ];
}

// option title
function everygolf_cmb_option_title($prefix, $name = '', $txt_default = ''): array
{
    if (empty( $name )) {
        $name = esc_html__('Tiêu đề', 'everygolf');
    }

    return [
        'name' => $name,
        'id' => $prefix . 'title',
        'type' => 'text',
        'sanitization_cb' => false,
        'escape_cb' => false,
        'default' => $txt_default,
        'attributes' => array(
            'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
        ),
    ];
}

function everygolf_cmb_option_search_cpt($prefix, $name, $post_type): array
{
    if ( empty( $name ) ) {
        $name = esc_html__('Chọn bài viết', 'everygolf');
    }

    return [
        'name' => $name,
        'id' => $prefix . 'post_ids',
        'type' => 'post_ajax_search',
        'multiple-item' => true,
        'sortable' => true,
        'desc' => esc_html__('Sử dụng thì số lượng và sắp xếp sẽ nhận theo trường này. Nhập tên để tìm kiếm.', 'everygolf'),
        'query_args' => array(
            'post_type' => $post_type,
            'post_status' => array('publish'),
        )
    ];
}

// option term
function everygolf_cmb_option_term($prefix, $name, $taxonomy): array
{
    if ( empty( $name ) ) {
        $name = esc_html__('Danh mục', 'everygolf');
    }

    return [
        'name' => $name,
        'id' => $prefix . 'term_id',
        'type' => 'term_ajax_search',
        'multiple-item' => true,
        'limit' => -1,
        'sortable' => true,
        'desc' => esc_html__('Chọn danh mục hiển thị. Nhập tên để tìm kiếm.', 'everygolf'),
        'query_args' => array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        )
    ];
}