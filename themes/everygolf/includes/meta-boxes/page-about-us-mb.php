<?php
const template_about_us = 'page-templates/page-about-us.php';
const PREFIX_CMB_PAGE_ABOUT_US_HERO = 'cmb_page_about_us_hero_';
const PREFIX_CMB_PAGE_ABOUT_US_NUMBERS = 'cmb_page_about_us_numbers_';
const PREFIX_CMB_PAGE_ABOUT_US_INFO = 'cmb_page_about_us_info_';
const PREFIX_CMB_PAGE_ABOUT_US_HISTORY = 'cmb_page_about_us_history_';
const PREFIX_CMB_PAGE_ABOUT_US_PARTNER = 'cmb_page_about_us_partner_';
const PREFIX_CMB_PAGE_ABOUT_US_COURSE = 'cmb_page_about_us_course_';
const PREFIX_CMB_PAGE_ABOUT_US_COACH = 'cmb_page_about_us_coach_';

// create cmb blocks for about us page
add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_page_about_us');

function everygolf_register_custom_fields_for_page_about_us(): void
{
    everygolf_cmb_block_about_hero(PREFIX_CMB_PAGE_ABOUT_US_HERO, template_about_us);

    everygolf_cmb_block_count_up(PREFIX_CMB_PAGE_ABOUT_US_NUMBERS, template_about_us);

    everygolf_cmb_block_about_info(PREFIX_CMB_PAGE_ABOUT_US_INFO, template_about_us);

    everygolf_cmb_block_about_history(PREFIX_CMB_PAGE_ABOUT_US_HISTORY, template_about_us);

    everygolf_cmb_block_partner(PREFIX_CMB_PAGE_ABOUT_US_PARTNER, template_about_us);

    everygolf_cmb_block_course(PREFIX_CMB_PAGE_ABOUT_US_COURSE, template_about_us);

    everygolf_cmb_block_query(
        PREFIX_CMB_PAGE_ABOUT_US_COACH,
        template_about_us,
        esc_html__('Đội ngũ', 'everygolf'),
        6,
        ['everygolf_coach'],
        [
            [
                'name' => esc_html__('Tiêu đề', 'everygolf'),
                'id' => PREFIX_CMB_PAGE_ABOUT_US_COACH . 'title',
                'type' => 'text',
                'sanitization_cb' => false,
                'escape_cb' => false,
                'default' => esc_html__('Ban lãnh đạo', 'everygolf'),
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
                ),
            ]
        ]
    );
}