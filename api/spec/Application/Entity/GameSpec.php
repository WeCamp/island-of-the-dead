<?php

namespace spec\Application\Entity;

use Application\Entity\Game;
use Application\Entity\Map;
use PhpSpec\ObjectBehavior;

class GameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1, 20, 25);
    }

    function it_is_started_with_an_id_and_size()
    {
        $this->shouldHaveType(Game::class);
    }

    function it_exposes_its_id()
    {
        $this->getId()->shouldReturn(1);
    }

    function it_exposes_its_map()
    {
        $this->getMap()->shouldHaveType(Map::class);
    }
}
