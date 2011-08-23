<?php

$app->register(new Silex\Extension\TranslationExtension(), array(
    'locale_fallback'           => 'en',
    'translation.class_path'    => __DIR__.'/vendor/symfony/src',
));

$app['translator.messages'] = array(
    'en' => __DIR__.'/includes/locales/en.yml',
    'tr' => __DIR__.'/includes/locales/tr.yml'
);
$app['translator.loader'] = new Symfony\Component\Translation\Loader\YamlFileLoader();

$app->before(function () use ($app) {
    if ($locale = $app['request']->get('locale')) {
        $app['locale'] = $locale;
    }
});