<?php

namespace carlescliment\MudClient;


class Client
{
    const DEFAULT_HOST = 'localhost';
    const DEFAULT_PORT = 9000;

    private $host;
    private $port;
    private $socket = null;

    public function __construct($host = self::DEFAULT_HOST, $port = self::DEFAULT_PORT)
    {
        $this->host = $host;
        $this->port = $port;
    }


    public function connect()
    {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($this->socket === false) {
            echo "Failed creating socket: " . socket_strerror(socket_last_error()) . "\n";
        }
        echo "Intentando conectar a '$this->host' en el puerto '$this->port'...";
        $result = socket_connect($this->socket, $this->host, $this->port);
        if ($result === false) {
            echo "socket_connect() falló.\nRazón: ($result) " . socket_strerror(socket_last_error($this->socket)) . "\n";
        }
    }


    public function sendMessage($message)
    {
        socket_write($this->socket, $message, strlen($message));
    }


    public function listen()
    {
        while ($out = socket_read($this->socket, 2048)) {
            echo $out;
        }
        return $this;
    }


    public function close()
    {
        socket_close($this->socket);
        return $this;
    }

}
