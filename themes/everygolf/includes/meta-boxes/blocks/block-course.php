<?php
function everygolf_cmb_block_course($prefix, $tpl_name, $extra_fields_top = [], $extra_fields_bottom = []): void
{
    $cmb_block_course_group = new_cmb2_box(array(
        'id' => $prefix . 'group',
        'title' => esc_html__('Khối: Khóa học', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array($tpl_name)),
    ));

    // style select
    $cmb_block_course_group->add_field(array(
        'name' => esc_html__('Chọn Kiểu Giao Diện', 'everygolf'),
        'id' => $prefix . 'style',
        'type' => 'select',
        'options' => array(
            'style-1' => esc_html__('Kiểu 1', 'everygolf'),
            'style-2' => esc_html__('Kiểu 2', 'everygolf'),
        ),
        'default' => 'style-1',
    ));

    // add fields top
    if (!empty($extra_fields_top) && is_array($extra_fields_top)) {
        foreach ($extra_fields_top as $field) {
            $cmb_block_course_group->add_field($field);
        }
    }

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
            // section display content
            array(
                'name' => esc_html__('Phần 1: Nội dung', 'everygolf'),
                'type' => 'title',
                'id' => 'section_display_content',
            ),

            array(
                'name' => esc_html__('Tiêu đề', 'everygolf'),
                'id' => 'title',
                'type' => 'text',
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập tiêu đề', 'everygolf'),
                ),
            ),

            array(
                'name' => esc_html__('Tiêu đề phụ', 'everygolf'),
                'id' => 'sub_title',
                'type' => 'text',
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập tiêu đề phụ', 'everygolf'),
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

            // section display media
            array(
                'name' => esc_html__('Phần 2: Media', 'everygolf'),
                'type' => 'title',
                'id' => 'section_display_media',
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
        ),
    ));

    // section hyperlinks
    $cmb_block_course_group->add_field(array(
        'name' => esc_html__('Phần: Liên kết', 'everygolf'),
        'type' => 'title',
        'id' => $prefix . 'section_hyperlinks',
    ));

    $cmb_block_course_group->add_field(array(
        'name' => esc_html__('Văn bản liên kết', 'everygolf'),
        'id' => $prefix . 'text_link',
        'type' => 'text',
        'default' => esc_html__('Đăng ký', 'everygolf'),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập văn bản', 'everygolf'),
        ),
    ));

    $cmb_block_course_group->add_field(array(
        'name' => esc_html__('Liên kết đến trang', 'everygolf'),
        'id' => $prefix . 'page_link',
        'type' => 'select',
        'options' => array('' => esc_html__('— Không chọn —', 'everygolf')) + wp_list_pluck(get_pages(), 'post_title', 'ID'),
        'placeholder' => esc_html__('Chọn một trang...', 'everygolf'),
    ));

    // add fields bottom
    if (!empty($extra_fields_bottom) && is_array($extra_fields_bottom)) {
        foreach ($extra_fields_bottom as $field) {
            $cmb_block_course_group->add_field($field);
        }
    }
}