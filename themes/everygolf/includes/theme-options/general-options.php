<?php
global $prefix_theme_options;

$link = esc_url( 'https://loading.io/' );
// Create a section general
CSF::createSection( $prefix_theme_options, array(
    'title'  => esc_html__( 'Cài đặt chung', 'everygolf' ),
    'icon'   => 'fas fa-cog',
    'fields' => array(
        // logo
        array(
            'id'      => 'opt_general_logo',
            'type'    => 'media',
            'title'   => esc_html__( 'Chọn ảnh logo', 'everygolf' ),
            'library' => 'image',
            'url'     => false
        ),

        // email contact
        array(
            'id'       => 'opt_general_contact_email',
            'type'     => 'text',
            'title'    => esc_html__('Email liên hệ', 'everygolf'),
            'sanitize' => 'sanitize_email',
            'default'  => 'contact@everygolf.vn',
        ),
    )
) );