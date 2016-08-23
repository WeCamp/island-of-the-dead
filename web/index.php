<?php
require_once '../vendor/autoload.php';

// init Silex app
$app = new Silex\Application();

// define route for /getsurrounding depending on x/y coordinates
$app->get('/getsurrounding/{x}/{y}', function ($x, $y) use ($app) {
  return "get your surroundings for ${x} and ${y}";
});

// default route
$app->get('/', function () {
  return "List of avaiable methods:
  - /getsurrounding/{x}/{y} - returns your surroundings;
  - /countries/{id} - returns list of country's cities by id;";
});

$app->run();
