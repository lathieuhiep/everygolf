<?php
add_action('init', 'everygolf_register_cpt_academy');
function everygolf_register_cpt_academy(): void
{
    $labels = array(
        'name' => esc_html__('Học viện', 'everygolf'),
        'singular_name' => esc_html__('Học viện', 'everygolf'),
        'menu_name' => esc_html__('Học viện', 'everygolf'),
        'name_admin_bar' => esc_html__('Học viện', 'everygolf'),
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
        'label' => esc_html__('Học viện', 'everygolf'),
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'hoc-vien'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-building',
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'show_in_rest' => true,
    );

    register_post_type('everygolf_academy', $args);
}

// Add custom columns post type in the admin area
add_filter('manage_everygolf_academy_posts_columns', function ($columns) {
    $columns['menu_order'] = 'Thứ tự';
    return $columns;
});

// Display the menu order in the custom column
add_action('manage_everygolf_academy_posts_custom_column', function ($column, $post_id) {
    if ('menu_order' === $column) {
        echo get_post_field('menu_order', $post_id);
    }
}, 10, 2);