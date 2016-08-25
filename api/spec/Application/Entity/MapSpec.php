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
        $this->beConstructedWith(Field::X_MAX, Field::Y_MAX);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Map::class);
    }

    function it_has_500_fields()
    {
        $this->getFields()->shouldHaveCount(Field::X_MAX * Field::Y_MAX);
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
