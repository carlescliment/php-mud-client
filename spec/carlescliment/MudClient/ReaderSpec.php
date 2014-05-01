<?php

namespace spec\carlescliment\MudClient;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReaderSpec extends ObjectBehavior
{

    public function let($socket, $dispatcher)
    {
        $socket->beADoubleOf('carlescliment\MudClient\Socket');
        $dispatcher->beADoubleOf('carlescliment\MudClient\Event\EventDispatcherInterface');
        $this->beConstructedWith($socket, $dispatcher);
    }


    function it_dispatches_an_event_when_receiving_a_message($socket, $dispatcher)
    {
        $socket->read()->willReturn('some message', false);

        $dispatcher->dispatch('message.received', Argument::type('carlescliment\MudClient\Event\EventInterface'))->shouldBeCalled();

        $this->listen();
    }
}
