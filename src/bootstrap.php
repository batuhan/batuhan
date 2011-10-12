<?php
// some settings
date_default_timezone_set('Europe/Istanbul');

require_once __DIR__.'/../vendor/silex.phar';

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app['autoloader']->registerNamespace('Symfony', __DIR__.'/../vendor/symfony/src');

if($_SERVER['REMOTE_ADDR'] === '62.248.41.112' OR $_SERVER['SERVER_NAME'] === 'localhost')
	$app['debug'] = TRUE;

// Register Silex ServiceProviders (aka Extensions)
$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path'       => __DIR__.'/../views',
  'twig.class_path' => __DIR__.'/../vendor/Twig/lib',
  'twig.options'    => array(
    'debug' => true,
    'cache' => __DIR__.'/../cache',
  ),
));

$browser_lang = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
$app['bi_browser_lang'] = $browser_lang[0];

if($_SERVER['SERVER_NAME'] === 'batuhanicoz.com.tr'){
	$locale = 'tr';
}elseif( isset($_GET['lang']) ){
	$locale = $_GET['lang'];
}else{
	$locale = 'en';
}

$app['domain'] = $_SERVER['SERVER_NAME']; // @TODO: There should be another (good) way to get a global variable in Twig.

$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translation.class_path' =>  __DIR__.'/../vendor/Symfony/src', 
	'locale' => $locale,
    'locale_fallback' => 'en', 
)); 

$app['translator.messages'] = array( 
    'en' =>  __DIR__.'/../locales/en.yml', 
    'tr' =>  __DIR__.'/../locales/tr.yml', 
); 

$app['translator.loader'] = new Symfony\Component\Translation\Loader\YamlFileLoader(); 

$app->before(function () use ($app) {
    if ($locale = $app['request']->get('locale')) {
        $app['locale'] = $locale;
    }
});

return $app;