<?php 
require_once __DIR__.'/../lib/Goutte/goutte.phar';

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class indexTest extends PHPUnit_Framework_TestCase {
    
    /**
     * @var Goutte\Client 
     */
    protected $client;
    /**
     * @var Symfony\Component\DomCrawler\Crawler
     */
    protected $crawler;
    
    protected function setUp(){
        $this->client = new Goutte\Client;
        $this->crawler = $this->client->request('GET', $this->path());
    } 
    
    protected function tearDown(){
        
    } 


    protected function path($relative_path = null){
        if (isset($_ENV[$_ENV['wordpress_uri']])) {
            return $_ENV['wordpress_uri'];
        }
        else {
            return $relative_path;
        }
    }
    
    public function testDocumentHasRootNodes(){
        $this->assertEquals(1, $this->crawler->filter('html')->count(),
                'document shall have a HTML node'
                );
        $this->assertEquals(1, $this->crawler->filter('body')->count(),
                'document shall have a BODY node'
                );
    }
    
    public function testDocumentHasBasicNodes(){
        $this->assertEquals(1, $this->crawler->filter('title')->count(),
                'document shall have a TITLE node'
                );
        /**
        $this->assertEquals(1, $this->crawler->filter('meta[charset="utf-8"]')->count(),
                'document shall have a meta[charset=utf-8] node'
                );
         * 
         */
        
        $this->assertEquals();
        
        
    }
}