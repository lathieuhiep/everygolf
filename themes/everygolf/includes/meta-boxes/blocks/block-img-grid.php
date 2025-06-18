<?php
function everygolf_cmb_block_img_grid(
    $prefix,
    $tpl_name,
    $extra_fields_top = [],
    $extra_fields_bottom = []): void
{
    $cmb_block_img_grid_group = new_cmb2_box(array(
        'id' => $prefix . 'group',
        'title' => esc_html__('Khối: Image grid', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array($tpl_name)),
    ));

    // add fields top
    if (!empty($extra_fields_top) && is_array($extra_fields_top)) {
        foreach ($extra_fields_top as $field) {
            $cmb_block_img_grid_group->add_field($field);
        }
    }

    $cmb_block_img_grid_group->add_field(array(
        'name' => esc_html__('Phần: Nội dung', 'everygolf'),
        'type' => 'title',
        'id' => $prefix . 'sd_content',
    ));

    $cmb_block_img_grid_group->add_field(array(
        'name' => esc_html__('Mô tả', 'everygolf'),
        'id' => $prefix . 'desc',
        'type' => 'wysiwyg',
        'sanitization_cb' => false,
        'escape_cb' => false,
        'attributes' => array(
            'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
            'rows' => 5,
            'style' => 'width: 100%;'
        ),
    ));

    $everygolf_cmb_slogan = [
        esc_html__('Chuyên nghiệp', 'everygolf'),
        esc_html__('Tận tâm', 'everygolf'),
        esc_html__('Tâm huyết', 'everygolf')
    ];
    foreach ($everygolf_cmb_slogan as $key => $value) :
        $cmb_block_img_grid_group->add_field(array(
            'name' => esc_html__('Phần: Slogan', 'everygolf') . ' ' . $key + 1,
            'type' => 'title',
            'id' => $prefix . 'sd_slogan_' . $key + 1,
        ));

        $cmb_block_img_grid_group->add_field(array(
            'name' => esc_html__('Tiêu đề slogan', 'everygolf'),
            'id' => $prefix . 'title_slogan_' . $key + 1,
            'type' => 'text',
            'default' => $value,
            'attributes' => array(
                'placeholder' => esc_html__('Nhập slogan', 'everygolf'),
            ),
        ));

        $cmb_block_img_grid_group->add_field(array(
            'name' => esc_html__('Ảnh', 'everygolf'),
            'id' => $prefix . 'img_slogan_' . $key + 1,
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
    endforeach;

    // add fields bottom
    if (!empty($extra_fields_bottom) && is_array($extra_fields_bottom)) {
        foreach ($extra_fields_bottom as $field) {
            $cmb_block_img_grid_group->add_field($field);
        }
    }
}