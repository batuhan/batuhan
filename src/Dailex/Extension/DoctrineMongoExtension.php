<?php

namespace Dailex\Extension;

use Silex\Application;
use Silex\ExtensionInterface;

use Doctrine\Common\EventManager;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Configuration;

/**
 * An extension for the Doctrine MongoDB ODM
 *
 * @author Pascal "b00gizm" Cremer <pascal@codenugget.org>
 */
class DoctrineMongoExtension implements ExtensionInterface
{
  public function register(Application $app)
  {
    // Default options
    $app['mongodb.options'] = array_replace(array(
      'server'  => 'mongodb://localhost:27017',
      'connect' => true,
    ), isset($app['mongodb.options']) ? $app['mongodb.options'] : array());
    
    $app['mongodb.odm.options'] = array_replace(array(
      'proxy_dir'          => sys_get_temp_dir(),
      'proxy_namespace'    => 'Proxy',
      'hydrator_dir'       => sys_get_temp_dir(),
      'hydrator_namespace' => 'Hydrator',
    ), isset($app['mongodb.odm.options']) ? $app['mongodb.odm.options'] : array());
    
    // Services
    $app['mongodb'] = $app->share(function() use ($app) {
      return DocumentManager::create(
        $app['mongodb.connection'],
        $app['mongodb.configuration']
      );
    });
    
    $app['mongodb.connection'] = $app->share(function() use ($app){
      $options = $app['mongodb.options'];
      $server = $options['server'];
      unset($options['server']);
      return new Connection($server, $options, null, $app['mongodb.event_manager']);
    });
    
    $app['mongodb.configuration'] = $app->share(function() use ($app) {
      $config = new Configuration();
      $config->setProxyDir($app['mongodb.odm.options']['proxy_dir']);
      $config->setProxyNamespace($app['mongodb.odm.options']['proxy_namespace']);
      $config->setHydratorDir($app['mongodb.odm.options']['hydrator_dir']);
      $config->setHydratorNamespace($app['mongodb.odm.options']['hydrator_namespace']);
      
      $docPaths = isset($app['mongodb.odm.document_dir']) ? 
        (array)$app['mongodb.odm.document_dir'] : array();
        
      $annotationDriver = $config->newDefaultAnnotationDriver($docPaths);
      $config->setMetadataDriverImpl($annotationDriver);
      
      return $config;
    });
    
    $app['mongodb.event_manager'] = $app->share(function() use ($app) {
      return new EventManager();
    });
    
    // Register all necessary namespaces in the autoloader
    if (isset($app['mongodb.odm.class_path'])) {
      $app['autoloader']->registerNamespace(
        'Doctrine\\ODM\\MongoDB', $app['mongodb.odm.class_path']
      );
    }
    
    if (isset($app['mongodb.doctrine.common.class_path'])) {
      $app['autoloader']->registerNamespace(
        'Doctrine\\Common', $app['mongodb.doctrine.common.class_path']
      );
    }
    
    if (isset($app['mongodb.doctrine.mongodb.class_path'])) {
      $app['autoloader']->registerNamespace(
        'Doctrine\\MongoDB', $app['mongodb.doctrine.mongodb.class_path']
      );
    }
  }
}
