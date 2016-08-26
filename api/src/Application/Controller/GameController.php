<?php

namespace Application\Controller;

use Application\Entity\Field;
use Application\Entity\Game;
use Application\Entity\Map;
use Application\Entity\Player;
use Application\Repository\GameRepository;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Silex\ControllerProviderInterface;

class GameController implements ControllerProviderInterface
{
    public function connect(Application $app) {
        $factory=$app['controllers_factory'];
        $factory->post('/start','Application\Controller\GameController::start');
        $factory->get('/{gameId}','Application\Controller\GameController::get');
        return $factory;
    }

    public static function start(Application $app, Request $request)
    {
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');
        $game = new Game(1, Field::X_MAX, Field::Y_MAX);
        $playerField = $game->getMap()->getFieldByLatLon($latitude, $longitude);
        $playerField->setOccupant(new Player());
        /** @var GameRepository $gameRepo */
        $gameRepo = $app['game_repository'];
        $gameRepo->save($game);
        return $app->json(
            [
                'gameId' => $game->getId(),
                'state' => $game->getState(),
            ]
        );
    }

    public static function get(Application $app, $gameId)
    {
        /** @var GameRepository $gameRepo */
        $gameRepo = $app['game_repository'];
        $game = $gameRepo->find($gameId);
        $result = [
            'gameId' => $game->getId(),
            'state' => $game->getState(),
            'occupants' => [],
        ];
        foreach ($game->getMap()->getFields() as $field) {
            if ($field->getOccupant()) {
                $result['occupants'][] = [
                    'x-axis' => $field->getXAxis(),
                    'y-axis' => $field->getYAxis(),
                    'latitude' => $field->getLatitude(),
                    'longitude' => $field->getLongitude(),
                    'type' => $field->getOccupant()->getType(),
                ];
            }
        }
        return $app->json($result);
    }
}
