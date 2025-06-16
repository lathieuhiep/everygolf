<?php
const template_academy = 'page-templates/page-academy.php';
const PREFIX_CMB_PAGE_ACADEMY = [
    'hero' => 'cmb_page_academy_banner_hero_',
    'cpt' => 'cmb_page_academy_cpt_',
    'cpt_facility' => 'cmb_page_academy_cpt_facility_',
    'img_grid' => 'cmb_page_academy_img_grid_',
];

// create cmb blocks for academy page
add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_page_academy');
function everygolf_register_custom_fields_for_page_academy(): void
{
    // section hero
    everygolf_cmb_block_banner_hero( PREFIX_CMB_PAGE_ACADEMY['hero'], template_academy );

    // section academy
    everygolf_cmb_block_query(
        PREFIX_CMB_PAGE_ACADEMY['cpt'],
        template_academy,
        esc_html__('Cơ sở', 'everygolf'),
        2,
        ['eg_setup_space'],
        [
            [
                'name' => esc_html__('Tiêu đề', 'everygolf'),
                'id' => PREFIX_CMB_PAGE_ACADEMY['cpt'] . 'title',
                'type' => 'text',
                'sanitization_cb' => false,
                'escape_cb' => false,
                'default' => esc_html__('Cơ sở<br>hoạt động', 'everygolf'),
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
                ),
            ]
        ],
        [
            [
                'name' => esc_html__('Phần: Liên kết', 'everygolf'),
                'type' => 'title',
                'id'   => PREFIX_CMB_PAGE_ACADEMY['cpt'] . 'section_link',
            ],
            [
                'name' => esc_html__('Tiêu đề liên kết', 'everygolf'),
                'id'   => PREFIX_CMB_PAGE_ACADEMY['cpt'] . 'text_link',
                'type' => 'text',
                'default' => esc_html__('Đăng ký', 'everygolf'),
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập tiêu đề liên kết', 'everygolf'),
                ),
            ],
            [
                'name'    => esc_html__('Liên kết đến trang', 'everygolf'),
                'id'      => PREFIX_CMB_PAGE_ACADEMY['cpt'] . 'url',
                'type'    => 'select',
                'options' => array( '' => esc_html__('— Không chọn —', 'everygolf') ) + wp_list_pluck( get_pages(), 'post_title', 'ID' ),
                'placeholder' => esc_html__('Chọn một trang...', 'everygolf'),
            ]
        ]
    );

    // section facility
    everygolf_cmb_block_query(
        PREFIX_CMB_PAGE_ACADEMY['cpt_facility'],
        template_academy,
        esc_html__('Cơ sở vật chất', 'everygolf'),
        2,
        ['everygolf_facility'],
        [
            [
                'name' => esc_html__('Tiêu đề', 'everygolf'),
                'id' => PREFIX_CMB_PAGE_ACADEMY['cpt_facility'] . 'title',
                'type' => 'text',
                'sanitization_cb' => false,
                'escape_cb' => false,
                'default' => esc_html__('Cơ sở vật chất', 'everygolf'),
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
                ),
            ],
            [
                'name' => esc_html__('Tiêu đề phụ', 'everygolf'),
                'id' => PREFIX_CMB_PAGE_ACADEMY['cpt_facility'] . 'sub_title',
                'type' => 'text',
                'sanitization_cb' => false,
                'escape_cb' => false,
                'default' => esc_html__('Custom Fitting Experience', 'everygolf'),
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
                ),
            ],
            [
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
            ]
        ]
    );

    // section img grid
    everygolf_cmb_block_img_grid(PREFIX_CMB_PAGE_ACADEMY['img_grid'], template_academy);
}