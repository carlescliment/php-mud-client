<?php

namespace carlescliment\MudClient;

use carlescliment\MudClient\Event\EventDispatcherInterface,
    carlescliment\MudClient\Event\EventBuilderInterface,
    carlescliment\MudClient\Event\MessageEvent;


class Reader
{

    private $dispatcher;
    private $builder;


    public function __construct(EventDispatcherInterface $dispatcher, EventBuilderInterface $builder)
    {
        $this->dispatcher = $dispatcher;
        $this->builder = $builder;
    }


    public function read(Socket $socket)
    {
        while ($message = $socket->read())
        {
            $event = $this->builder->buildFor($message);
            $this->dispatcher->dispatch('message.received', $event);
        }
        return $this;
    }
}
