<?php

namespace carlescliment\MudClient\Adapter\Symfony;

use Symfony\Component\EventDispatcher\EventDispatcherInterface as SfEventDispatcher;

use carlescliment\MudClient\Event\EventDispatcherInterface,
    carlescliment\MudClient\Event\EventInterface;

class EventDispatcher implements EventDispatcherInterface
{

    private $dispatcher;


    public function __construct(SfEventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }


    public function dispatch($event_name, EventInterface $event)
    {
        $this->dispatcher->dispatch($event_name, $event);
        return $this;
    }
}