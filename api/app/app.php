<?php
require __DIR__ . '/bootstrap.php';

// init Silex app
$app = new Silex\Application();

require_once __DIR__ . '/services.php';
require_once __DIR__ . '/routing.php';

return $app;
