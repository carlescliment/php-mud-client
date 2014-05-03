<?php

namespace carlescliment\MudClient\Adapter\Symfony;

use Symfony\Component\EventDispatcher\Event as SfEvent;
use carlescliment\MudClient\Event\EventInterface;


class Event extends SfEvent implements EventInterface
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }


    public function getMessage()
    {
        return $this->message;
    }
}