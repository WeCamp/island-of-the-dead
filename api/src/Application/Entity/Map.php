<?php

namespace Application\Entity;

use Application\Interfaces\OccupantInterface;

class Map
{
    /**
     * @var Field[]
     */
    protected $fields = [];

    /** @var array */
    private $occupants =[];

    /**
     * Map constructor. Create a rectangle with fields of the given size.
     * @param int $xSize
     * @param int $ySize
     */
    public function __construct($xSize, $ySize)
    {
        $this->placeOccupants();
        for ($x = 1; $x <= $xSize; $x++) {
            for ($y = 1; $y <= $ySize; $y++) {
                $field = new Field($x, $y);
                if ($this->hasOccupant($x, $y)) {
                    $field->setOccupant($this->getOccupant($x, $y));
                }
                $this->fields[] = $field;
            }
        }
    }

    /**
     * @return Field[]
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Get the surrounding fields of a center coordinate.
     * The center field will also be returned.
     * The border defines how far from the center
     * @param int $xAxis
     * @param int $yAxis
     * @param int $border
     * @return Field[]
     */
    public function getSurroundingFields($xAxis, $yAxis, $border)
    {
        $result = [];
        foreach ($this->fields as $field) {
            if ($field->getXAxis() >= $xAxis - $border
                && $field->getXAxis() <= $xAxis + $border
                && $field->getYAxis() >= $yAxis - $border
                && $field->getYAxis() <= $yAxis + $border
            ) {
                $result[] = $field;
            }
        }
        return $result;
    }

    /**
     * @param double $lat
     * @param double $lon
     * @return Field
     */
    public function getFieldByLatLon($lat, $lon)
    {
        $latDiff = null;
        $lonDiff = null;
        $selectedField = null;
        foreach ($this->getFields() as $field) {
            if (is_null($latDiff)
                && is_null($lonDiff)
            ) {
                $latDiff = $lat - $field->getLatitude();
                $lonDiff = $lon - $field->getLongitude();
                $selectedField = $field;
                continue;
            }
            $currentLatDiff = $lat - $field->getLatitude();
            $currentLonDiff = $lon - $field->getLongitude();
            if (abs($currentLatDiff) <= abs($latDiff)
                && abs($currentLonDiff) <= abs($lonDiff)
            ) {
                $latDiff = $currentLatDiff;
                $lonDiff = $currentLonDiff;
                $selectedField = $field;
            }
        }
        return $selectedField;
    }

    /**
     * @param array $coords
     * @return string
     */
    public function movePlayer($latitude, $longitude)
    {
        $player = null;
        // remove player from old location
        foreach ($this->getFields() as $field) {
            if ($field->getOccupant() instanceof Player) {
                $player = $field->getOccupant();
                $field->setOccupant(null);
                break;
            }
        }
        $newField = $this->getFieldByLatLon($latitude, $longitude);
        if (!$newField->hasOccupant()) {
            $newField->setOccupant($player);
            return Game::STATE_ACTIVE;
        }
        if ($newField->getOccupant() instanceof GameExit) {
            return Game::STATE_WON;
        }
        if ($newField->getOccupant() instanceof Zombie) {
            return Game::STATE_LOST;
        }
    }

    private function placeOccupants()
    {
        $this->addOccupant(15, 7, new GameExit());
        $this->addOccupant(15, 9, new Zombie());
        $this->addOccupant(6, 17, new Zombie());
        $this->addOccupant(6, 18, new Zombie());
        $this->addOccupant(6, 19, new Zombie());
        $this->addOccupant(7, 17, new Zombie());
        $this->addOccupant(7, 18, new Zombie());
        $this->addOccupant(7, 19, new Zombie());
//        $this->addOccupant(12, 11, new Zombie());
        $this->addOccupant(10, 13, new Zombie());
        $this->addOccupant(9, 15, new Zombie());
        $this->addOccupant(14, 16, new Zombie());

        $this->addOccupant(4, 23, new Zombie());
    }

    /**
     * @param int $x
     * @param int $y
     * @param OccupantInterface $occupant
     */
    private function addOccupant($x, $y, $occupant)
    {
        $this->occupants[$x * 2][$y * 2] = $occupant;
    }

    /**
     * @param int $x
     * @param int $y
     * @return OccupantInterface
     */
    private function getOccupant($x, $y)
    {
        return $this->occupants[$x][$y];
    }

    /**
     * @param int $x
     * @param int $y
     * @return bool
     */
    private function hasOccupant($x, $y)
    {
        return isset($this->occupants[$x][$y]);
    }
}
