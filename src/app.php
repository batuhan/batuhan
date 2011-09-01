<?php

$app->get('/', function() use ($app) {

	$birthday = mktime(12,0,0,6,21,1995); // this should be a global variable
	$offset = mktime() - $birthday;
 	$data['beenalivefor'] = floor($offset/60/60/24);
 	
  return $app['twig']->render('homepage.html.twig', $data);
});

$app->get('/contact', function() use ($app) {
  
  return $app['twig']->render('contact.html.twig');
  
});

$app->get('/about', function() use ($app) {
  
  return $app['twig']->render('about.html.twig');
  
});

$app->get('/404', function() use ($app) {
  
  return $app['twig']->render('404.html.twig');
  
});