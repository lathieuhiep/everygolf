<?php
$cmb_page_about_us_history_group = new_cmb2_box(array(
    'id' => PREFIX_CMB_PAGE_ABOUT_US_HISTORY . 'group',
    'title' => esc_html__('Khối: Lịch sử', 'everygolf'),
    'object_types' => array('page'),
    'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_about_us)),
));

$cmb_page_about_us_history_group->add_field(array(
    'name' => esc_html__('Danh sách', 'everygolf'),
    'id' => PREFIX_CMB_PAGE_ABOUT_US_HISTORY . 'list',
    'type' => 'group',
    'repeatable' => true,
    'sortable' => true,
    'options' => [
        'group_title' => 'Danh sách số {#}',
        'add_button' => esc_html__('Thêm', 'everygolf'),
        'remove_button' => esc_html__('Xóa', 'everygolf'),
        'sortable' => true,
        'closed' => true,
    ],
    'fields' => array(
        array(
            'name' => esc_html__('Tiêu đề', 'everygolf'),
            'id' => 'title',
            'type' => 'text',
            'sanitization_cb' => false,
            'escape_cb' => false,
            'attributes' => array(
                'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
                'style' => 'width: 100%;'
            ),
        ),

        array(
            'name' => esc_html__('Thời gian', 'everygolf'),
            'id' => 'timeline',
            'type' => 'text',
            'sanitization_cb' => false,
            'escape_cb' => false,
            'attributes' => array(
                'placeholder' => esc_html__('MM / YYYY', 'everygolf'),
            ),
        ),

        array(
            'name' => esc_html__('Mô tả', 'everygolf'),
            'id' => 'desc',
            'type' => 'textarea',
            'sanitization_cb' => false,
            'escape_cb' => false,
            'attributes' => array(
                'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
                'rows' => 5,
                'style' => 'width: 100%;'
            ),
        ),

        array(
            'name' => esc_html__('Ảnh chính', 'everygolf'),
            'id' => 'img',
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
        ),

        array(
            'name' => esc_html__('Ảnh phụ', 'everygolf'),
            'id' => 'img_thumbnail',
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
        ),
    ),
));