<?php

namespace spec\Application\Repository;

use Application\Entity\Game;
use Application\Repository\FileBasedGameRepository;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use PhpSpec\ObjectBehavior;

class FileBasedGameRepositorySpec extends ObjectBehavior
{
    /**
     * @var vfsStreamDirectory
     */
    private $workDir;

    function let()
    {
        $this->beConstructedWith('vfs://storage_dir');

        $this->workDir = vfsStream::setup('storage_dir');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(FileBasedGameRepository::class);
    }

    function it_stores_a_game()
    {
        $game = new Game(1, 20, 25);

        $this->save($game);

        $this->find(1)->shouldBeLike($game);
    }
}
