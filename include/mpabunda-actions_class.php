<?php

/***********************************************************************
* Class: mpAbunda_Actions
*
* The MoneyPress Abundatrade Edition action hooks and helpers.
*
* The methods in here are normally called from an action hook that is
* called via the WordPress action stack.  
* 
* See http://codex.wordpress.org/Plugin_API/Action_Reference
*
************************************************************************/

if (! class_exists('mpAbunda_Actions')) {
    class mpAbunda_Actions {
        
        /******************************
         * PUBLIC PROPERTIES & METHODS
         ******************************/
        
        //-----------------------------
        // The Constructor
        //
        function __construct($params) {
        } 
        
        
        //-----------------------------
        // method: activate_plugin()
        // 
        // This is called whenever the plugin is activated.
        //
        // Useful for doing stuff during initial installs or upgrades.
        //
        static function activate_plugin() {
            
            // If theme is not set...
            //            
            if (get_option('csl-mp-abunda-theme') == '') {
                update_option('csl-mp-abunda-theme','default');            
            }      
        }
    }
}        
     

