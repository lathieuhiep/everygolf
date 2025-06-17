<?php
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