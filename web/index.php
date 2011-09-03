<?php
echo $_SERVER["HTTP_ACCEPT_LANGUAGE"];

$app = require_once __DIR__.'/../src/bootstrap.php';
require_once __DIR__.'/../src/app.php';

$app->run();
