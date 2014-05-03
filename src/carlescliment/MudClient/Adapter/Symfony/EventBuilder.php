<?php

namespace carlescliment\MudClient\Adapter;

class SfEventBuilder
{

    public function buildFor($message)
    {
        return new SfEvent($message);
    }
}
