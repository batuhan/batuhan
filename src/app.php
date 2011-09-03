<?php

$app->get('/', function() use ($app) {
	
	$birthday = new DateTime('1995-06-21T12:35:00+00:00');
	$beenalivefor = $birthday->diff(new DateTime());

 	$data['beenalivefor'] = $beenalivefor->y . ' years, '
		. $beenalivefor->m.' months, '
		. $beenalivefor->d.' days, '
 		. $beenalivefor->h.' hours and '
		. $beenalivefor->m.' minutes, ';
	
  return $app['twig']->render('homepage.html.twig', $data);
});

$app->get('contact', contact_page() use ($app));
function contact_page(){
	return $app['twig']->render('contact.html.twig');
}
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