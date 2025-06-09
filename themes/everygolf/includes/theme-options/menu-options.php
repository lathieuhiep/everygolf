<?php
global $prefix_theme_options;

// Create a section menu
CSF::createSection( $prefix_theme_options, array(
	'title'  => esc_html__( 'Menu', 'everygolf' ),
	'icon'   => 'fas fa-bars',
	'fields' => array(
		// Sticky menu
		array(
			'id'         => 'opt_menu_sticky',
			'type'       => 'switcher',
			'title'      => esc_html__( 'Menu cố định', 'everygolf' ),
			'text_on'    => esc_html__( 'Có', 'everygolf' ),
			'text_off'   => esc_html__( 'Không', 'everygolf' ),
			'text_width' => 80,
			'default'    => true
		),

		// Show cart
		array(
			'id'         => 'opt_menu_cart',
			'type'       => 'switcher',
			'title'      => esc_html__( 'Hiện thị giỏ hàng trên menu', 'everygolf' ),
			'text_on'    => esc_html__( 'Có', 'everygolf' ),
			'text_off'   => esc_html__( 'Không', 'everygolf' ),
			'text_width' => 80,
			'default'    => true
		),
	)
) );