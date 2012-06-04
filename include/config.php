<?php

/**
 * We need the generic WPCSL plugin class, since that is the
 * foundation of much of our plugin.  So here we make sure that it has
 * not already been loaded by another plugin that may also be
 * installed, and if not then we load it.
 */
if (defined('MP_ABUNDA_PLUGINDIR')) {
    if (class_exists('wpCSL_plugin__mpabunda') === false) {
        require_once(MP_ABUNDA_PLUGINDIR.'WPCSL-generic/classes/CSL-plugin.php');
    }
    
    /**
     * This section defines the settings for the admin menu.
     */    
    global $MP_abunda_plugin; 
    $MP_abunda_plugin = new wpCSL_plugin__mpabunda(
        array(
            'prefix'                 => MP_ABUNDA_PREFIX,
            'themes_enabled'        => true,
            'css_prefix'            => 'csl_themes',             
            'name'                   => 'MoneyPress Abundatrade Edition',
            'url'                    => 'http://cybersprocket.com/products/moneypress-abundatrade/',
            'support_url'            => 'http://redmine.cybersprocket.com/projects/mpress-abundatrade',
            'purchase_url'           => 'http://cybersprocket.com/products/moneypress-abundatrade-edition/',
            'cache_path'             => MP_ABUNDA_PLUGINDIR,
            'plugin_url'             => MP_ABUNDA_PLUGINURL,
            'plugin_path'            => MP_ABUNDA_PLUGINDIR,
            'basefile'               => MP_ABUNDA_BASENAME,
            
            //setup upgrade system
            'on_update' => array(mpAbunda_Actions, activate_plugin),
            'version' => '0.4',
            
            // We don't want default wpCSL objects, let's set our own
            //
            'use_obj_defaults'       => false,

            'cache_obj_name'        => 'none',
            'license_obj_name'      => 'none',
            'products_obj_name'     => 'none',
            
            'helper_obj_name'        => 'default',
            'notifications_obj_name' => 'default',
            'settings_obj_name'      => 'default',
            'themes_obj_name'        => 'default',
            
            // Custom config settings
            //
            'display_settings_collapsed' => false,
            'show_locale'                => false,
            'uses_money'                 => false,
            
            // Data/Shortcode Processing Settings
            //
            'driver_type'           => 'custom',
            'driver_name'            => 'Abundatrade',
            'driver_args'           => array(
                    'api_key'   => get_option(MP_ABUNDA_PREFIX.'-api_key'),
                    ),
            'shortcodes'             => array('mp-abunda','mp_abunda'),
            
        )
    );
}


