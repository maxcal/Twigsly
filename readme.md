# Twigsly
## A simple Twigpress theme

Twigsly is currently under heavy development. It is not mean for production sites
but rather as a boilerplate that makes as few assumptions as possible.

It depends on Twigpress for a Twig environment and function mapping.

## Installation
1. Download [Twigsly](http://www.github.com/maxcal/twigsly/) and extract to 
your `wordpress/wp-content/themes/`directory.
2. Get the [Twigpress plugin](http://www.github.com/maxcal/twigpress/) 
and extract to your `wordpress/wp-content/plugins/`directory.
3. Activate the Twigpress plugin
4. Download [Twigpress plugin](http://www.github.com/maxcal/twigpress/)  
 
## Developer Setup

This project uses [PHPunit](http://www.phpunit.de/manual/3.6/en/) for unit tests
To be able to run the unit tests there is little configuration the needs to be done.

1. Install the submodules 

    $ git submodule init | git submodule update

2. copy phpunit.xml.dist to phpunit.xml
3. Change the environment variables WORDPRESS_BASE_URI  
WORDPRESS_BASE_URI is the path to a wordpress install with the Twigpress 
plugin activated and the Twigsly theme set as the current theme.
4. run phpunit