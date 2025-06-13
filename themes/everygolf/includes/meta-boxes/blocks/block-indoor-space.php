<?php
function everygolf_cmb_block_indoor_space($prefix, $tpl_name): void
{
    $cmb_indoor_space_group = new_cmb2_box(array(
        'id' => $prefix . 'group',
        'title' => esc_html__('Khối: Không gian trong nhà', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array($tpl_name)),
    ));

    $cmb_indoor_space_group->add_field(array(
        'name' => esc_html__('Tiêu đề', 'everygolf'),
        'id' => $prefix . 'title',
        'type' => 'text',
        'default' => esc_html__('Welcome to the great indoors', 'everygolf'),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
        ),
    ));

    $cmb_indoor_space_group->add_field(array(
        'name' => esc_html__('Danh sách', 'everygolf'),
        'id' => $prefix . 'list',
        'type' => 'group',
        'repeatable' => true,
        'sortable' => true,
        'options' => [
            'group_title' => 'Không gian {#}',
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
                'default' => esc_html__('Tiêu đề', 'everygolf'),
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập tiêu đề', 'everygolf'),
                ),
            ),

            array(
                'name' => esc_html__('Tiêu đề phụ', 'everygolf'),
                'id' => 'sub_title',
                'type' => 'text',
                'default' => esc_html__('Tiêu đề phụ', 'everygolf'),
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập tiêu đề phụ', 'everygolf'),
                ),
            ),

            array(
                'name' => esc_html__('Ảnh', 'everygolf'),
                'id' => 'img',
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
            ),
        ),
    ));
}