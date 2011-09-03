<?php

require_once __DIR__.'/../vendor/silex.phar';
include 'settings.php';

$domain = $_SERVER['SERVER_NAME'];

if($domain === 'batuhanicoz.com.tr'){
	$locale = 'tr';
}else{
	$locale = 'en';
}

use Silex\Application;
use Silex\Extension\TwigExtension;
use Symfony\Component\HttpFoundation\Response;

$app = new Application();

$app['autoloader']->registerNamespace('Symfony', __DIR__.'/../vendor/symfony/src');

if($_SERVER['REMOTE_ADDR'] === '62.248.41.112')
	$app['debug'] = TRUE;

// Register Silex Extensions
$app->register(new TwigExtension(), array(
  'twig.path'       => __DIR__.'/../views',
  'twig.class_path' => __DIR__.'/../vendor/Twig/lib',
  'twig.options'    => array(
    'debug' => true,
    'cache' => __DIR__.'/../cache',
  ),
));

$app->register(new Silex\Extension\TranslationExtension(), array( 
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

$app->get('/{locale}/{message}/{name}', function ($message, $name) use ($app) {
    return $app['translator']->trans($message, array('%name%' => $name));
});
return $app;