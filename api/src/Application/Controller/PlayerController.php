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
        $fields = $map->getSurroundingFields(12, 12, 27);
        // add player to 13, 13
        $player = new Player();
        foreach ($fields as &$field) {
            if ($field->getXAxis() == 13
                && $field->getYAxis() == 14
            ) {
                $field->setOccupant($player);
            }
        }

        $result = [
            'gameId' => 1,
            'fields' => []
        ];

        foreach ($fields as $fieldItem) {
            $occupantData = null;
            if (!is_null($fieldItem->getOccupant())) {
                $occupantData = [
                    'type' => $fieldItem->getOccupant()->getType(),
                ];
            }
            $result['fields'][] = [
                'x-axis' => $fieldItem->getXAxis(),
                'y-axis' => $fieldItem->getYAxis(),
                'lat' => $fieldItem->getLatitude(),
                'long' => $fieldItem->getLongitude(),
                'occupant' => $occupantData,
            ];
        }

        return self::$app->json($result);
    }

}
