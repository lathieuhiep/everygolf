<?php
const PREFIX_CMB_CPT_SETUP_SPACE = 'cmb_cpt_setup_space_';

// create cmb2 box for custom post type
add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_cpt_setup_space');

function everygolf_register_custom_fields_for_cpt_setup_space(): void
{
    $cmb_cpt_setup_space_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_CPT_SETUP_SPACE . 'group',
        'title' => esc_html__('Khối: Thông tin bổ sung', 'everygolf'),
        'object_types' => array('eg_setup_space'),
        'show_names' => true,
    ));

    $cmb_cpt_setup_space_group->add_field(array(
        'name' => esc_html__('Tiêu đề phụ', 'everygolf'),
        'id' => PREFIX_CMB_CPT_SETUP_SPACE . 'subtitle',
        'type' => 'text',
        'attributes' => array(
            'placeholder' => esc_html__('Nhập tiêu đề phụ', 'everygolf'),
        ),
    ));

    $cmb_cpt_setup_space_group->add_field(array(
        'name' => esc_html__('Gallery', 'everygolf'),
        'id' => PREFIX_CMB_CPT_SETUP_SPACE . 'galleries',
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

    $cmb_cpt_setup_space_group->add_field(array(
        'name' => esc_html__('Thông số', 'everygolf'),
        'id' => PREFIX_CMB_CPT_SETUP_SPACE . 'list',
        'type' => 'group',
        'repeatable' => true,
        'sortable' => true,
        'options' => [
            'group_title' => 'Thông số {#}',
            'add_button' => esc_html__('Thêm', 'everygolf'),
            'remove_button' => esc_html__('Xóa', 'everygolf'),
            'sortable' => true,
            'closed' => true,
        ],
        'fields' => array(
            array(
                'name' => esc_html__('Tiện ích', 'everygolf'),
                'id' => 'utilities',
                'type' => 'text',
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập giá trị', 'everygolf'),
                ),
            ),

            array(
                'name' => esc_html__('Tham số', 'everygolf'),
                'id' => 'parameter',
                'type' => 'text',
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập giá trị', 'everygolf'),
                ),
            ),
        ),
    ));
}