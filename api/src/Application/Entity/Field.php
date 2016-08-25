<?php

namespace Application\Entity;

use Application\Interfaces\OccupantInterface;

class Field
{
    /**
     * @var int
     */
    protected $xAxis;

    /**
     * @var int
     */
    protected $yAxis;

    /**
     * @var OccupantInterface
     */
    protected $occupant;

    /**
     * Field constructor. Create a field with the given x and y location
     * @param int $xAxis
     * @param int $yAxis
     */
    public function __construct($xAxis, $yAxis)
    {
        $this->xAxis = $xAxis;
        $this->yAxis = $yAxis;
    }

    /**
     * @return int
     */
    public function getXAxis()
    {
        return $this->xAxis;
    }

    /**
     * @return int
     */
    public function getYAxis()
    {
        return $this->yAxis;
    }

    /**
     * @return OccupantInterface
     */
    public function getOccupant()
    {
        return $this->occupant;
    }

    /**
     * @param OccupantInterface $occupant
     */
    public function setOccupant($occupant)
    {
        $this->occupant = $occupant;
    }
}
