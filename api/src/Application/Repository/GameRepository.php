<?php

namespace Application\Repository;

use Application\Entity\Game;

interface GameRepository
{
    /**
     * @param Game $game
     *
     * @return void
     */
    public function save(Game $game);

    /**
     * @param int $id
     *
     * @return Game
     */
    public function find($id);
}
