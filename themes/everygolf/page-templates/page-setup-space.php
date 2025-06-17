<?php
/*
Template Name: Thiết lập không gian
*/

get_header();

get_template_part( 'template-parts/tpl-setup-space/inc', 'hero-setup', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_SETUP_SPACE_HERO,
) );

get_template_part( 'template-parts/tpl-setup-space/inc', 'room-setup', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_SETUP_SPACE_ROOM,
) );

get_footer();