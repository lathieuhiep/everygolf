<?php
$cmb_page_home_hero_group = new_cmb2_box(array(
    'id' => PREFIX_CMB_PAGE_HOME_HERO . 'group',
    'title' => esc_html__('Khối: Hero', 'everygolf'),
    'object_types' => array('page'),
    'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_home)),
));

$cmb_page_home_hero_group->add_field(array(
    'name' => esc_html__('Danh sách slide', 'everygolf'),
    'id' => PREFIX_CMB_PAGE_HOME_HERO . 'slides',
    'type' => 'group',
    'repeatable' => true,
    'sortable' => true,
    'options' => [
        'group_title' => 'Slide {#}',
        'add_button' => esc_html__('Thêm', 'everygolf'),
        'remove_button' => esc_html__('Xóa', 'everygolf'),
        'sortable' => true,
        'closed' => true,
    ],
    'fields' => array(
        array(
            'name' => esc_html__('Ảnh nền PC', 'everygolf'),
            'id' => 'bg_pc',
            'type' => 'file',
            'preview_size' => array(300, 300),
            'options' => array(
                'url' => false,
            ),
            'text' => array(
                'add_upload_file_text' => esc_html__('Chọn ảnh PC', 'everygolf'),
            ),
            'query_args' => array(
                'type' => array('image/jpg', 'image/jpeg', 'image/png', 'image/webp'),
            ),
        ),

        array(
            'name' => esc_html__('Ảnh nền Mobile', 'everygolf'),
            'id' => 'bg_mb',
            'type' => 'file',
            'preview_size' => array(300, 300),
            'options' => array(
                'url' => false,
            ),
            'text' => array(
                'add_upload_file_text' => esc_html__('Chọn ảnh Mobile', 'everygolf'),
            ),
            'query_args' => array(
                'type' => array('image/jpg', 'image/jpeg', 'image/png', 'image/webp'),
            ),
        ),

        array(
            'name' => esc_html__('Tiêu đề (HTML hoặc SVG)', 'everygolf'),
            'id' => 'hero_title',
            'type' => 'textarea',
            'sanitization_cb' => false,
            'escape_cb' => false,
            'desc' => esc_html__('Bạn có thể nhập thẻ <h2>...</h2> hoặc cả đoạn mã SVG.', 'everygolf'),
            'attributes' => array(
                'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
                'rows' => 5,
                'style' => 'width: 100%;'
            ),
        )
    ),
));