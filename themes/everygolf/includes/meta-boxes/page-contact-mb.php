<?php
const template_contact = 'page-templates/page-contact.php';
const PREFIX_CMB_PAGE_CONTACT_INFO = 'cmb_page_contact_info_';
const PREFIX_CMB_PAGE_CONTACT_FORM = 'cmb_page_contact_form_';
const PREFIX_CMB_PAGE_CONTACT_FACILITIES = 'cmb_page_contact_facilities_';

add_action('cmb2_admin_init', 'everygolf_register_custom_fields_for_page_contact_info');
function everygolf_register_custom_fields_for_page_contact_info(): void
{
    everygolf_cmb_block_contact_info(
        PREFIX_CMB_PAGE_CONTACT_INFO,
        template_contact,
        '',
        [everygolf_cmb_option_image(PREFIX_CMB_PAGE_CONTACT_INFO)]
    );

    // Register custom fields for contact form
    $cmb_page_contact_form_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_PAGE_CONTACT_FORM . 'group',
        'title' => esc_html__('Khối: Form liên hệ (CF7)', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_contact)),
    ));

    $cmb_page_contact_form_group->add_field(array(
        'name' => esc_html__('Tiêu đề', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_CONTACT_FORM . 'heading',
        'type' => 'text',
        'default' => esc_html__('Nhận tư vấn', 'everygolf'),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
        ),
    ));

    $cmb_page_contact_form_group->add_field(array(
        'name' => esc_html__('Chọn form liên hệ ', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_CONTACT_FORM . 'select_cf7_form',
        'type' => 'select',
        'options' => everygolf_get_form_cf7(),
        'default' => 0,
    ));

    //
    $cmb_page_contact_facilities_group = new_cmb2_box(array(
        'id' => PREFIX_CMB_PAGE_CONTACT_FACILITIES . 'group',
        'title' => esc_html__('Khối: Cơ sở', 'everygolf'),
        'object_types' => array('page'),
        'show_on_cb' => everygolf_cmb2_show_if_page_template_in(array(template_contact)),
    ));

    $cmb_page_contact_facilities_group->add_field(array(
        'name' => esc_html__('Tiêu đề', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_CONTACT_FACILITIES . 'title',
        'type' => 'text',
        'default' => esc_html__('Welcome to the great indoors', 'everygolf'),
        'attributes' => array(
            'placeholder' => esc_html__('Nhập nội dung', 'everygolf'),
        ),
    ));

    $cmb_page_contact_facilities_group->add_field(array(
        'name' => esc_html__('Danh sách', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_CONTACT_FACILITIES . 'list',
        'type' => 'group',
        'repeatable' => true,
        'sortable' => true,
        'options' => [
            'group_title' => 'Không gian {#}',
            'add_button' => esc_html__('Thêm', 'everygolf'),
            'remove_button' => esc_html__('Xóa', 'everygolf'),
            'sortable' => true,
            'closed' => true,
        ],
        'fields' => array(
            array(
                'name' => esc_html__('Tiêu đề', 'everygolf'),
                'id' => 'title',
                'type' => 'text',
                'default' => esc_html__('Tiêu đề', 'everygolf'),
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập tiêu đề', 'everygolf'),
                ),
            ),

            array(
                'name' => esc_html__('Tiêu đề phụ', 'everygolf'),
                'id' => 'sub_title',
                'type' => 'text',
                'default' => esc_html__('Tiêu đề phụ', 'everygolf'),
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập tiêu đề phụ', 'everygolf'),
                ),
            ),

            array(
                'name' => esc_html__('Ảnh', 'everygolf'),
                'id' => 'img',
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
            ),

            array(
                'name' => esc_html__('Địa chỉ', 'everygolf'),
                'id' => 'address',
                'type' => 'textarea',
                'sanitization_cb' => false,
                'escape_cb' => false,
                'attributes' => array(
                    'placeholder' => esc_html__('Nhập địa chỉ', 'everygolf'),
                    'rows' => 5,
                    'style' => 'width: 100%;'
                ),
            ),
        ),
    ));

    // section hyperlinks
    $cmb_page_contact_facilities_group->add_field(array(
        'name' => esc_html__('Phần: Liên kết', 'everygolf'),
        'type' => 'title',
        'id' => PREFIX_CMB_PAGE_CONTACT_FACILITIES . 'section_hyperlinks',
    ));

    $cmb_page_contact_facilities_group->add_field(array(
        'name' => esc_html__('Liên kết đến trang', 'everygolf'),
        'id' => PREFIX_CMB_PAGE_CONTACT_FACILITIES . 'page_link',
        'type' => 'select',
        'options' => array('' => esc_html__('— Không chọn —', 'everygolf')) + wp_list_pluck(get_pages(), 'post_title', 'ID'),
        'placeholder' => esc_html__('Chọn một trang...', 'everygolf'),
    ));
}