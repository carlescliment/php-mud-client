<?php

namespace carlescliment\MudClient\Event;

class MessageEvent implements EventInterface
{

    private $message;


    public function __construct($message)
    {
        $this->message = $message;
    }
}