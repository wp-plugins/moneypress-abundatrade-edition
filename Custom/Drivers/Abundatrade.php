<?php
/******************************************************
 * Class: AbundatradeDriver
 * 
 * The default data driver for the WPCSL-Generic Plugin.
 *
 */ 
class AbundatradeDriver {
  
    //------------------------------------------------
    // Public Properties
    //------------------------------------------------
    public $shortcode_rendered = false;
    
    //------------------------------------------------
    // Public Methods
    //------------------------------------------------
  
    /* method: __construct
     *
     * The object constructor. Initializes a new object.
     */
    public function __construct($params) {
        
        // Passed Params
        //        
        foreach ($params as $name => $value) {
            $this->$name = $value;
        } 
    }
    

    /* method: get_supported_options
     * return: an array of option names (strings)
     *
     * Tells WPCSL-Generic which options we allow for this driver.
     *
     */    
    public function get_supported_options() {
        return array();
    }

    /* method: render_shortcode_as_HTML
     * return: the HTML that represents the shortcode output
     *
     */    
    public function render_shortcode_as_HTML($atts) {
        $this->shortcode_rendered = true;
                
        $content = '';
        $content = $this->render_TradeCalculator();

        return $content;
    }
    
    /* method: render_TradeCalculator
     * return: html for the trade calculator.
     *
     */
    private function render_TradeCalculator() {
        return $this->parent->helper->get_string_from_phpexec(MP_ABUNDA_PLUGINDIR.'template/calculator.php');
    }
    

    
}
