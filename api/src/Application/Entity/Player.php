<?php

namespace Application\Entity;

use Application\Interfaces\OccupantInterface;

class Player implements OccupantInterface
{
    public function getType()
    {
        return 'Human Player';
    }
}
