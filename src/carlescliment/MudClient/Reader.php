<?php

namespace carlescliment\MudClient;

use carlescliment\MudClient\Event\EventDispatcherInterface,
    carlescliment\MudClient\Event\MessageEvent;


class Reader
{

    private $socket;
    private $dispatcher;


    public function __construct(Socket $socket, EventDispatcherInterface $dispatcher)
    {
        $this->socket = $socket;
        $this->dispatcher = $dispatcher;
    }


    public function listen()
    {
        while ($message = $this->socket->read())
        {
            $event = new MessageEvent($message);
            $this->dispatcher->dispatch('message.received', $event);
        }
    }
}
