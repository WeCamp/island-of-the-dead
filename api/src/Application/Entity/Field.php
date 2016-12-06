<?php

namespace Application\Entity;

use Application\Interfaces\OccupantInterface;

class Field
{
    const X_MIN = 1;
    const X_MAX = 54;
    const Y_MIN = 1;
    const Y_MAX = 48;

    const LON_MIN = 5.632183;
    const LON_MAX = 5.63589;
    const LAT_MIN = 52.37316;
    const LAT_MAX = 52.37125;

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
     * @return bool
     */
    public function hasOccupant()
    {
        return !is_null($this->getOccupant());
    }

    /**
     * @param OccupantInterface $occupant
     */
    public function setOccupant($occupant)
    {
        $this->occupant = $occupant;
    }

    public function getLatitude()
    {
        $yDiff = $this->getYAxis() - self::Y_MIN;
        $ySize = self::Y_MAX - self::Y_MIN;
        $latSize = self::LAT_MAX - self::LAT_MIN;
        $latOffset = self::LAT_MIN;
        return round($yDiff / $ySize * $latSize + $latOffset, 6);
    }

    public function getLongitude()
    {
        $xDiff = $this->getXAxis() - self::X_MIN;
        $xSize = self::X_MAX - self::X_MIN;
        $lonSize = self::LON_MAX - self::LON_MIN;
        $lonOffset = self::LON_MIN;
        return round($xDiff / $xSize * $lonSize + $lonOffset, 6);
    }

    public function toArray()
    {
        $occupantData = null;
        if (!is_null($this->getOccupant())) {
            $occupantData = [
                'type' => $this->getOccupant()->getType(),
            ];
        }

        return [
            'x-axis' => $this->getXAxis(),
            'y-axis' => $this->getYAxis(),
            'lat' => $this->getLatitude(),
            'long' => $this->getLongitude(),
            'occupant' => $occupantData,
        ];
    }
}
