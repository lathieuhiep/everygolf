<?php
$cmb_page_about_us_hero_group = new_cmb2_box(array(
    'id' => PREFIX_CMB_PAGE_ABOUT_US_HERO . 'group',
    'title' => esc_html__('Khối: Giới thiệu', 'everygolf'),
    'object_types' => array('page'),
    'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_about_us)),
));

// section display pc
$cmb_page_about_us_hero_group->add_field(array(
    'name' => esc_html__('Hiển thị trên pc', 'everygolf'),
    'type' => 'title',
    'id' => PREFIX_CMB_PAGE_ABOUT_US_HERO . 'section_display_pc',
));

$cmb_page_about_us_hero_group->add_field(array(
    'name' => esc_html__('Ảnh', 'everygolf'),
    'id' => PREFIX_CMB_PAGE_ABOUT_US_HERO . 'img_pc',
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
));

$cmb_page_about_us_hero_group->add_field(array(
    'name' => esc_html__('Tiêu đề', 'everygolf'),
    'id' => PREFIX_CMB_PAGE_ABOUT_US_HERO . 'title_pc',
    'type' => 'text',
    'default' => esc_html__('Chúng tôi', 'everygolf'),
    'attributes' => array(
        'placeholder' => esc_html__('Nhập tiêu đề', 'everygolf'),
    ),
));

$cmb_page_about_us_hero_group->add_field([
    'name' => esc_html__('Danh sách chữ', 'everygolf'),
    'id' => PREFIX_CMB_PAGE_ABOUT_US_HERO . 'text_list',
    'type' => 'text',
    'repeatable' => true,
    'attributes' => array(
        'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
    ),
    'options' => [
        'add_row_text' => esc_html__('Thêm', 'everygolf'),
    ],
]);

// section display mobile
$cmb_page_about_us_hero_group->add_field(array(
    'name' => esc_html__('Hiển thị trên mobile', 'everygolf'),
    'type' => 'title',
    'id' => PREFIX_CMB_PAGE_ABOUT_US_HERO . 'section_display_mb',
));

$cmb_page_about_us_hero_group->add_field(array(
    'name' => esc_html__('Tiêu đề', 'everygolf'),
    'id' => PREFIX_CMB_PAGE_ABOUT_US_HERO . 'title_mb',
    'type' => 'text',
    'sanitization_cb' => false,
    'escape_cb' => false,
    'default' => esc_html__('Chúng tôi <br>định hình nền công nghiệp Golf', 'everygolf'),
    'attributes' => array(
        'placeholder' => esc_html__('Nhập tiêu đề', 'everygolf'),
    ),
));

// section display background
$cmb_page_about_us_hero_group->add_field(array(
    'name' => esc_html__('Ảnh chính', 'everygolf'),
    'type' => 'title',
    'id' => PREFIX_CMB_PAGE_ABOUT_US_HERO . 'section_display_bg',
));

$cmb_page_about_us_hero_group->add_field(array(
    'name' => esc_html__('Ảnh', 'everygolf'),
    'id' => PREFIX_CMB_PAGE_ABOUT_US_HERO . 'img_bg',
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
));