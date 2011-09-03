<?php

$app->get('/', function() use ($app) {

	$birthday = new DateTime('1995-06-21 14:35'); //@TODO: make this a global variable
	$today = new DateTime();
	$beenalivefor = $birthday->diff($today);

 	$data['beenalivefor'] = $beenalivefor->y . ' years, '
		. $beenalivefor->m.' months, '
		. $beenalivefor->d.' days, '
 		. $beenalivefor->h.' hours and '
		. $beenalivefor->m.' minutes, ';
		
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