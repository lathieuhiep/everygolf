<?php
function everygolf_cmb_block_partner($prefix, $tpl_name): void
{
    $cmb_block_partner_group = new_cmb2_box(array(
        'id' => $prefix . 'group',
        'title' => esc_html__('Khối: Đối tác', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array($tpl_name)),
    ));

    $cmb_block_partner_group->add_field( array(
        'name' => esc_html__('Tiêu đề', 'everygolf'),
        'id'   => $prefix . 'title',
        'type' => 'text',
        'sanitization_cb' => false,
        'escape_cb' => false,
        'default' => esc_html__('Đối tác <br>của chúng tôi', 'everygolf'),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập tiêu đề', 'everygolf'),
            'style' => 'width: 100%;'
        ),
    ) );

    $cmb_block_partner_group->add_field(array(
        'name' => esc_html__('Thư viện ảnh (Gallery)', 'everygolf'),
        'id' => $prefix . 'gallery_images',
        'type' => 'file_list',
        'preview_size' => array(100, 100),
        'query_args' => array(
            'type' => array('image/jpg', 'image/jpeg', 'image/png', 'image/webp'),
        ),
        'text' => array(
            'add_upload_files_text' => esc_html__('Thêm', 'everygolf'),
            'remove_image_text' => esc_html__('Xóa', 'everygolf'),
        ),
    ));
}