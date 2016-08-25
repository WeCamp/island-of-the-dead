<?php

namespace Application\Repository;

use Application\Entity\Game;
use Assert\Assertion;

class FileBasedGameRepository implements GameRepository
{
    /**
     * @var string
     */
    private $storageDir;

    /**
     * @param string $storageDir
     */
    public function __construct($storageDir)
    {
        Assertion::string($storageDir);

        $this->storageDir = $storageDir;
    }

    /**
     * @param Game $game
     */
    public function save(Game $game)
    {
        $filename = $this->getFilename($game->getId());
        $content  = serialize($game);

        file_put_contents($filename, $content);
    }

    /**
     * @param int $id
     *
     * @return Game
     */
    public function find($id)
    {
        $filename = $this->getFilename($id);
        $content  = file_get_contents($filename);

        return unserialize($content);
    }

    /**
     * @param int $id
     *
     * @return string
     */
    private function getFilename($id)
    {
        return sprintf('%s/%d', $this->storageDir, $id);
    }
}
