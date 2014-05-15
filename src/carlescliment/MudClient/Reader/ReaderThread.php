<?php

namespace carlescliment\MudClient\Reader;

use carlescliment\MudClient\Reader,
    carlescliment\MudClient\Socket;

class ReaderThread extends \Thread {

    private $reader;
    private $socket;


    public function __construct(Reader $reader, Socket $socket)
    {
        $this->reader = $reader;
        $this->socket = $socket;
    }


    public function run(){
        $this->reader->read($this->socket);
    }
}
