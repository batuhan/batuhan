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

$app->get('test', function() use ($app) {
  
  return print_r($app['request']);
  
});

if($app['locale'] === 'tr'){
	$app->get('okulkredisihesapla-sonuc.html', function() use ($app) {
		
		$i = 0;
		foreach($_GET['dersNotu'] as $dersNotu){
			
			$dersinKredisi = $dersNotu * $_GET['dersSaati'][$i];
			 
			$dersler[] = $_GET['dersAdi'][$i].': ('.$dersNotu.' * '.$_GET['dersSaati'][$i].') = '.$dersinKredisi;
			$krediler[$i] = $dersinKredisi; 
			$i = $i + 1;
			
		}
		
		$kredi = array_sum($krediler);
		
		$veriler = array(
			'dersler' => $dersler, 
			'toplamkredi' => $kredi, 
		);
		
		return $app['twig']->render('pages/tr/okulkredisihesapla.html.twig', $veriler);
	  
	});
	
}
$app->get('{page}.html', function($page) use ($app) {
	
	$universal_pages = array(
		'google324535e8ca471bb3'
	);
	
	if( ! in_array($page, $universal_pages) ){
		$page = $app['locale'].'/'.$page;
	}
	
	$page = 'pages/'.$page.'.html.twig';
	
	$last_updated = filemtime( __DIR__.'/../views/'.$page);
  	$data['last_updated'] = date ("F d Y H:i:s.", $last_updated);

  	return $app['twig']->render($page, $data);
  
});