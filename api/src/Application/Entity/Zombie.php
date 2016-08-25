<?php

namespace Application\Entity;

use Application\Interfaces\OccupantInterface;

class Zombie implements OccupantInterface
{
    public function getType()
    {
        return 'Zombie';
    }
}
