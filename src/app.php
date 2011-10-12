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
  
  return $app['twig']->render($app['translator']->trans('route_contact').'.html.twig');
  
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

$app->get('{page}.html', function($page) use ($app) {
	
	$universal_pages = array(
		'google324535e8ca471bb3'
	);
	if( ! in_array($page, $universal_pages) ){
		$page = $app['locale'].'/'.$page;
	}
	return $app['twig']->render('pages/'.$page.'.html.twig');
  
});