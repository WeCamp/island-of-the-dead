<?php

namespace spec\Application\Entity;

use Application\Entity\Field;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FieldSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(4, 9);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Field::class);
    }

    function it_has_an_x_axis()
    {
        $this->getXAxis()->shouldReturn(4);
    }

    function it_has_an_y_axis()
    {
        $this->getYAxis()->shouldReturn(9);
    }

    function it_has_no_occupant_at_first()
    {
        $this->getOccupant()->shouldReturn(null);
    }
}
