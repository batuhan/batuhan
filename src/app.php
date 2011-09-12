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
	
  $file = 'about.html.twig';
  $last_updated = filemtime( __DIR__.'/../views/'.$file);
  $data['last_updated'] = date ("F d Y H:i:s.", $last_updated);
  return $app['twig']->render($file, $data);
  
});

$app->get($app['translator']->trans('route_legal'), function() use ($app) {
  
  return $app['twig']->render($app['translator']->trans('route_legal').'.html.twig');
  
});

$app->get($app['translator']->trans('route_pages').'/{page}', function($page) use ($app) {
  
  return $app['twig']->render('pages/'.$page.'.html.twig');
  
});

$app->get('stuff/gtalk_status_icon', function() use ($app) {
  
  header("Location: http://www.google.com/talk/service/badge/Show?tk=z01q6amlqrb27u3ung888bsmshhbl49thtam2dm240eeeha0ks5o4fs185agpmrkd4oi37jetm9pqgtr8bmil6su415251spt8a86v7q65ut5d7rp3osl0lvvhkab9rdl2joretrr8udro2b3qo7bm22he0mae8q6st1n49m0&amp;w=9&amp;h=9");
  
});
