<?php
$cmb_page_home_coach_group = new_cmb2_box(array(
    'id' => PREFIX_CMB_PAGE_HOME_COACH . 'group',
    'title' => esc_html__('Khối: Đội ngũ', 'everygolf'),
    'object_types' => array('page'),
    'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_home)),
));

$cmb_page_home_coach_group->add_field(array(
    'name' => esc_html__('Tiêu đề', 'everygolf'),
    'id' => PREFIX_CMB_PAGE_HOME_COACH . 'title',
    'type' => 'text',
    'sanitization_cb' => false,
    'escape_cb' => false,
    'default' => esc_html__('Đội ngũ<br>chuyên gia', 'everygolf'),
    'attributes' => array(
        'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
    ),
));

$cmb_page_home_coach_group->add_field(array(
    'name' => esc_html__('Số lượng hiển thị', 'everygolf'),
    'id' => PREFIX_CMB_PAGE_HOME_COACH . 'limit',
    'type' => 'text_small',
    'attributes' => array(
        'type' => 'number',
        'min' => 1,
        'step' => 1,
    ),
    'default' => 4,
));

$cmb_page_home_coach_group->add_field(array(
    'name' => esc_html__('Sắp xếp theo', 'everygolf'),
    'id' => PREFIX_CMB_PAGE_HOME_COACH . 'order_by',
    'type' => 'select',
    'options' => array(
        'ID' => esc_html__('ID', 'everygolf'),
        'date' => esc_html__('Ngày đăng', 'everygolf'),
        'title' => esc_html__('Tiêu đề', 'everygolf'),
        'menu_order' => esc_html__('Thứ tự tùy chỉnh', 'everygolf'),
    ),
    'default' => 'ID',
));

$cmb_page_home_coach_group->add_field(array(
    'name' => esc_html__('Thứ tự sắp xếp', 'everygolf'),
    'id' => PREFIX_CMB_PAGE_HOME_COACH . 'order',
    'type' => 'select',
    'options' => array(
        'ASC' => esc_html__('Tăng dần (cũ trước)', 'everygolf'),
        'DESC' => esc_html__('Giảm dần (mới trước)', 'everygolf'),
    ),
    'default' => 'ASC',
));

$cmb_page_home_coach_group->add_field(array(
    'name' => esc_html__('Chọn đội ngũ', 'everygolf'),
    'id' => PREFIX_CMB_PAGE_HOME_COACH . 'select_coaches',
    'type' => 'post_ajax_search',
    'multiple-item' => true,
    'sortable' => true,
    'desc' => esc_html__('Sử dụng thì số lượng và sắp xếp sẽ nhận theo trường này. Nhập tên để tìm kiếm.', 'everygolf'),
    'query_args' => array(
        'post_type' => array('everygolf_coach'),
        'post_status' => array('publish'),
    )
));