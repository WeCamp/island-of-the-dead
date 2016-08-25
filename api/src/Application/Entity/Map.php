<?php

namespace Application\Entity;

class Map
{
    /**
     * @var Field[]
     */
    protected $fields = [];

    /**
     * Map constructor. Create a rectangle with fields of the given size.
     * @param int $xSize
     * @param int $ySize
     */
    public function __construct($xSize, $ySize)
    {
        for ($x = 1; $x <= $xSize; $x++) {
            for ($y = 1; $y <= $ySize; $y++) {
                $field = new Field($x, $y);
                if (15 === $x && 7 === $y) {
                    $field->setOccupant(new GameExit());
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
     * @param array $coords
     * @return string
     */
    public function movePlayer(array $coords)
    {
        return 'WON';
    }
}
