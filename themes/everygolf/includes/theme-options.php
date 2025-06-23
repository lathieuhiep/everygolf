<?php
// A Custom function for get an option
if ( ! function_exists( 'everygolf_get_option' ) ) {
    function everygolf_get_option( $option = '', $default = null ) {
        $options = get_option( 'options' );

        return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
    }
}


// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {
    $facebook_url = esc_url( 'https://www.facebook.com/lathieuhiep' );

    // Set a unique slug-like ID
    $prefix_theme_options   = 'options';
    $menu_title = esc_html__( 'Cài đặt theme', 'everygolf' );

    // Create options
    CSF::createOptions( $prefix_theme_options, array(
        'menu_title'          => $menu_title,
        'menu_slug'           => 'theme-options',
        'menu_position'       => 2,
        'admin_bar_menu_icon' => 'dashicons-admin-generic',
        'framework_title'     => $menu_title,
        'footer_text'         => esc_html__( 'Cảm ơn bạn đã sử dụng theme của tôi', 'everygolf' )
    ) );

    // general options
    require get_theme_file_path( '/includes/theme-options/general-options.php' );

    // menu options
    require get_theme_file_path( '/includes/theme-options/footer-options.php' );
}