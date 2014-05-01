<?php

namespace carlescliment\MudClient;


class Socket
{

    const DEFAULT_BUFFER_SIZE = 2048;

    private $socket;
    private $host;
    private $port;
    private $bufferSize;

    private function __construct($socket, $host, $port, $buffer_size = self::DEFAULT_BUFFER_SIZE)
    {
        $this->socket = $socket;
        $this->host = $host;
        $this->port = $port;
        $this->bufferSize = $buffer_size;
    }


    public static function create($host, $port)
    {
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if (false === $socket) {
            throw new \Exception(sprintf('Failed creating socket: %s', socket_strerror(socket_last_error())));
        }
        return new static($socket, $host, $port);
    }


    public function connect()
    {
        if (false === socket_connect($this->socket, $this->host, $this->port)) {
            throw new \Exception(sprintf('Connection failed: %s', socket_strerror(socket_last_error($this->socket))));
        }
        return $this;
    }


    public function send($message)
    {
        socket_write($this->socket, $message, strlen($message));
        return $this;
    }


    public function read()
    {
        return socket_read($this->socket, $this->bufferSize);
    }


    public function close()
    {
        socket_close($this->socket);
        return $this;
    }

}