<?php

class layoutTest extends PHPUnit_Framework_TestCase {
    
    /**
     * @var Twig_Environment 
     */
    static protected $twig;
    
    /**
     *
     * @var type 
     */
    protected $template;

    static function setUpBeforeClass(){
        global $Twigpress;
        self::$twig = $Twigpress;
        self::$twig ->registerGlobalFunctions(TRUE);
        self::$twig ->prependPath(TEMPLATE_PATH);
    }

    protected function setUp(){
        $this->template = self::$twig->loadTemplate('layout.html.twig');        
    } 
    
    protected function tearDown(){
        
    } 
    
    
        public function testLayoutHasBasicTwigBlocks(){
        
        $blocks = $this->template->getBlockNames();   
        $this->assertContains('head', $blocks);
        $this->assertContains('title', $blocks);
        $this->assertContains('header', $blocks);
        $this->assertContains('main', $blocks);
        $this->assertContains('content', $blocks);
        $this->assertContains('footer', $blocks);
    
    }
}
