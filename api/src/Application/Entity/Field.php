<?php

namespace Application\Entity;

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

    public function getOccupant()
    {
        // TODO: write logic here
    }
}
