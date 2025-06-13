<?php
const PREFIX_CMB_CPT_COACH = 'cmb_cpt_coach_';

// create cmb2 box for custom post type 'everygolf_coach'
add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_cpt_coach');
function everygolf_register_custom_fields_for_cpt_coach(): void
{
    $cmb_cpt_coach_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_CPT_COACH . 'group',
        'title' => esc_html__('Khối: Thông tin bổ sung', 'everygolf'),
        'object_types' => array('everygolf_coach'),
        'show_names' => true,
    ));

    $cmb_cpt_coach_group->add_field(array(
        'name' => esc_html__('Chức danh / Vai trò', 'everygolf'),
        'id' => PREFIX_CMB_CPT_COACH . 'position',
        'type' => 'text',
        'attributes' => array(
            'placeholder' => esc_html__('Nhập chức danh', 'everygolf'),
        ),
    ));

    $cmb_cpt_coach_group->add_field(array(
        'name' => esc_html__('Chứng chỉ', 'everygolf'),
        'id' => PREFIX_CMB_CPT_COACH . 'certificates',
        'type' => 'text',
        'repeatable' => true,
        'text' => array(
            'add_row_text' => esc_html__('Thêm', 'everygolf'),
        ),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập chứng chỉ', 'everygolf'),
        ),
    ));

    $cmb_cpt_coach_group->add_field(array(
        'name' => esc_html__('Thư viện ảnh (Gallery)', 'everygolf'),
        'id' => PREFIX_CMB_CPT_COACH . 'gallery_images',
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