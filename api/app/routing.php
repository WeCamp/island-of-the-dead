<?php

use Symfony\Component\HttpFoundation\Request;

// default route
$app->get('/', function () {
    return "List of available methods:
  - /surroundings - returns your surroundings. Requires gameId, lat and long in the request";
});

$app->get('/surroundings', function (Request $request) use ($app) {

    $surrounding = array(
        'gameId' => $request->headers->get('gameId'),
        'lat'    => $request->headers->get('lat'),
        'long'   => $request->headers->get('long')
    );

    $response = array(
        'gameId' => 2,
        'fields' => array(
            array(
                'id' => 1,
                'y-axis' => 1,
                'x-axis' => 1,
                'occupied' => array(
                    'type' => 'Human Player'
                )
            ),
            array(
                'id' => 2,
                'y-axis' => 1,
                'x-axis' => 2,
                'occupied' => null
            ),
            array(
                'id' => 3,
                'y-axis' => 1,
                'x-axis' => 3,
                'occupied' => null
            ),
            array(
                'id' => 4,
                'y-axis' => 2,
                'x-axis' => 1,
                'occupied' => array(
                    'type' => 'Zombie'
                )
            ),
            array(
                'id' => 5,
                'y-axis' => 2,
                'x-axis' => 2,
                'occupied' => null
            ),
            array(
                'id' => 6,
                'y-axis' => 2,
                'x-axis' => 3,
                'occupied' => null
            ),
            array(
                'id' => 7,
                'y-axis' => 3,
                'x-axis' => 1,
                'occupied' => array(
                    'type' => 'Zombie'
                )
            ),
            array(
                'id' => 8,
                'y-axis' => 3,
                'x-axis' => 2,
                'occupied' => null
            ),
            array(
                'id' => 9,
                'y-axis' => 3,
                'x-axis' => 3,
                'occupied' => array(
                    'type' => 'Zombie'
                )
            ),
        )
    );

//    return $app->json($surrounding);
    return $app->json($response);
});
