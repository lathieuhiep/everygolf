<?php
/*
Template Name: Liên hệ
*/

get_header();

get_template_part( 'template-parts/tpl-contact/inc', 'info-contact', array(
    'prefix_cmb_contact_info' => PREFIX_CMB_PAGE_CONTACT_INFO,
    'prefix_cmb_contact_form' => PREFIX_CMB_PAGE_CONTACT_FORM
) );

get_template_part( 'template-parts/tpl-contact/inc', 'facilities', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_CONTACT_FACILITIES
) );

get_footer();