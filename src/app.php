<?php

$app->get('/', function() use ($app) {
  
  return $app['twig']->render('homepage.html.twig');
  
});


$app->get('/contact', function() use ($app) {
  
  return $app['twig']->render('contact.html.twig');
  
});


$app->get('/about', function() use ($app) {
  
  return $app['twig']->render('about.html.twig');
  
});