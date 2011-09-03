<?php

$browser_lang = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
$browser_lang = $browser_lang[0];

if( ! isset($_GET['to']) ){
	if($browser_lang === 'tr-TR'){
		header('Location: http://batuhanicoz.com.tr');
	}else{
		header('Location: http://batuhanicoz.com');
	}	
}else{ $to = $_GET['to'];

	if($to === 'contact'){
		if($browser_lang === 'tr-TR'){
			header('Location: http://batuhanicoz.com.tr/iletisim');	
		} else {
			header('Location: http://batuhanicoz.com/contact');
		}
	}
	if($to === 'about'){
		if($browser_lang === 'tr-TR'){
			header('Location: http://batuhanicoz.com.tr/hakkimda');	
		} else {
			header('Location: http://batuhanicoz.com/about');
		}
	}
}