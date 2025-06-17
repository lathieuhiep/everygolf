<?php
function everygolf_register_cpt_course(): void
{
    // Register custom post type
    $labels = array(
        'name' => esc_html__('Khóa học', 'everygolf'),
        'singular_name' => esc_html__('Khóa học', 'everygolf'),
        'menu_name' => esc_html__('Khóa học', 'everygolf'),
        'name_admin_bar' => esc_html__('Khóa học', 'everygolf'),
        'add_new' => esc_html__('Thêm', 'everygolf'),
        'add_new_item' => esc_html__('Thêm', 'everygolf'),
        'new_item' => esc_html__('Mới', 'everygolf'),
        'edit_item' => esc_html__('Sửa', 'everygolf'),
        'view_item' => esc_html__('Xem', 'everygolf'),
        'all_items' => esc_html__('Tất cả', 'everygolf'),
        'search_items' => esc_html__('Tìm kiếm', 'everygolf'),
        'not_found' => esc_html__('Không tìm thấy', 'everygolf'),
        'not_found_in_trash' => esc_html__('Không có trong thùng rác', 'everygolf'),
    );

    $args = array(
        'label' => esc_html__('Khóa học', 'everygolf'),
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'khoa-hoc'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'show_in_rest' => true,
    );

    register_post_type('eg_course', $args);

    // register taxonomy
    $tax_args = array(
        'hierarchical' => true,
        'labels' => array(
            'name' => esc_html__('Danh mục khóa học', 'everygolf'),
            'singular_name' => esc_html__('Danh mục', 'everygolf'),
            'search_items' => esc_html__('Tìm kiếm danh mục', 'everygolf'),
            'all_items' => esc_html__('Tất cả danh mục', 'everygolf'),
            'parent_item' => esc_html__('Danh mục cha', 'everygolf'),
            'parent_item_colon' => esc_html__('Danh mục cha:', 'everygolf'),
            'edit_item' => esc_html__('Chỉnh sửa danh mục', 'everygolf'),
            'update_item' => esc_html__('Cập nhật danh mục', 'everygolf'),
            'add_new_item' => esc_html__('Thêm danh mục mới', 'everygolf'),
            'new_item_name' => esc_html__('Tên danh mục mới', 'everygolf'),
            'menu_name' => esc_html__('Danh mục', 'everygolf'),
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'danh-muc-khoa-hoc'),
    );
    register_taxonomy('eg_course_cat', array('eg_course'), $tax_args);
}

add_action('init', 'everygolf_register_cpt_course');

// Add custom columns post type in the admin area
add_filter('manage_eg_course_posts_columns', function ($columns) {
    $columns['menu_order'] = 'Thứ tự';
    return $columns;
});

// Display the menu order in the custom column
add_action('manage_eg_course_posts_custom_column', function ($column, $post_id) {
    if ('menu_order' === $column) {
        echo get_post_field('menu_order', $post_id);
    }
}, 10, 2);