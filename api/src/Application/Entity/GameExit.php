<?php

namespace Application\Entity;

use Application\Interfaces\OccupantInterface;

class GameExit implements OccupantInterface
{
    public function getType()
    {
        return 'Exit';
    }
}
