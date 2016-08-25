<?php

use Application\Controller\PlayerController;
use Symfony\Component\HttpFoundation\Request;

// default route
$app->get('/', function () {
    return "List of available methods:
  - /surroundings - returns your surroundings. Requires gameId, lat and long in the request";
});

$app->mount('/player', new PlayerController());

$app->get('/surroundings', function (Request $request) use ($app) {

    $surrounding = [
        'gameId' => $request->headers->get('gameId'),
        'lat'    => $request->headers->get('lat'),
        'long'   => $request->headers->get('long')
    ];

    $response = [
        'gameId' => 2,
        'fields' => [
            [
                'y-axis' => 1,
                'x-axis' => 1,
                'occupied' => [
                    'type' => 'Human Player'
                ]
            ],
            [
                'y-axis' => 1,
                'x-axis' => 2,
                'occupied' => null
            ],
            [
                'y-axis' => 1,
                'x-axis' => 3,
                'occupied' => null
            ],
            [
                'y-axis' => 2,
                'x-axis' => 1,
                'occupied' => [
                    'type' => 'Zombie'
                ]
            ],
            [
                'y-axis' => 2,
                'x-axis' => 2,
                'occupied' => null
            ],
            [
                'y-axis' => 2,
                'x-axis' => 3,
                'occupied' => null
            ],
            [
                'y-axis' => 3,
                'x-axis' => 1,
                'occupied' => [
                    'type' => 'Zombie'
                ]
            ],
            [
                'y-axis' => 3,
                'x-axis' => 2,
                'occupied' => null
            ],
            [
                'y-axis' => 3,
                'x-axis' => 3,
                'occupied' => [
                    'type' => 'Zombie'
                ]
            ],
        ]
    ];

//    return $app->json($surrounding);
    return $app->json($response);
});
