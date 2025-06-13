<?php
const template_academy = 'page-templates/page-academy.php';
const PREFIX_CMB_PAGE_ACADEMY = [
    'hero' => 'cmb_page_academy_banner_hero_'
];

// create cmb blocks for academy page
add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_page_academy');
function everygolf_register_custom_fields_for_page_academy(): void
{
    everygolf_cmb_block_banner_hero( PREFIX_CMB_PAGE_ACADEMY['hero'], template_academy );
}