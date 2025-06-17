<?php
/*
Template Name: Huấn luyện viên
*/

get_header();

get_template_part( 'template-parts/tpl-coach/inc', 'text-banner', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_COACH['text_banner']
) );

get_template_part( 'template-parts/tpl-coach/inc', 'slogan', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_COACH['img_grid']
) );

get_template_part( 'template-parts/tpl-coach/inc', 'tab-team', array(
    'prefix_cmb' => PREFIX_CMB_PAGE_COACH['tab_team']
) );

get_footer();