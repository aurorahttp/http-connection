<?php

namespace Aurora\Http\Connection;

interface ServerInterface
{
    public function open();

    public function close();

    public function accept();

    public function getSocket();
}