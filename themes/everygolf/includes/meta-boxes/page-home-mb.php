<?php
const template_home = 'page-templates/page-home.php';
const PREFIX_CMB_PAGE_HOME_HERO = 'cmb_page_home_hero_';
const PREFIX_CMB_PAGE_HOME_ABOUT_INFO = 'cmb_page_home_about_info_';
const PREFIX_CMB_PAGE_HOME_COURSE = 'cmb_page_home_course_';
const PREFIX_CMB_PAGE_HOME_NUMBERS = 'cmb_page_home_numbers_';
const PREFIX_CMB_PAGE_HOME_COACH = 'cmb_page_home_coach_';
const PREFIX_CMB_PAGE_HOME_INDOOR_SPACE = 'cmb_page_home_indoor_space_';

// create cmb blocks for home page
add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_page_home');
function everygolf_register_custom_fields_for_page_home(): void
{
    everygolf_cmb_block_slide(PREFIX_CMB_PAGE_HOME_HERO, template_home);

    everygolf_cmb_block_about_info(PREFIX_CMB_PAGE_HOME_ABOUT_INFO, template_home);

    everygolf_cmb_block_course(PREFIX_CMB_PAGE_HOME_COURSE, template_home);

    everygolf_cmb_block_count_up(PREFIX_CMB_PAGE_HOME_NUMBERS, template_home);

    everygolf_cmb_block_query(
        PREFIX_CMB_PAGE_HOME_COACH,
        template_home,
        esc_html__('Đội ngũ', 'everygolf'),
        4,
        ['everygolf_coach'],
        [
            [
                'name' => esc_html__('Tiêu đề', 'everygolf'),
                'id' => PREFIX_CMB_PAGE_HOME_COACH . 'title',
                'type' => 'text',
                'sanitization_cb' => false,
                'escape_cb' => false,
                'default' => esc_html__('Đội ngũ<br>chuyên gia', 'everygolf'),
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
                ),
            ]
        ]
    );

    everygolf_cmb_block_indoor_space(PREFIX_CMB_PAGE_HOME_INDOOR_SPACE, template_home);
}