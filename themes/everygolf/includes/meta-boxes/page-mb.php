<?php
const PREFIX_CMB_PAGE = [
    'menu' => 'cmb_page_menu_'
];

// create cmb blocks for page
add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_page');

function everygolf_register_custom_fields_for_page(): void
{
    $cmb_page_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_PAGE['menu'] . 'group',
        'title' => esc_html__('Khối: Menu', 'everygolf'),
        'object_types' => array('page'),
    ));

    // style select
    $cmb_page_group->add_field(array(
        'name' => esc_html__('Chọn kiểu menu', 'everygolf'),
        'id' => PREFIX_CMB_PAGE['menu'] . 'style',
        'type' => 'select',
        'options' => array(
            'fixed' => esc_html__('Fixed', 'everygolf'),
            'relative' => esc_html__('Relative', 'everygolf'),
        ),
        'default' => 'fixed',
    ));
}