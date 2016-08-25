<?php

namespace Application\Controller;

use Application\Entity\Field;
use Application\Entity\Map;
use Application\Entity\Player;
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

        $map = new Map(Field::X_MAX, Field::Y_MAX);
        $currentField = $map->getFieldByLatLon(52.3721542, 5.6340413);
        $fields = $map->getSurroundingFields($currentField->getXAxis(), $currentField->getYAxis(), Field::X_MAX);
        // add player to field
        $player = new Player();
        $currentField->setOccupant($player);

        $result = [
            'gameId' => 1,
            'fields' => []
        ];

        foreach ($fields as $field) {
            $occupantData = null;
            if (!is_null($field->getOccupant())) {
                $occupantData = [
                    'type' => $field->getOccupant()->getType(),
                ];
            }
            $result['fields'][] = [
                'x-axis' => $field->getXAxis(),
                'y-axis' => $field->getYAxis(),
                'lat' => $field->getLatitude(),
                'long' => $field->getLongitude(),
                'occupant' => $occupantData,
            ];
        }

        return self::$app->json($result);
    }

}
