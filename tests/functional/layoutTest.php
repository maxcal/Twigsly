<?php 
require_once GOUTTE;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class layoutTest extends PHPUnit_Framework_TestCase {
    
    /**
     * @var Goutte\Client 
     */
    static protected $client;
    /**
     * @var Symfony\Component\DomCrawler\Crawler
     */
    protected $crawler;
    
    /**
     * Runs before first test.
     */
    static function setUpBeforeClass(){
        self::$client = new Goutte\Client;      
    }

    protected function setUp(){
        $this->crawler = self::$client->request('GET', $this->path());      
    } 
    
    protected function tearDown(){
        
    } 


    protected function path($relative_path = null){

        return $_ENV['wordpress_uri'];

    }
    /**
     * Test if we can load twigpress.
     * This is for easied debugging
     */
    public function testTwigpressLoaded(){
        $this->assertTrue(
                file_exists($_ENV['TWIGPRESS_PATH'] . '/twigpress.php')
                );
        $this->assertTrue(
        class_exists('Twig_Environment'));
    }
    
    public function testDocumentHasRootNodes(){
        $this->assertEquals(1, $this->crawler->filter('html')->count(),
                'document shall have a HTML node'
                );
        $this->assertEquals(1, $this->crawler->filter('body')->count(),
                'document shall have a BODY node'
                );
        $this->assertEquals($_ENV['wordpress_uri'], $this->path());
    }
    
    public function testDocumentHasBasicNodes(){
        $this->assertEquals(1, $this->crawler->filter('title')->count(),
                'document shall have a TITLE node'
                );
    }
    
   
    
    
    
     public function testDocumentHasBasicBlocks(){
        $nodes = $this->crawler->filter('header');
        $this->assertEquals(1, $this->crawler->filter('#site-header')->count(),
                'document shall have a #site-header node'
                );
        $this->assertEquals(1, $this->crawler->filter('#site-main')->count(),
                'document shall have a #site-main node'
                );
        $this->assertEquals(1, $this->crawler->filter('#site-content')->count(),
                'document shall have a #site-content node'
                );
        $this->assertEquals(1, $this->crawler->filter('#site-footer')->count(),
                'document shall have a #site-footer node'
                );
    }
    
    public function testBasicBlocksHaveBlockClass(){
        
        $baseblocks = array('#site-header','#site-main','#site-content','#site-footer');
        
        foreach ( $baseblocks as $block ) {
           $this->assertEquals(1, $this->crawler->filter("$block.block")->count(),
                   "Assert that $block shall have block class"
                   ); 
        }    
    }
    
    public function testTitleIsPrinted(){
        $title = $this->crawler
                ->filter('title')->extract('_text');
                
        $this->assertTrue(strlen($title[0]) > 0);
    }
    
    
}