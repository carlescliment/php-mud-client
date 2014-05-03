<?php

namespace spec\carlescliment\MudClient\Adapter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SfEventBuilderSpec extends ObjectBehavior
{
    function it_builds_instances_of_symfony_event()
    {
        $event = $this->buildFor('some message');

        $event->shouldbeAnInstanceOf('Symfony\Component\EventDispatcher\Event');
        $event->shouldbeAnInstanceOf('carlescliment\MudClient\Event\EventInterface');
        $event->getMessage()->shouldBe('some message');
    }
}
