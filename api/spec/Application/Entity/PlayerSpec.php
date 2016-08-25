<?php

namespace spec\Application\Entity;

use Application\Entity\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PlayerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Player::class);
    }

    function it_has_a_type()
    {
        $this->getType()->shouldReturn('Human Player');
    }

    function it_should_implement_occupant_interface()
    {
        $this->shouldImplement('Application\Interfaces\OccupantInterface');
    }
}
