<?php

require_once __DIR__.'/../vendor/silex.phar';

use Silex\Application;
use Silex\Extension\TwigExtension;

$app = new Application();

// Register Dailex classes for autoloading
$app['autoloader']->registerNamespaces(array(
  //'BiCom' => __DIR__,
));

// Register Silex Extensions
$app->register(new TwigExtension(), array(
  'twig.path'       => __DIR__.'/../views',
  'twig.class_path' => __DIR__.'/../vendor/Twig/lib',
  'twig.options'    => array(
    'debug' => true,
    'cache' => __DIR__.'/../cache',
  ),
));

return $app;
