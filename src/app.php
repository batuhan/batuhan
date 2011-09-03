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

$app->get($app['translator']->trans('route_contact'), function() use ($app) {
  
  return $app['twig']->render('contact.html.twig');
  
});

$app->get($app['translator']->trans('route_about'), function() use ($app) {
  
  return $app['twig']->render('about.html.twig');
  
});

$app->get('/lifestream', function() use ($app) {
  
  return $app['twig']->render('lifestream.html.twig');
  
});