<?php

namespace Application\Entity;

use Assert\Assertion;

class Game
{
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
        $this->state = "STARTED";
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
     * @param array $coords
     */
    public function movePlayer(array $coords)
    {
        $this->state = $this->map->movePlayer($coords);
    }
}
