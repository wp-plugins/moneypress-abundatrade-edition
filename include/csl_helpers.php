<?php
/****************************************************************************
 ** file: csl_helpers.php
 **
 ** Helper functions for this plugin.
 ***************************************************************************/

 /**************************************
 ** function: setup_scripts_for_mpabunda
 **
 ** Load the scripts needed for the plugin
 **/

 function setup_scripts_for_mpabunda() {

     // Get our shortcode regexes
     //
     global $post;
    $pattern = get_shortcode_regex();
    
    if (!isset($post)) { return; }
    
    // If the mp_abunda shortcode is on this post
    //
    if (   preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches )
            && array_key_exists( 2, $matches )
            && (
                in_array( 'mp-abunda', $matches[2] ) ||
                in_array( 'mp_abunda', $matches[2] ) ||
                in_array( 'MP-ABUNDA', $matches[2] ) ||
                in_array( 'MP_ABUNDA', $matches[2] ) 
               )
        ) {
    
        // We need jQuery 1.7.1
        // some other plugins thwart that with specific EARLIER versions
        //
        wp_deregister_script('jquery');
        
        wp_register_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
        wp_register_script( 
                'impromptu',
                MP_ABUNDA_PLUGINURL.'/js/jquery-impromptu.3.2.min.js',
                array('jquery')
            );
         wp_register_script(
                'abundacalc',
                MP_ABUNDA_PLUGINURL.'/js/abundacalc.js',
                array('jquery','impromptu')
                );         
        $scriptData = array(
            'server' => MP_ABUNDA_SERVER
            );
        wp_localize_script('abundacalc','abundacalc',$scriptData); 
        
        wp_enqueue_script('abundacalc');
    }
 }

/**************************************
 ** function: setup_admin_interface_for_mpabunda
 **
 ** Builds the interface elements used by WPCSL-generic for the admin interface.
 **/
function setup_admin_interface_for_mpabunda() {
    global $MP_abunda_plugin;     

    //-------------------------
    // Navbar Section
    //-------------------------
    //    
    $MP_abunda_plugin->settings->add_section(
        array(
            'name' => 'Navigation',
            'div_id' => 'mp_navbar',
            'description' => $MP_abunda_plugin->helper->get_string_from_phpexec(MP_ABUNDA_PLUGINDIR.'/templates/navbar.php'),
            'is_topmenu' => true,
            'auto' => false
        )
    );    
    
    // Then add our sections
    //
    $MP_abunda_plugin->settings->add_section(
        array(
            'name'              => 'How to Use',
            'description'       =>
                '<p>Place the [mp_abunda] shortcode on any page or post where you want the Abundatrade calculator to appear.</p>',
            'start_collapsed'   => false,
        )
    );
    
    
    $MP_abunda_plugin->settings->add_section(
        array(
            'name'        => 'Affiliate Settings',
            'description' =>
            '<p>Here you can provide your affiliate information to track your trades.</p>'
        )
    );
    $MP_abunda_plugin->settings->add_item('Affiliate Settings', 'Affiliate ID', 'affid', 'text', false,
        'Your Abundatrade affiliate ID.  <a href="http://www.abundatrade.com/trade/affiliates/">Sign up</a> at Abundatrade.com for your affiliate key.');
    $MP_abunda_plugin->settings->add_item('Affiliate Settings', 'Affiliate Server', 'server', 'text', false,
            'Leave this blank unless instructed to change this (default: www.abundatrade.com).');
}

/**************************************
 ** function: setup_stylesheet_for_mpabunda
 **
 ** Setup the CSS for the product pages.
 **/
function setup_stylesheet_for_mpabunda() {
    global $MP_abunda_plugin;
    $MP_abunda_plugin->themes->assign_user_stylesheet();    
}

/**************************************
 ** function: setup_ADMIN_stylesheet_for_mpabunda
 **
 ** Setup the CSS for the admin page.
 **/
function setup_ADMIN_stylesheet_for_mpabunda() {            
    if ( file_exists(MP_ABUNDA_PLUGINDIR.'css/admin.css')) {
        wp_register_style('csl_mpabunda_admin_css', MP_ABUNDA_PLUGINURL .'/css/admin.css'); 
        wp_enqueue_style ('csl_mpabunda_admin_css');
    }      
}


/**************************************
 ** function: setup_admin_option_pages_for_mpabunda
 **
 ** Setup the option pages for the admin interface.
 **/
function setup_admin_option_pages_for_mpabunda() {
    global $MP_abunda_plugin;     
    add_submenu_page(
        'csl-mp-ebay-options',
        __("Settings: Plus", MP_ABUNDA_PREFIX), 
        __("Settings: Plus", MP_ABUNDA_PREFIX), 
        'administrator', 
        MP_ABUNDA_PLUGINDIR.'/settings_plus.php'
    );             
 }




 

