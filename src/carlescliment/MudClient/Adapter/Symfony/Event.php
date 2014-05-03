<?php

namespace carlescliment\MudClient\Adapter;

use Symfony\Component\EventDispatcher\Event;
use carlescliment\MudClient\Event\EventInterface;


class SfEvent extends Event implements EventInterface
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