<?php
/*
  Plugin Name: MoneyPress : Abundatrade Edition
  Plugin URI: http://www.cybersprocket.com/products/moneypress-abundatrade-edition/
  Description: Earn extra income for your site via the Abundatrade affiliate program.  The shortcode puts the calculator on your website that shows visitors how much cash they will get for their used CDs, DVDs, and books.
  Version: 0.4
  Author: Cyber Sprocket Labs
  Author URI: http://www.cybersprocket.com
  License: GPL3
  
 Copyright (C) 2012 Cyber Sprocket Labs <info@cybersprocket.com>      

 This program is free software; you can redistribute it and/or        
 modify it under the terms of the GNU General Public License          
 as published by the Free Software Foundation; either version 3       
 of the License, or (at your option) any later version.               

 This program is distributed in the hope that it will be useful,      
 but WITHOUT ANY WARRANTY; without even the implied warranty of       
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        
 GNU General Public License for more details.                         

 You should have received a copy of the GNU General Public License    
 along with this program. If not, see <http://www.gnu.org/licenses/>. 
 
 */

if (defined('MP_ABUNDA_PLUGINDIR') === false) {
    define('MP_ABUNDA_PLUGINDIR', plugin_dir_path(__FILE__));
}

if (defined('MP_ABUNDA_PLUGINURL') === false) {
    define('MP_ABUNDA_PLUGINURL', plugins_url('',__FILE__));
}

if (defined('MP_ABUNDA_BASENAME') === false) {
    define('MP_ABUNDA_BASENAME', plugin_basename(__FILE__));
}

if (defined('MP_ABUNDA_PREFIX') === false) {
    define('MP_ABUNDA_PREFIX', 'csl-mp-abunda');
}

if (defined('MP_ABUNDA_ADMINPAGE') === false) {
    define('MP_ABUNDA_ADMINPAGE', get_option('siteurl') . '/wp-admin/admin.php?page=' . MP_ABUNDA_PLUGINDIR );
}


if (defined('MP_ABUNDA_SERVER') === false) {
    $theServer = get_option(MP_ABUNDA_PREFIX.'-server');
    if ( esc_url($theServer) != '') {
        define('MP_ABUNDA_SERVER',$theServer);
    } else {
        define('MP_ABUNDA_SERVER','www.abundatrade.com');
    }        
}

// Include our needed files
//
require_once(MP_ABUNDA_PLUGINDIR . '/include/config.php');
require_once(MP_ABUNDA_PLUGINDIR . '/include/csl_helpers.php');
require_once(MP_ABUNDA_PLUGINDIR . '/include/mpabunda-actions_class.php');


// General Actions
add_action('wp_footer', 'setup_stylesheet_for_mpabunda');
add_action('wp_enqueue_scripts', 'setup_scripts_for_mpabunda');


// Admin Actions
add_action('admin_menu', 'setup_admin_option_pages_for_mpabunda');
add_action('admin_print_styles','setup_ADMIN_stylesheet_for_mpabunda');
add_action('admin_init','setup_admin_interface_for_mpabunda',10);

// Activation Action (install/upgrade)
//
register_activation_hook( __FILE__ , array('mpAbunda_Actions','activate_plugin'));
