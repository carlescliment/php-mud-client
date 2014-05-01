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


    public function listen()
    {
        while ($out = $this->socket->read()) {
            echo $out;
        }
        return $this;
    }


    public function close()
    {
        $this->socket->close();
        return $this;
    }
}


$socket = Socket::create(Client::DEFAULT_HOST, Client::DEFAULT_PORT);
$socket->connect();
$client = new Client();
