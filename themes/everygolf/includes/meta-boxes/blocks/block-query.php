<?php
function everygolf_cmb_block_query(
    $prefix,
    $tpl_name,
    $name_group,
    $limit_default,
    $post_type = [],
    $extra_fields_top = [],
    $extra_fields_bottom = []
): void
{
    $cmb_block_query_group = new_cmb2_box(array(
        'id' => $prefix . 'group',
        'title' => esc_html__('Khối:', 'everygolf') . ' ' . $name_group,
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array($tpl_name)),
    ));

    // add fields top
    if (!empty($extra_fields_top) && is_array($extra_fields_top)) {
        foreach ($extra_fields_top as $field) {
            $cmb_block_query_group->add_field($field);
        }
    }

    // fields default
    $cmb_block_query_group->add_field(array(
        'name' => esc_html__('Số lượng hiển thị', 'everygolf'),
        'id' => $prefix . 'limit',
        'type' => 'text_small',
        'attributes' => array(
            'type' => 'number',
            'min' => 1,
            'step' => 1,
        ),
        'default' => $limit_default,
    ));

    $cmb_block_query_group->add_field(array(
        'name' => esc_html__('Sắp xếp theo', 'everygolf'),
        'id' => $prefix . 'order_by',
        'type' => 'select',
        'options' => array(
            'ID' => esc_html__('ID', 'everygolf'),
            'date' => esc_html__('Ngày đăng', 'everygolf'),
            'title' => esc_html__('Tiêu đề', 'everygolf'),
            'menu_order' => esc_html__('Thứ tự tùy chỉnh', 'everygolf'),
        ),
        'default' => 'ID',
    ));

    $cmb_block_query_group->add_field(array(
        'name' => esc_html__('Thứ tự sắp xếp', 'everygolf'),
        'id' => $prefix . 'order',
        'type' => 'select',
        'options' => array(
            'ASC' => esc_html__('Tăng dần (cũ trước)', 'everygolf'),
            'DESC' => esc_html__('Giảm dần (mới trước)', 'everygolf'),
        ),
        'default' => 'ASC',
    ));

    $cmb_block_query_group->add_field(array(
        'name' => esc_html__('Chọn đội ngũ', 'everygolf'),
        'id' => $prefix . 'select_coaches',
        'type' => 'post_ajax_search',
        'multiple-item' => true,
        'sortable' => true,
        'desc' => esc_html__('Sử dụng thì số lượng và sắp xếp sẽ nhận theo trường này. Nhập tên để tìm kiếm.', 'everygolf'),
        'query_args' => array(
            'post_type' => $post_type,
            'post_status' => array('publish'),
        )
    ));

    // add fields bottom
    if (!empty($extra_fields_bottom) && is_array($extra_fields_bottom)) {
        foreach ($extra_fields_bottom as $field) {
            $cmb_block_query_group->add_field($field);
        }
    }
}