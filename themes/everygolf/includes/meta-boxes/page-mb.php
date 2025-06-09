<?php
// File: /your-theme/inc/custom-fields.php

add_action('cmb2_admin_init', 'register_custom_fields_for_page');

function register_custom_fields_for_page(): void
{

    // Tạo metabox áp dụng cho Page
    $cmb = new_cmb2_box(array(
        'id'           => 'page_group_metabox',
        'title'        => 'Thông tin nhóm tùy chỉnh',
        'object_types' => array('page'), // Áp dụng cho Page
    ));

    // Field nhóm (group field)
    $group_field_id = $cmb->add_field(array(
        'id'          => 'my_group_field',
        'type'        => 'group',
        'description' => 'Thêm các mục nhóm tùy chỉnh bên dưới:',
        'options'     => array(
            'group_title'   => 'Mục {#}', // {#} sẽ là số thứ tự
            'add_button'    => 'Thêm mục',
            'remove_button' => 'Xóa mục',
            'sortable'      => true,
            'closed' => true
        ),
    ));

    // Các field con trong nhóm
    $cmb->add_group_field($group_field_id, array(
        'name' => 'Tiêu đề',
        'id'   => 'title',
        'type' => 'text',
    ));

    $cmb->add_group_field($group_field_id, array(
        'name' => 'Mô tả',
        'id'   => 'description',
        'type' => 'wysiwyg',
        'options'    => array(
            'textarea_rows' => 5, // Số hàng mặc định
            'media_buttons' => false, // Có cho phép nút media không
        ),
    ));

    $cmb->add_group_field($group_field_id, array(
        'name' => 'Hình ảnh',
        'id'   => 'image',
        'type' => 'file',
    ));
}