<?php
function everygolf_block_cmb_count_up($prefix, $tpl_name): void
{
    $cmb = new_cmb2_box(array(
        'id' => $prefix . 'group',
        'title' => esc_html__('Khối: Thống kê', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array($tpl_name)),
    ));

    $cmb->add_field(array(
        'name' => esc_html__('Danh sách thống kê', 'everygolf'),
        'id' => $prefix . 'list',
        'type' => 'group',
        'repeatable' => true,
        'sortable' => true,
        'options' => [
            'group_title' => 'Mục số {#}',
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
                'name' => esc_html__('Số đếm', 'everygolf'),
                'id'   => 'number',
                'type' => 'text_small',
                'default' => 10,
                'attributes' => array(
                    'type' => 'number',
                    'min'  => 0,
                ),
            ),

            array(
                'name' => esc_html__('Ký hiệu sau số', 'everygolf'),
                'id'   => 'suffix',
                'type' => 'text_small',
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập ký hiệu', 'everygolf'),
                ),
            )
        ),
    ));
}