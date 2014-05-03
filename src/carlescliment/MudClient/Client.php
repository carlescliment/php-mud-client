<?php

namespace carlescliment\MudClient;


class Client
{
    const DEFAULT_HOST = 'localhost';
    const DEFAULT_PORT = 9000;

    private $socket;

    public function __construct(Socket $socket)
    {
        $this->socket = $socket;
    }


    public function send($message)
    {
        $this->socket->send($message);
        return $this;
    }


    public function close()
    {
        $this->socket->close();
        return $this;
    }
}
