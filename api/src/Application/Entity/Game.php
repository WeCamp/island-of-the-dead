<?php

namespace Application\Entity;

use Assert\Assertion;

class Game
{
    const STATE_STARTED = 'STARTED';
    const STATE_WON = 'WON';
    const STATE_LOST = 'LOST';
    const STATE_ACTIVE = 'ACTIVE';

    /**
     * @var int
     */
    private $id;

    /**
     * @var Map
     */
    private $map;

    /**
     * @var string
     */
    private $state;

    /**
     * @param int $id
     * @param int $xSize
     * @param int $ySize
     */
    public function __construct($id, $xSize, $ySize)
    {
        Assertion::integer($id);
        Assertion::integer($xSize);
        Assertion::integer($ySize);

        $this->id  = $id;
        $this->map = new Map($xSize, $ySize);
        $this->state = self::STATE_STARTED;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Map
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param double $latitude
     * @param double $longitude
     */
    public function movePlayer($latitude, $longitude)
    {
        $this->state = $this->map->movePlayer($latitude, $longitude);
    }
}
