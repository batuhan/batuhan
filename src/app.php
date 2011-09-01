<?php

$app->get('/{locale}', function() use ($app) {

	$birthday = mktime(12,0,0,6,21,1995); // this should be a global variable
	$offset = mktime() - $birthday;
 	$data['beenalivefor'] = floor($offset/60/60/24);
 	
 	$hellotexts = array('Hi there', 'Hello', 'Hi', 'Merhaba', 'Hey');
	$hellotext = array_rand($hellotexts);
	$data['hellotext'] = $hellotexts[$hellotext];
	
  return $app['twig']->render('homepage.html.twig', $data);
});

$app->get('/{locale}/contact', function() use ($app) {
  
  return $app['twig']->render('contact.html.twig');
  
});

$app->get('/about', function() use ($app) {
  
  return $app['twig']->render('about.html.twig');
  
});

$app->get('/lifestream', function() use ($app) {
  
  return $app['twig']->render('lifestream.html.twig');
  
});

$app->get('/donate', function() use ($app) {
  
  return $app['twig']->render('donate.html.twig');
  
});

$app->get('/questions', function() use ($app) {
  
  return $app['twig']->render('questions.html.twig');
  
});

$app->get('/questions/ask', function() use ($app) {
  
  return $app['twig']->render('questions_ask.html.twig');
  
});

$app->get('/locate', function() use ($app) {
  
  return $app['twig']->render('locate.html.twig');
  
});