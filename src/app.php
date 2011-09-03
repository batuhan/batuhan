<?php

$app->get('/', function() use ($app) {

	$birthday = new DateTime('1995-06-21'); //@TODO: make this a global variable
	$today = new DateTime();
	$interval = $birthday->diff($today);

 	$data['beenalivefor'] = $interval->y . " years, " . $interval->m." months and ".$interval->d." days"; 
 	
 	$hellotexts = array('Hi there', 'Hello', 'Hi', 'Merhaba', 'Hey');
	$hellotext = array_rand($hellotexts);
	$data['hellotext'] = $hellotexts[$hellotext];
	
  return $app['twig']->render('homepage.html.twig', $data);
});

$app->get('/contact', function() use ($app) {
  
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