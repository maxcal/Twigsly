<?php
class Twigsly {
    
    /**
     * @var Twigpress_Environment 
     */
    protected $twigpress;
    
    public function __construct($twigpress, $themedir) {
        
        /**
        * Check if Twigpress plugin is installed.
        */
        if (!isset($twigpress)){
            if (function_exists('wp_die')){
                wp_die("This theme requires the Twigpress plugin");
            }
        }
        $this->twigpress = $twigpress;
        $this->twigpress->registerGlobalFunctions();
        $this->twigpress->prependPath(TEMPLATEPATH.'/');
    }
    
    public function display($wp_query, $arr){
        $this->twigpress->autoDisplay($wp_query, $arr);
    }
    
    public function get_twigpress()
    {
        return $this->twigpress;
    }
}
