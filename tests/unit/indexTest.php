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

    static function setUpBeforeClass() {
        global $Twigpress;
        self::$twig = $Twigpress;
        self::$twig->registerGlobalFunctions(TRUE);
        self::$twig->prependPath(TEMPLATE_PATH);
    }

    protected function setUp() {
        $this->template = self::$twig->loadTemplate('index.html.twig');
    }

    protected function tearDown() {
        
    }

    public function testLayoutHasBasicTwigBlocks() {

        $blocks = $this->template->getBlockNames();
        $this->assertContains('post', $blocks);
        $this->assertContains('post_title', $blocks);
        $this->assertContains('post_content', $blocks);
        $this->assertContains('post_meta', $blocks);
    }
}
