<?php
/**
 * Include the TGM_Plugin_Activation class.
 */

add_action('tgmpa_register', 'everygolf_register_required_plugins');
function everygolf_register_required_plugins(): void
{

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $everygolf_plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name' => 'Codestar Framework',
            'slug' => 'codestar-framework',
            'required' => true,
            'source' => 'https://github.com/Codestar/codestar-framework/archive/refs/heads/master.zip'
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name' => 'CMB2',
            'slug' => 'cmb2',
            'required' => true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name' => 'CMB2 Field Ajax Search',
            'slug' => 'cmb2-field-ajax-search',
            'required' => true,
            'source' => 'https://github.com/rubengc/cmb2-field-ajax-search/archive/refs/heads/master.zip'
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'required' => true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name' => 'Polylang',
            'slug' => 'polylang',
            'required' => true,
        ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name' => 'Loco Translate',
            'slug' => 'loco-translate',
            'required' => true,
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $everygolf_config = array(
        'id' => 'everygolf',          // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug' => 'themes.php',            // Parent menu slug.
        'capability' => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true,                    // Show admin notices or not.
        'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message' => '',                      // Message to output right before the plugins table.
    );

    tgmpa($everygolf_plugins, $everygolf_config);
}
