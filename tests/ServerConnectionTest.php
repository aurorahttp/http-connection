<?php


use Aurora\Http\Connection\Server;
use PHPUnit\Framework\TestCase;

class ServerConnectionTest extends TestCase
{
    public function test__construct()
    {
        $server = new Server('127.0.0.1', 10000);
        $this->assertAttributeEquals('127.0.0.1', 'address', $server);
        $this->assertAttributeNotEmpty('createdAt', $server);
    }

    public function testClose()
    {
        $server = new Server('127.0.0.1', 10000);
        $server->close();
        $this->assertAttributeNotEmpty('closedAt', $server);
    }

    public function testGetSocket()
    {
        $server = new Server('127.0.0.1', 10000);
        $this->assertInternalType('resource', $server->getSocket());
    }

    public function testGetAddress()
    {
        $server = new Server('127.0.0.1', 10000);
        $this->assertEquals('127.0.0.1', $server->getAddress());

        $server = new Server('*', 10000);
        $this->assertEquals('0.0.0.0', $server->getAddress());

        $server = new Server('localhost', 10000);
        $this->assertEquals('127.0.0.1', $server->getAddress());
    }

    public function testGetPort()
    {
        $server = new Server('127.0.0.1', 10000);
        $this->assertEquals(10000, $server->getPort());
    }
}
