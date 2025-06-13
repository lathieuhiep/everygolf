<?php
function everygolf_cmb_block_banner_hero($prefix, $tpl_name): void
{
    $cmb_block_banner_hero_group = new_cmb2_box(array(
        'id' => $prefix . 'group',
        'title' => esc_html__('Khối: Banner hero', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array($tpl_name)),
    ));

    // section display content
    $cmb_block_banner_hero_group->add_field(array(
        'name' => esc_html__('Phần: Nội dung', 'everygolf'),
        'type' => 'title',
        'id' => $prefix . 'sd_content',
    ));

    $cmb_block_banner_hero_group->add_field([
        'name' => esc_html__('Danh sách tiêu đề', 'everygolf'),
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

    $cmb_block_banner_hero_group->add_field(array(
        'name' => esc_html__('Mô tả', 'everygolf'),
        'id' => $prefix . 'desc',
        'type' => 'textarea',
        'sanitization_cb' => false,
        'escape_cb' => false,
        'attributes' => array(
            'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
            'rows' => 5,
            'style' => 'width: 100%;'
        ),
    ));

    // section display background
    $cmb_block_banner_hero_group->add_field(array(
        'name' => esc_html__('Phần: Background', 'everygolf'),
        'type' => 'title',
        'id' => $prefix . 'sd_bg',
    ));

    $cmb_block_banner_hero_group->add_field(array(
        'name' => esc_html__('Ảnh PC', 'everygolf'),
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

    $cmb_block_banner_hero_group->add_field(array(
        'name' => esc_html__('Ảnh MB', 'everygolf'),
        'id' => $prefix . 'img_mb',
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