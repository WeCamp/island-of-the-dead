<?php

namespace spec\Application;

use Application\HelloWorld;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HelloWorldSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(HelloWorld::class);
    }
}
