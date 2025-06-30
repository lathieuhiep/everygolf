<?php
function everygolf_cmb_block_contact_info(
    $prefix,
    $tpl_name,
    $extra_fields_top = [],
    $extra_fields_bottom = []
): void
{
    $cmb_block_contact_info_group = new_cmb2_box(array(
        'id' => $prefix . 'group',
        'title' => esc_html__('Khối: Thông tin liên hệ', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array($tpl_name)),
    ));

    // add fields top
    if (!empty($extra_fields_top) && is_array($extra_fields_top)) {
        foreach ($extra_fields_top as $field) {
            $cmb_block_contact_info_group->add_field($field);
        }
    }

    // fields default
    $cmb_block_contact_info_group->add_field( array(
        'name' => esc_html__('Điện thoại', 'everygolf'),
        'id'   => $prefix . 'phone',
        'type' => 'text',
        'repeatable' => true,
        'attributes' => array(
            'placeholder' => esc_html__('Ví dụ: +84 868 336 368', 'everygolf'),
        ),
        'options' => [
            'add_row_text' => esc_html__('Thêm', 'everygolf'),
        ],
    ) );

    $cmb_block_contact_info_group->add_field( array(
        'name' => esc_html__('Email liên hệ', 'everygolf'),
        'id'   => $prefix . 'email',
        'type' => 'text_email',
        'default' => 'everygolf@gmail.com',
        'attributes' => array(
            'placeholder' => esc_html__('Nhập email', 'everygolf'),
            'style' => 'width: 100%;',
        ),
    ) );

    $cmb_block_contact_info_group->add_field( array(
        'name' => esc_html__('Trang website', 'everygolf'),
        'id'   => $prefix . 'website_url',
        'type' => 'text_url',
        'default' => 'everygolf.vn',
        'attributes' => array(
            'placeholder' => esc_html__('Nhập url', 'everygolf'),
            'style' => 'width: 100%;',
        ),
    ) );

    $cmb_block_contact_info_group->add_field( array(
        'name' => esc_html__('Facebook', 'everygolf'),
        'id'   => $prefix . 'facebook_url',
        'type' => 'text_url',
        'default' => 'https://www.facebook.com/EverygolfVN',
        'attributes' => array(
            'placeholder' => esc_html__('Nhập url', 'everygolf'),
            'style' => 'width: 100%;',
        ),
    ) );

    // add fields bottom
    if (!empty($extra_fields_bottom) && is_array($extra_fields_bottom)) {
        foreach ($extra_fields_bottom as $field) {
            $cmb_block_contact_info_group->add_field($field);
        }
    }
}