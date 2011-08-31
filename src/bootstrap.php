<?php

require_once __DIR__.'/../vendor/silex.phar';

use Silex\Application;
use Silex\Extension\TwigExtension;

use Dailex\Extension\DoctrineMongoExtension;

$app = new Application();

// Register Dailex classes for autoloading
$app['autoloader']->registerNamespaces(array(
  'Dailex' => __DIR__,
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

$app->register(new DoctrineMongoExtension(), array(
  'mongodb.odm.document_dir'            => __DIR__.'/Dailex/Document',
  'mongodb.odm.options'                 => array(
    'proxy_dir'    => __DIR__.'/../cache',
    'hydrator_dir' => __DIR__.'/../cache',
  ),
  'mongodb.odm.class_path'              => __DIR__.'/../vendor/doctrine-mongodb-odm/lib',
  'mongodb.doctrine.common.class_path'  => __DIR__.'/../vendor/doctrine-mongodb-odm/lib/vendor/doctrine-common/lib',
  'mongodb.doctrine.mongodb.class_path' => __DIR__.'/../vendor/doctrine-mongodb-odm/lib/vendor/doctrine-mongodb/lib',
));

return $app;
