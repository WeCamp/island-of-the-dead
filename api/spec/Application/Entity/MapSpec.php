<?php

namespace spec\Application\Entity;

use Application\Entity\Field;
use Application\Entity\Map;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MapSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(20, 25);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Map::class);
    }

    function it_has_500_fields()
    {
        $this->getFields()->shouldHaveCount(20 * 25);
        $this->getFields()[0]->shouldHaveType(Field::class);
    }

    function it_can_return_surroundings()
    {
        $this->getSurroundingFields(4, 6, 1)->shouldHaveCount(9);
        $this->getSurroundingFields(4, 6, 0)->shouldHaveCount(1);
        $this->getSurroundingFields(1, 2, 1)->shouldHaveCount(6);
        $this->getSurroundingFields(1, 1, 1)->shouldHaveCount(4);
        $this->getSurroundingFields(1, 1, 2)->shouldHaveCount(9);
    }
}
