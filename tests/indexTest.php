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
        if (isset($_ENV['wordpress_uri'])) {
            return $_ENV['wordpress_uri'];
        }
        else {
            return $relative_path;
        }
    }
    
    public function testInheritsFromLayout(){
        $this->assertEquals(1, $this->crawler->filter('html')->count(),
                'index.html.twig shall inherit global layout'
                );
    }
    
    public function testPostsAreDisplayed(){
        
        $posts = $this->crawler->filter('.entry');
        
        $this->assertTrue( $posts->count() > 0,
            'assert that posts are displayed'
        );
        
        $this->assertContains('Hello world!', $posts->filter('.entry-title')->extract('_text'),
                'Assert that the entry title is displayed'
                );
        
        
        $body = $posts->filter('.entry-content')->extract('_text');
        $this->assertContains('Welcome to WordPress. This is your first post.', $body[0]
                'Assert that the entry content is displayed'
                );
    }
}