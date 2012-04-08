<?php 
require_once GOUTTE;

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
    
    public function testPostContent(){
        
        $posts = $this->crawler->filter('.hentry');
        
        $this->assertTrue( $posts->count() > 0,
            'assert that posts are displayed'
        );
        $titles = $posts->filter('.entry-title')->extract('_text');
        $this->assertContains(
                    'Hello world!',
                    trim( $titles[0] )
                );
        $body = $posts->filter('.entry-content')->extract('_text');
        $this->assertContains('Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!', $body[0],
                'assert that post content is output'
                );
        
        $href = $posts->filter('.entry-title a')->first()->attr('href');
        
        $this->assertTrue(
            filter_var($href, FILTER_VALIDATE_URL) !== false,
            'Assert that post has a permalink which is a valid URL'    
            );
        
        
        
    }
}