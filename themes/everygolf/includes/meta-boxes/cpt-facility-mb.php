<?php
const PREFIX_CMB_CPT_FACILITY = 'cmb_cpt_facility_';

// create cmb
add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_cpt_facility');
function everygolf_register_custom_fields_for_cpt_facility(): void
{
    $cmb_cpt_facility_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_CPT_FACILITY . 'group',
        'title' => esc_html__('Khối: Thông tin bổ sung', 'everygolf'),
        'object_types' => array('everygolf_facility'),
        'show_names' => true,
    ));

    $cmb_cpt_facility_group->add_field(array(
        'name' => esc_html__('Tiêu đề phụ', 'everygolf'),
        'id' => PREFIX_CMB_CPT_FACILITY . 'sub_title',
        'type' => 'text',
        'attributes' => array(
            'placeholder' => esc_html__('Tiêu đề bổ trợ', 'everygolf'),
        ),
    ));

    $cmb_cpt_facility_group->add_field(array(
        'name' => esc_html__('Danh sách', 'everygolf'),
        'id' => PREFIX_CMB_CPT_FACILITY . 'list',
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
                'name' => esc_html__('Mô tả', 'everygolf'),
                'id' => 'desc',
                'type' => 'wysiwyg',
                'options' => array(
                    'textarea_rows' => 10,
                    'teeny' => false,
                    'tinymce' => true,
                    'quicktags' => true,
                ),
            ),
        ),
    ));
}