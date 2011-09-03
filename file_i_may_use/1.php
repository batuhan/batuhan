<?php

$browser_lang = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);

if($browser_lang[0] === 'tr-TR'){
	header('Location: http://batuhanicoz.com.tr');
}else{
	header('Location: http://batuhanicoz.com');
}