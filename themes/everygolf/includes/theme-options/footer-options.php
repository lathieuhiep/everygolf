<?php
global $prefix_theme_options;

//
// -> Create a section footer
CSF::createSection( $prefix_theme_options, array(
	'id'    => 'opt_footer_section',
	'icon'  => 'fas fa-stream',
	'title' => esc_html__( 'Chân trang', 'everygolf' ),
) );

// Copyright
CSF::createSection( $prefix_theme_options, array(
	'parent' => 'opt_footer_section',
	'title'  => esc_html__( 'Copyright', 'everygolf' ),
	'fields' => array(
		// content
		array(
			'id'            => 'opt_footer_copyright_content',
			'type'          => 'textarea',
			'title'         => esc_html__( 'Nội dung', 'everygolf' ),
			'media_buttons' => false,
			'default'       => esc_html__( 'Copyright @ 2025 Everygolf', 'everygolf' )
		),
	)
) );