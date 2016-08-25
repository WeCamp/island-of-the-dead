<?php

use Application\Controller\GameController;
use Application\Controller\PlayerController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// default route
$app->get('/', function () {
    return "List of available methods:
  - /surroundings - returns your surroundings. Requires gameId, lat and long in the request";
});

$app->mount('/player', new PlayerController());
$app->mount('/game', new GameController());

$app->after(function (Request $request, Response $response) {
    $response->headers->set('Access-Control-Allow-Origin', '*');
});
