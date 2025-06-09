<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function blank_wp_widgets_init(): void
{
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar chính', 'everygolf' ),
            'id'            => 'sidebar-main',
            'description'   => esc_html__( 'Thêm widget sử dụng cho sidebar.', 'everygolf' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'blank_wp_widgets_init' );