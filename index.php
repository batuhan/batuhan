<?php

require_once __DIR__.'/includes/silex.phar';
include_once __DIR__.'/includes/functions.php';

require_once __DIR__.'/includes/lib/Twig/Autoloader.php';

$app = new Silex\Application();
$app['debug'] = true;

Twig_Autoloader::register();

$app->register(new Silex\Extension\TwigExtension(), array(
    'twig.path'       => __DIR__.'/views',
));

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app->register(new Silex\Extension\TranslationExtension(), array(
    'locale_fallback'           => 'en',
    'translation.class_path'    => __DIR__.'/vendor/symfony/src',
));

$app['translator.messages'] = array(
    'en' => __DIR__.'/locales/en.yml',
    'tr' => __DIR__.'/locales/en.yml'
);

$app->before(function () use ($app) {
    if ($locale = $app['request']->get('locale')) {
        $app['locale'] = $locale;
    }
});

$app->get('/{locale}/{message}/{name}', function ($message, $name) use ($app) {
    return $app['translator']->trans($message, array('%name%' => $name));
});

$app->get('/', function (Request $request) use ($app) {
    
    if($request->get('error')){
        $data = array(
            'error' => $request->get('error')      
        );
    }else{
        $data = array(
            'error' => NULL     
        );
    }
    
    return $app['twig']->render('homepage.twig', $data);
    
});

$app->post('/do', function(Request $request) use($app) { 
    
    $username = $request->get('username');
    
    if( ! isset($username) ){ return $app->redirect('/?error=empty'); }
    
    if( ! isset($second_username) ){
        
        return $app->redirect('/'.$username);
        
    }else{
        
        return $app->redirect('/'.$first.'/and/'.$second.'/');
        
    }
    
}); 

$app->get('/{username}', function($username) use($app) { 
    
    $username = $app->escape($username);
    
    $fb_info = get_fb_info($username);

    if( ! $fb_info ){ return $app->redirect('/?error=notfound'); }
        
    return $app['twig']->render('information.twig', $fb_info);
    
}); 

$app->get('/{username}/and/{second_username}/', function($username, $second_username) use($app) { 
    
    $username = $app->escape($username);
    $second_username = $app->escape($second_username);
    
    $username_info = get_fb_info($username);

    $second_username_info = get_fb_info($second_username);

    if( ! $username_info OR  ! $second_username_info ){
        return $app->redirect('/?error=yunoexist');
    }

    if($username_info['other_information']['type'] === 'page' OR $second_username_info['other_information']['type'] === 'page'){
        return $app->redirect('/?error=yunohuman');
    }
    
    
    return $app['twig']->render('compare.twig', $fb_info);
    
}); 

$app->run();