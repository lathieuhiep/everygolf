<?php
function everygolf_cmb_block_about_hero($prefix, $tpl_name): void
{
    $cmb_block_about_hero_group = new_cmb2_box(array(
        'id' => $prefix . 'group',
        'title' => esc_html__('Khối: Giới thiệu', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array($tpl_name)),
    ));

    // section display pc
    $cmb_block_about_hero_group->add_field(array(
        'name' => esc_html__('Hiển thị trên pc', 'everygolf'),
        'type' => 'title',
        'id' => $prefix . 'section_display_pc',
    ));

    $cmb_block_about_hero_group->add_field(array(
        'name' => esc_html__('Ảnh', 'everygolf'),
        'id' => $prefix . 'img_pc',
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

    $cmb_block_about_hero_group->add_field(array(
        'name' => esc_html__('Tiêu đề', 'everygolf'),
        'id' => $prefix . 'title_pc',
        'type' => 'text',
        'default' => esc_html__('Chúng tôi', 'everygolf'),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập tiêu đề', 'everygolf'),
        ),
    ));

    $cmb_block_about_hero_group->add_field([
        'name' => esc_html__('Danh sách chữ', 'everygolf'),
        'id' => $prefix . 'text_list',
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
    $cmb_block_about_hero_group->add_field(array(
        'name' => esc_html__('Hiển thị trên mobile', 'everygolf'),
        'type' => 'title',
        'id' => $prefix . 'section_display_mb',
    ));

    $cmb_block_about_hero_group->add_field(array(
        'name' => esc_html__('Tiêu đề', 'everygolf'),
        'id' => $prefix . 'title_mb',
        'type' => 'text',
        'sanitization_cb' => false,
        'escape_cb' => false,
        'default' => esc_html__('Chúng tôi <br>định hình nền công nghiệp Golf', 'everygolf'),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập tiêu đề', 'everygolf'),
        ),
    ));

    // section display background
    $cmb_block_about_hero_group->add_field(array(
        'name' => esc_html__('Ảnh chính', 'everygolf'),
        'type' => 'title',
        'id' => $prefix . 'section_display_bg',
    ));

    $cmb_block_about_hero_group->add_field(array(
        'name' => esc_html__('Ảnh', 'everygolf'),
        'id' => $prefix . 'img_bg',
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
}