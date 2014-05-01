<?php

namespace carlescliment\MudClient\Event;

interface EventDispatcherInterface
{
    public function dispatch($event_name, EventInterface $event);
}