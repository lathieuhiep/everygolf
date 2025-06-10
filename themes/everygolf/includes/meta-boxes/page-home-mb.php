<?php
// File: /your-theme/inc/custom-fields.php

add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_page_home');

function everygolf_register_custom_fields_for_page_home(): void
{
    require get_parent_theme_file_path( '/includes/meta-boxes/home/section-hero.php' );
    require get_parent_theme_file_path( '/includes/meta-boxes/home/section-about-info.php' );
}