<?php

namespace Application\Controller;

use Application\Entity\Field;
use Application\Entity\Map;
use Application\Entity\Player;
use Application\Repository\GameRepository;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Silex\ControllerProviderInterface;

class PlayerController implements ControllerProviderInterface
{
    public function connect(Application $app) {
        $factory=$app['controllers_factory'];
        $factory->get('/{gameId}','Application\Controller\PlayerController::get');
        return $factory;
    }

    public function get(Application $app, $gameId = 1)
    {
        /** @var GameRepository $gameRepo */
        $gameRepo = $app['game_repository'];
        $game = $gameRepo->find($gameId);
        $map = $game->getMap();

        $fields = $map->getSurroundingFields(1, 1, Field::X_MAX);

        $result = [
            'gameId' => 1,
            'fields' => []
        ];

        foreach ($fields as $field) {
            $result['fields'][] = $field->toArray();
        }

        return $app->json($result);
    }

}
