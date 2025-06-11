<?php
$cmb_page_home_about_info_group = new_cmb2_box(array(
    'id' => PREFIX_CMB_PAGE_HOME_ABOUT_INFO . 'group',
    'title' => esc_html__('Khối: Thông tin', 'everygolf'),
    'object_types' => array('page'),
    'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_home)),
));

// section display
$cmb_page_home_about_info_group->add_field( array(
    'name' => esc_html__('Phần 1: Hiển thị', 'everygolf'),
    'type' => 'title',
    'id'   => PREFIX_CMB_PAGE_HOME_ABOUT_INFO . 'section_display',
) );

$cmb_page_home_about_info_group->add_field( array(
    'name' => esc_html__('Tiêu đề', 'everygolf'),
    'id'   => PREFIX_CMB_PAGE_HOME_ABOUT_INFO . 'title',
    'type' => 'textarea',
    'sanitization_cb' => false,
    'escape_cb' => false,
    'default' => esc_html__('When Golf<br>Passion<br>meet technology', 'everygolf'),
    'attributes' => array(
        'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
        'rows' => 5,
        'style' => 'width: 100%;'
    ),
) );

$cmb_page_home_about_info_group->add_field( array(
    'name' => esc_html__('Mô tả', 'everygolf'),
    'id'   => PREFIX_CMB_PAGE_HOME_ABOUT_INFO . 'desc',
    'type' => 'textarea',
    'sanitization_cb' => false,
    'escape_cb' => false,
    'default' => esc_html__('Với mong muốn cải tiến và định hình nền công nghiệp golf Việt Nam bằng sự đa dạng về dịch vụ. Everygolf cung cấp những giải pháp hiệu quả với nền tảng kiến thức sâu rộng của các chuyên gia hàng đầu.', 'everygolf'),
    'attributes' => array(
        'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
        'rows' => 5,
        'style' => 'width: 100%;'
    ),
) );

// section hyperlinks
$cmb_page_home_about_info_group->add_field( array(
    'name' => esc_html__('Phần 2: Liên kết', 'everygolf'),
    'type' => 'title',
    'id'   => PREFIX_CMB_PAGE_HOME_ABOUT_INFO . 'section_hyperlinks',
) );

$cmb_page_home_about_info_group->add_field( array(
    'name' => esc_html__('Tiêu đề liên kết', 'everygolf'),
    'id'   => PREFIX_CMB_PAGE_HOME_ABOUT_INFO . 'text_hyperlinks',
    'type' => 'text',
    'default' => esc_html__('Tìm hiểu', 'everygolf'),
    'attributes' => array(
        'placeholder' => esc_html__('Nhập tiêu đề liên kết', 'everygolf'),
    ),
) );

$cmb_page_home_about_info_group->add_field( array(
    'name'    => esc_html__('Liên kết đến trang', 'everygolf'),
    'id'      => PREFIX_CMB_PAGE_HOME_ABOUT_INFO . 'page_link',
    'type'    => 'select',
    'options' => wp_list_pluck( get_pages(), 'post_title', 'ID' ),
    'placeholder' => esc_html__('Chọn một trang...', 'everygolf'),
) );
