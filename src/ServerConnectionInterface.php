<?php

namespace Aurora\Http\Connection;

interface ServerConnectionInterface
{
    public function close();

    public function accept();

    public function getSocket();
}