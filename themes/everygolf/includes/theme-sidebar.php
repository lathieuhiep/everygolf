<?php
if (!defined('ABSPATH')) {
    exit;
}

function blank_wp_widgets_init(): void
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar CTA', 'everygolf'),
            'id' => 'sidebar-cta',
            'description' => esc_html__('Thêm widget sử dụng cho sidebar.', 'everygolf'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="title-title uppercase fz-72 title-effect-1 wow">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'blank_wp_widgets_init');