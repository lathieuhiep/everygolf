<?php
const template_learn_practice = 'page-templates/page-learn-practice.php';
const PREFIX_CMB_PAGE_LEARN_PRACTICE_HERO = 'cmb_page_learn_practice_hero_';
const PREFIX_CMB_PAGE_LEARN_PRACTICE_COURSE = 'cmb_page_learn_practice_course_';

// create cmb blocks for home page
add_action('cmb2_admin_init', 'everygolf_register_cmb_page_learn_practice');
function everygolf_register_cmb_page_learn_practice(): void
{
    // Hero block
    $cmb_page_learn_practice_hero_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_PAGE_LEARN_PRACTICE_HERO . 'group',
        'title' => esc_html__('Khối: Hero', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_learn_practice)),
    ));

    $cmb_page_learn_practice_hero_group->add_field([
        'name' => esc_html__('Tiêu đề', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_LEARN_PRACTICE_HERO . 'heading',
        'type' => 'text',
        'sanitization_cb' => false,
        'escape_cb' => false,
        'default' => esc_html__('Học<br>Tập luyện<br>Chia sẻ<br>Đấu giải', 'everygolf'),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
        ),
    ]);

    $cmb_page_learn_practice_hero_group->add_field([
        'name' => esc_html__('Tiêu đề phụ', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_LEARN_PRACTICE_HERO . 'sub_heading',
        'type' => 'text',
        'sanitization_cb' => false,
        'escape_cb' => false,
        'default' => esc_html__('Ready<br>For...', 'everygolf'),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
        ),
    ]);

    // Course list block
    $cmb_page_learn_practice_course_list_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_PAGE_LEARN_PRACTICE_COURSE . 'group',
        'title' => esc_html__('Khối: Danh sách khóa học', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_learn_practice)),
    ));

    $cmb_page_learn_practice_course_list_group->add_field(array(
        'name' => esc_html__('Danh sách', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_LEARN_PRACTICE_COURSE . 'list',
        'type' => 'group',
        'repeatable' => true,
        'sortable' => true,
        'options' => [
            'group_title' => 'Danh sách {#}',
            'add_button' => esc_html__('Thêm', 'everygolf'),
            'remove_button' => esc_html__('Xóa', 'everygolf'),
            'sortable' => true,
            'closed' => true,
        ],
        'fields' => array(
            // section display banner
            array(
                'name' => esc_html__('Phần: Banner', 'everygolf'),
                'type' => 'title',
                'id' => 'section_display_banner',
            ),

            array(
                'name' => esc_html__('Tiêu đề', 'everygolf'),
                'id' => 'heading',
                'type' => 'text',
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập tiêu đề', 'everygolf'),
                ),
            ),

            array(
                'name' => esc_html__('Ảnh banner', 'everygolf'),
                'id' => 'img_banner',
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

            // section display query
            array(
                'name' => esc_html__('Phần: Chọn khóa học', 'everygolf'),
                'type' => 'title',
                'id' => 'section_display_course_query',
            ),

            array(
                'name' => esc_html__('Danh mục khóa học', 'everygolf'),
                'id' => 'tax_course',
                'type' => 'term_ajax_search',
                'multiple-item' => true,
                'limit' => -1,
                'sortable' => true,
                'desc' => esc_html__('Chọn danh mục hiển thị. Nhập tên để tìm kiếm.', 'everygolf'),
                'query_args' => array(
                    'taxonomy' => 'everygolf_course_cat',
                    'hide_empty' => false,
                )
            ),

            array(
                'name' => esc_html__('Số lượng bài hiển thị', 'everygolf'),
                'id' => 'limit',
                'type' => 'text_small',
                'attributes' => array(
                    'type' => 'number',
                    'min' => 1,
                    'step' => 1,
                ),
                'default' => 3,
            ),

            array(
                'name' => esc_html__('Sắp xếp bài theo', 'everygolf'),
                'id' => 'order_by',
                'type' => 'select',
                'options' => array(
                    'ID' => esc_html__('ID', 'everygolf'),
                    'date' => esc_html__('Ngày đăng', 'everygolf'),
                    'title' => esc_html__('Tiêu đề', 'everygolf'),
                    'menu_order' => esc_html__('Thứ tự tùy chỉnh', 'everygolf'),
                ),
                'default' => 'ID',
            ),

            array(
                'name' => esc_html__('Thứ tự sắp xếp bài', 'everygolf'),
                'id' => 'order',
                'type' => 'select',
                'options' => array(
                    'ASC' => esc_html__('Tăng dần (cũ trước)', 'everygolf'),
                    'DESC' => esc_html__('Giảm dần (mới trước)', 'everygolf'),
                ),
                'default' => 'ASC',
            ),
        ),
    ));
}