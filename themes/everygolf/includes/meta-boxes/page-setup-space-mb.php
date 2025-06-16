<?php
const template_setup_space = 'page-templates/page-setup-space.php';
const PREFIX_CMB_PAGE_SETUP_SPACE_HERO = 'cmb_page_setup_space_hero_';
const PREFIX_CMB_PAGE_SETUP_SPACE_ROOM = 'cmb_page_setup_space_room_';

add_action('cmb2_admin_init', 'everygolf_register_cmb_page_setup_space');
function everygolf_register_cmb_page_setup_space(): void
{
    // Hero block
    $cmb_page_setup_space_hero_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_PAGE_SETUP_SPACE_HERO . 'group',
        'title' => esc_html__('Khối: Hero', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_setup_space)),
    ));

    $cmb_page_setup_space_hero_group->add_field([
        'name' => esc_html__('Tiêu đề', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_SETUP_SPACE_HERO . 'heading',
        'type' => 'text',
        'sanitization_cb' => false,
        'escape_cb' => false,
        'default' => esc_html__('Setup<br>phòng golf<br>tại nơi<br>bạn muốn<br>tại...', 'everygolf'),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
            'style' => 'width: 100%'
        ),
    ]);

    $cmb_page_setup_space_hero_group->add_field([
        'name' => esc_html__('Nội dung', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_SETUP_SPACE_HERO . 'sub_heading',
        'type' => 'textarea',
        'sanitization_cb' => false,
        'escape_cb' => false,
        'default' => esc_html__('<span>35+</span><br>Dự án thành công', 'everygolf'),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
            'style' => 'width: 100%'
        ),
    ]);

    $cmb_page_setup_space_hero_group->add_field(array(
        'name' => esc_html__('Ảnh nền pc', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_SETUP_SPACE_HERO . 'img_pc',
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

    $cmb_page_setup_space_hero_group->add_field(array(
        'name' => esc_html__('Ảnh nền mobile', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_SETUP_SPACE_HERO . 'img_mb',
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

    // Room setup block
    $cmb_page_setup_space_room_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_PAGE_SETUP_SPACE_ROOM . 'group',
        'title' => esc_html__('Khối: Không gian', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_setup_space)),
    ));

    $cmb_page_setup_space_room_group->add_field(array(
        'name' => esc_html__('Chọn không gian', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_SETUP_SPACE_ROOM . 'select_cpt',
        'type' => 'post_ajax_search',
        'multiple-item' => true,
        'sortable' => true,
        'desc' => esc_html__('Sử dụng thì số lượng và sắp xếp sẽ nhận theo trường này. Nhập tên để tìm kiếm.', 'everygolf'),
        'query_args' => array(
            'post_type' => 'eg_setup_space',
            'post_status' => array('publish'),
        )
    ));
}