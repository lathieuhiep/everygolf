<?php
const template_academy = 'page-templates/page-academy.php';
const PREFIX_CMB_PAGE_ACADEMY = [
    'hero' => 'cmb_page_academy_banner_hero_',
    'cpt' => 'cmb_page_academy_cpt_',
    'location' => 'cmb_page_academy_location_',
    'cpt_facility' => 'cmb_page_academy_cpt_facility_',
    'img_grid' => 'cmb_page_academy_img_grid_',
];

// create cmb blocks for academy page
add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_page_academy');
function everygolf_register_custom_fields_for_page_academy(): void
{
    // section hero
    everygolf_cmb_block_banner_hero( PREFIX_CMB_PAGE_ACADEMY['hero'], template_academy );

    // section location group
    $cmb_page_academy_location_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_PAGE_ACADEMY['location'] . 'group',
        'title' => esc_html__('Khối: Cơ sở hoạt động', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_academy)),
    ));

    $cmb_page_academy_location_group->add_field(
        everygolf_cmb_option_title(
            PREFIX_CMB_PAGE_ACADEMY['location'],
            '',
            esc_html__('Cơ sở<br>hoạt động', 'everygolf')
        )
    );

    $cmb_page_academy_location_group->add_field(
        everygolf_cmb_option_search_cpt(
            PREFIX_CMB_PAGE_ACADEMY['location'],
            esc_html__('Chọn bài viết không gian', 'everygolf'),
            'eg_setup_space'
        )
    );

    foreach ( everygolf_cmb_set_page_link(PREFIX_CMB_PAGE_ACADEMY['location']) as $field) :
        $cmb_page_academy_location_group->add_field($field);
    endforeach;

    // section facility
    $cmb_page_academy_cpt_facility_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_PAGE_ACADEMY['cpt_facility'] . 'group',
        'title' => esc_html__('Khối: Cơ sở vật chất', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_academy)),
    ));

    $cmb_page_academy_cpt_facility_group->add_field(
        everygolf_cmb_option_title(
            PREFIX_CMB_PAGE_ACADEMY['cpt_facility'],
            '',
            esc_html__('Cơ sở vật chất', 'everygolf')
        )
    );

    $cmb_page_academy_cpt_facility_group->add_field(
        everygolf_cmb_option_title(
            PREFIX_CMB_PAGE_ACADEMY['cpt_facility'] . 'sub_',
            esc_html__('Tiêu đề phụ', 'everygolf'),
            esc_html__('Tiêu đề phụ', 'everygolf')
        )
    );

    $cmb_page_academy_cpt_facility_group->add_field(array(
        'name' => esc_html__('Mô tả', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_ACADEMY['cpt_facility'] . 'desc',
        'type' => 'textarea',
        'sanitization_cb' => false,
        'escape_cb' => false,
        'attributes' => array(
            'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
            'rows' => 5,
            'style' => 'width: 100%;'
        ),
    ));

    $cmb_page_academy_cpt_facility_group->add_field(
        everygolf_cmb_option_search_cpt(
            PREFIX_CMB_PAGE_ACADEMY['cpt_facility'],
            esc_html__('Chọn bài cơ sở vật chất', 'everygolf'),
            'eg_facility'
        )
    );

    // section img grid
    everygolf_cmb_block_img_grid(PREFIX_CMB_PAGE_ACADEMY['img_grid'], template_academy);
}