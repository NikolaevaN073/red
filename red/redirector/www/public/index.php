<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

require_once dirname(__DIR__) . '/config/config.php';

$app = new App\Core\Application;

$app->run();
