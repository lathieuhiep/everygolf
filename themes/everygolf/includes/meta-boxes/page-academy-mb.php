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
        ['everygolf_academy'],
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
    $cmb_block_img_grid_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_PAGE_ACADEMY['img_grid'] . 'group',
        'title' => esc_html__('Khối: Image grid', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_academy)),
    ));

    $cmb_block_img_grid_group->add_field(array(
        'name' => esc_html__('Phần: Nội dung', 'everygolf'),
        'type' => 'title',
        'id' => PREFIX_CMB_PAGE_ACADEMY['img_grid'] . 'sd_content',
    ));

    $cmb_block_img_grid_group->add_field(array(
        'name' => esc_html__('Mô tả', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_ACADEMY['img_grid'] . 'desc',
        'type' => 'textarea',
        'sanitization_cb' => false,
        'escape_cb' => false,
        'attributes' => array(
            'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
            'rows' => 5,
            'style' => 'width: 100%;'
        ),
    ));

    $everygolf_cmb_slogan = [
        esc_html__('Chuyên nghiệp', 'everygolf'),
        esc_html__('Tận tâm', 'everygolf'),
        esc_html__('Tâm huyết', 'everygolf')
    ];
    foreach ( $everygolf_cmb_slogan as $key => $value ) :
        $cmb_block_img_grid_group->add_field(array(
            'name' => esc_html__('Phần: Slogan' . ' ' . $key + 1, 'everygolf'),
            'type' => 'title',
            'id' => PREFIX_CMB_PAGE_ACADEMY['img_grid'] . 'sd_slogan_' . $key + 1,
        ));

        $cmb_block_img_grid_group->add_field( array(
            'name' => esc_html__('Tiêu đề slogan', 'everygolf'),
            'id'   => PREFIX_CMB_PAGE_ACADEMY['img_grid'] . 'title_slogan_' . $key + 1,
            'type' => 'text',
            'default' => $value,
            'attributes' => array(
                'placeholder' => esc_html__('Nhập slogan', 'everygolf'),
            ),
        ) );

        $cmb_block_img_grid_group->add_field(array(
            'name' => esc_html__('Ảnh', 'everygolf'),
            'id' => PREFIX_CMB_PAGE_ACADEMY['img_grid'] . 'img_slogan_' . $key + 1,
            'type' => 'file',
            'preview_size' => array(300, 300),
            'options' => array(
                'url' => false,
            ),
            'text' => array(
                'add_upload_file_text' => esc_html__('Chọn ảnh', 'everygolf'),
            ),
            'query_args' => array(
                'type' => array('image/jpg', 'image/jpeg', 'image/png', 'image/webp'),
            ),
        ));
    endforeach;
}