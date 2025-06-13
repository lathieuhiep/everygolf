<?php
add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_page_about_us');

function everygolf_register_custom_fields_for_page_about_us(): void
{
    everygolf_cmb_block_about_hero(PREFIX_CMB_PAGE_ABOUT_US_HERO, template_about_us);
    everygolf_cmb_block_count_up(PREFIX_CMB_PAGE_ABOUT_US_NUMBERS, template_about_us);
    everygolf_cmb_block_about_info(PREFIX_CMB_PAGE_ABOUT_US_INFO, template_about_us);
    everygolf_cmb_block_about_history(PREFIX_CMB_PAGE_ABOUT_US_HISTORY, template_about_us);
    everygolf_cmb_block_partner(PREFIX_CMB_PAGE_ABOUT_US_PARTNER, template_about_us);
    everygolf_cmb_block_course(PREFIX_CMB_PAGE_ABOUT_US_COURSE, template_about_us);
    everygolf_cmb_block_coach(PREFIX_CMB_PAGE_ABOUT_US_COACH, template_about_us);
}