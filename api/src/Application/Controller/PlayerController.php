<?php

namespace Application\Controller;

use Application\Entity\Map;
use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Silex\ControllerProviderInterface;

class PlayerController implements ControllerProviderInterface {

    /**
     * @var Application
     */
    protected static $app;

    public function connect(Application $app) {
        self::$app = $app;
        $factory=$app['controllers_factory'];
        $factory->get('/','Application\Controller\PlayerController::get');
        $factory->get('/surroundings','Application\Controller\PlayerController::get');
        return $factory;
    }

    public function get() {

        $map = new Map(3,3);
        $fields = $map->getSurroundingFields(2,2,1);

        $result = [
            'gameId' => 1,
            'fields' => []
        ];

        foreach ($fields as $field) {
            $result['fields'][] = [
                'x-axis' => $field->getXAxis(),
                'y-axis' => $field->getYAxis()
            ];
        }

        return self::$app->json($result);
    }

}
