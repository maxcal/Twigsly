<?php 
require_once __DIR__.'/../lib/Goutte/goutte.phar';

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

abstract class WebtestCase extends PHPUnit_Framework_TestCase {
    
    /**
     * @var Goutte\Client 
     */
    protected $client;
    /**
     * @var Symfony\Component\DomCrawler\Crawler
     */
    protected $crawler;
    
    protected function path($relative_path){
        if (isset($_ENV[$_ENV['wordpress_uri']])) {
            return $_ENV['wordpress_uri'];
        }
        else {
            return $relative_path;
        }
    }


    protected function tearDown(){
        
    }
    
}