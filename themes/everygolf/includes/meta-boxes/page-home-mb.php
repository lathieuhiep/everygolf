<?php
add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_page_home');

function everygolf_register_custom_fields_for_page_home(): void
{
    everygolf_cmb_block_slide(PREFIX_CMB_PAGE_HOME_HERO, template_home);
    everygolf_cmb_block_about_info(PREFIX_CMB_PAGE_HOME_ABOUT_INFO, template_home);
    everygolf_cmb_block_course(PREFIX_CMB_PAGE_HOME_COURSE, template_home);
    everygolf_cmb_block_count_up(PREFIX_CMB_PAGE_HOME_NUMBERS, template_home);
    everygolf_cmb_block_coach(PREFIX_CMB_PAGE_HOME_COACH, template_home);
    everygolf_cmb_block_indoor_space(PREFIX_CMB_PAGE_HOME_INDOOR_SPACE, template_home);
}