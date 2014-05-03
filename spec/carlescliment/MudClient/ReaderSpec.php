<?php

namespace spec\carlescliment\MudClient;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReaderSpec extends ObjectBehavior
{

    public function let($dispatcher, $event_builder)
    {
        $dispatcher->beADoubleOf('carlescliment\MudClient\Event\EventDispatcherInterface');
        $event_builder->beADoubleOf('carlescliment\MudClient\Event\EventBuilderInterface');
        $this->beConstructedWith($dispatcher, $event_builder);
    }


    function it_dispatches_an_event_when_receiving_a_message($socket, $dispatcher, $event_builder, $event)
    {
        $socket->beADoubleOf('carlescliment\MudClient\Socket');
        $socket->read()->willReturn('some message', false);
        $event->beADoubleOf('carlescliment\MudClient\Event\EventInterface');

        $event_builder->buildFor('some message')->shouldBeCalled()->willReturn($event);
        $dispatcher->dispatch('message.received', $event)->shouldBeCalled();

        $this->listen($socket);
    }
}
