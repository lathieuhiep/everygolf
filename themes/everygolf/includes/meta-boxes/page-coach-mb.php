<?php
const template_coach = 'page-templates/page-coach.php';
const PREFIX_CMB_PAGE_COACH = [
    'text_banner' => 'cmb_page_coach_text_banner_',
    'img_grid' => 'cmb_page_coach_img_grid_',
    'tab_team' => 'cmb_page_coach_tab_team_',
];

add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_page_coach');
function everygolf_register_custom_fields_for_page_coach(): void
{
    // text banner group
    $cmb_text_banner_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_PAGE_COACH['text_banner'] . 'group',
        'title' => esc_html__('Khối: Giới thiệu', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_coach)),
    ));

    $cmb_text_banner_group->add_field( array(
        'name' => esc_html__('Tiêu đề', 'everygolf'),
        'id'   => PREFIX_CMB_PAGE_COACH['text_banner'] . 'heading',
        'type' => 'textarea',
        'sanitization_cb' => false,
        'escape_cb' => false,
        'default' => esc_html__('Đội ngũ <br>huấn luyện viên tại Everygolf', 'everygolf'),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập tiêu đề', 'everygolf'),
            'rows' => 5,
            'style' => 'width: 100%;'
        ),
    ) );

    // section img grid
    everygolf_cmb_block_img_grid(PREFIX_CMB_PAGE_COACH['img_grid'], template_coach);

    // team
    everygolf_cmb_block_query(
        PREFIX_CMB_PAGE_COACH['tab_team'],
        template_coach,
        esc_html__('Đội ngũ', 'everygolf'),
        6,
        ['everygolf_coach'],
        [
            [
                'name' => esc_html__('Tiêu đề', 'everygolf'),
                'id' => PREFIX_CMB_PAGE_COACH['tab_team'] . 'title',
                'type' => 'text',
                'sanitization_cb' => false,
                'escape_cb' => false,
                'default' => esc_html__('Đội ngũ chuyên gia', 'everygolf'),
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
                ),
            ]
        ]
    );
}