<?php
function everygolf_cmb_block_course($prefix, $tpl_name): void
{
    $cmb_block_course_group = new_cmb2_box(array(
        'id' => $prefix . 'group',
        'title' => esc_html__('Khối: Khóa học', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array($tpl_name)),
    ));

    // Add fields to the group course list
    $cmb_block_course_group->add_field(array(
        'name' => esc_html__('Danh sách khóa học', 'everygolf'),
        'id' => $prefix . 'list',
        'type' => 'group',
        'repeatable' => true,
        'sortable' => true,
        'options' => [
            'group_title' => 'Khóa học {#}',
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
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập tiêu đề', 'everygolf'),
                ),
            ),

            array(
                'name' => esc_html__('Ảnh nền PC', 'everygolf'),
                'id' => 'bg_pc',
                'type' => 'file',
                'preview_size' => array(300, 300),
                'options' => array(
                    'url' => false,
                ),
                'text' => array(
                    'add_upload_file_text' => esc_html__('Chọn ảnh PC', 'everygolf'),
                ),
                'query_args' => array(
                    'type' => array('image/jpg', 'image/jpeg', 'image/png', 'image/webp'),
                ),
            ),

            array(
                'name' => esc_html__('Ảnh nền Mobile', 'everygolf'),
                'id' => 'bg_mb',
                'type' => 'file',
                'preview_size' => array(300, 300),
                'options' => array(
                    'url' => false,
                ),
                'text' => array(
                    'add_upload_file_text' => esc_html__('Chọn ảnh Mobile', 'everygolf'),
                ),
                'query_args' => array(
                    'type' => array('image/jpg', 'image/jpeg', 'image/png', 'image/webp'),
                ),
            ),

            array(
                'name' => esc_html__('Mô tả', 'everygolf'),
                'id' => 'desc',
                'type' => 'textarea',
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
                    'rows' => 5,
                    'style' => 'width: 100%;'
                )
            )
        ),
    ));
}