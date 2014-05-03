<?php

namespace carlescliment\MudClient\Adapter\Symfony;

class EventBuilder
{

    public function buildFor($message)
    {
        return new Event($message);
    }
}
