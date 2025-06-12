<?php
add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_page_about_us');

function everygolf_register_custom_fields_for_page_about_us(): void
{
    require get_parent_theme_file_path( '/includes/meta-boxes/tpl-about-us/section-about-hero.php' );
    require get_parent_theme_file_path( '/includes/meta-boxes/tpl-about-us/section-about-numbers.php' );
    require get_parent_theme_file_path( '/includes/meta-boxes/tpl-about-us/section-about-us-info.php' );
    require get_parent_theme_file_path( '/includes/meta-boxes/tpl-about-us/section-about-history.php' );
}