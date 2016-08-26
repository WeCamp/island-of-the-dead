<?php

namespace Application\Controller;

use Application\Repository\GameRepository;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Silex\ControllerProviderInterface;

class PlayerController implements ControllerProviderInterface
{
    public function connect(Application $app) {
        $factory=$app['controllers_factory'];
        $factory->post('/move/{gameId}','Application\Controller\PlayerController::move');
        return $factory;
    }

    public function move(Application $app, Request $request, $gameId)
    {
        /** @var GameRepository $gameRepo */
        $gameRepo = $app['game_repository'];
        $game = $gameRepo->find($gameId);
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');
        $game->movePlayer($latitude, $longitude);
        $gameRepo->save($game);
        return $app->redirect('/game/' . $game->getId());
    }

}
